<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use Illuminate\Support\Facades\Http;




class CheckoutController extends Controller
{
    public function CheckoutForm()
    {

        return view('checkoutForm');
    }

    public function showcheckout()
    {
        $user = Auth::user();

      $carts = Cart::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

      //$sum  = Cart::where('user_id', $user->id)->sum('price');
      $sum = $carts->sum(function ($item) {
        return $item->price * $item->quantity;
    });

      return view('checkoutForm', [
        'user' => $user
      ], compact('sum'));
    }

    public function verifyPayment(Request $request)
{
    $reference = $request->query('reference');
    $location = $request->query('location');

    $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
        ->get("https://api.paystack.co/transaction/verify/{$reference}");

    $data = $response->json();

    if ($data['status'] && $data['data']['status'] === 'success') {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        //$total = $cartItems->sum('price');
        $total = $cartItems->sum(function ($item) {
        return $item->price * $item->quantity;
    });


        if ($cartItems->isEmpty()) {
            return redirect()->route('home')->with('error', 'Your cart is empty.');
        }

        //$products = $cartItems->pluck('product')->toArray();
        $products = $cartItems->map(function ($item) {
    return $item->product . ' (x' . $item->quantity . ')';
})->toArray();



        // Store the order
        Order::create([
            'user_id' => $user->id,
            'products' => implode(', ', $products),
            'amount' => $total,
            'payment_reference' => $reference,
            'payment_status' => 'completed',
            'location' => $location,

        ]);

        // Clear cart
        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('home')->with('success', 'Payment successful and order placed.');
    }

    return redirect()->route('home')->with('error', 'Payment verification failed.');
}


}
