<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;


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

      $sum  = Cart::where('user_id', $user->id)->sum('price');


      return view('checkoutForm', [
        'user' => $user
      ], compact('sum'));


    }

}
