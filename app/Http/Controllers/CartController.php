<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;



class CartController extends Controller
{

    public function index()
    {

        return view('cart');
    }


    public function create()
    {
        return view('maleshoes');
    }


    public function store(Request $request)
    {
        $user = Auth::user();


        $cart = new Cart();

       $cart->user_id = $user->id;
       $cart->product = request('product');
       $cart->price = request('price');


       $cart->save();


       return redirect('/cart');
    }


    public function show()
    {
        $user = Auth::user();

      $carts = Cart::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

      $sum  = Cart::where('user_id', $user->id)->sum('price');



      return view('cart', [
        'carts' => $carts
      ], compact('sum'));


    }

    public function checkout(Request $request)
    {
       $user = Auth::user();

      $checkout = Cart::where('user_id', $user->id);



        if ($request->has('confirmed') && $request->confirmed == true ) {
            $checkout->delete();
            return redirect('/cart');
         }else{
               return redirect()->back()->with('confirm_message', 'Please confirm the deletion');
         }


    }


   


    public function update(Request $request, CartController $cartController)
    {
        //
    }

    public function search(Request $request){
        $query = request('search');
        $orders = Cart::where('product', 'LIKE', "%{$query}%")->get();
        return view('order_search', [
            'orders' => $orders
          ]);
    }

    public function destroy(Request $request, $id){

        $cart = Cart::findOrFail($id);


        if ($request->has('confirmed') && $request->confirmed == true ) {
           $cart->delete();
           return redirect('/cart');
        }else{
              return redirect()->back()->with('confirm_message', 'Please confirm the deletion');
        }


     }

     public function destroy_search(Request $request, $id){

        $order = Cart::findOrFail($id);


        if ($request->has('confirmed') && $request->confirmed == true ) {
           $order->delete();
           return redirect('/cart');
        }else{
              return redirect()->back()->with('confirm_message', 'Please confirm the deletion');
        }


     }


}


