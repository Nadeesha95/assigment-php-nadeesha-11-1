<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Checkout_controller extends Controller
{
    //check out
    public function usercheckout()
    {
        $userid = Auth::id();


        $cart_data = Cart::where('user_id', $userid)->get();

        $total = 0;
        foreach ($cart_data as $cart) {
            $total += $cart->price * $cart->quntity;

        }

    
        $cart = Cart::where('user_id', $userid)->get();

        $subtotal = $total;

        $cat= Category::where('status',1)->limit(5)->get();

        return view('frontend.checkout')->with('cart', $cart)->with('total', $subtotal)->with('cart_data', $cart_data)->with('cat',$cat);


    }
}
