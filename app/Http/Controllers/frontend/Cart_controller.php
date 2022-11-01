<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cart_controller extends Controller
{
    

 //Quick add  to cart 
    public function quic_add_to_cart($id)
    {

        if (Auth::check()){

        $data = Product::find($id);
        $userid = Auth::id();

        $check = Cart::where('user_id', $userid)->where('product_id', $id)->get();

        //check cart already  have the product
        if (sizeof($check)) {

        //check stock
            if($data->stock >0){

            $datas = Cart::where('user_id', $userid)->where('product_id', $id)->latest()->first();

            $total = $datas->quntity + 1;

            $update = Cart::find($datas->id);

            $update->quntity = $total;

            $update->save();

            return response()->json([
                'status'=> 200,
                'message'=>'Successfully Add to cart!',
            ]);

        }else{


            return response()->json([
                'status'=> 409,
                'message'=>'out of stock',
            ]);
        }

          

        } else {

            if($data->stock >0){

            $cart = new Cart;
            $cart->product_id = $id;
            $cart->user_id = $userid;
            $cart->product = $data->title;
            $cart->quntity = 1;
            $cart->price = $data->price;
            $cart->image = $data->files;
            $cart->save();

            return response()->json([
                'status'=> 200,
                'message'=>'Successfully Add to cart!',
            ]);

        }else{


            return response()->json([
                'status'=> 409,
                'message'=>'out of stock',
            ]);
        }

        }

    }else{


        return response()->json([
            'status'=> 401,
            'message'=>'Please login first',
        ]);

    }


    }

    //load cart data


    public function cartload()
    {

        $userid = Auth::id();
        if (is_null($userid)) {
            $userid = request()->ip();
        }
        $cart_data = Cart::where('user_id', $userid)->get();
        $totalcart = count($cart_data);

        echo json_encode(array('totalcart' => $totalcart, 'cart_data' => $cart_data));
        return;


    }


//delete from cart
    public function deletefromusercart(Request $request)
    {
        $id = $request->input('product_id');

        $userid = Auth::id();
        if (is_null($userid)) {
            $userid = request()->ip();
        }


        $data = Cart::find($id);


        $data->delete();
        return response()->json(['message' => 'Item Removed from Cart']);


    }

//add to cart prom single product page

    public function addtocart(Request $request)
    {

     if (Auth::check()){
        $product_id = $request->product_id;
        $quantity = $request->quantity;


        $data = Product::find($product_id);
        $userid = Auth::id();
   


        $check = Cart::where('user_id', $userid)->where('product_id', $product_id)->get();

        if (sizeof($check)) {

            $datas = Cart::where('user_id', $userid)->where('product_id', $product_id)->latest()->first();

            $total = $datas->quntity + $quantity;

            $update = Cart::find($datas->id);
            $update->quntity = $total;
            $update->save();

            return response()->json([
                'status'=> 200,
                'message'=>'Successfully Add to cart!',
            ]);


        } else {

            $cart = new Cart;
            $cart->product_id = $data->id;
            $cart->user_id = $userid;
            $cart->product = $data->title;
            $cart->quntity = $quantity;
            $cart->price = $data->price;
            $cart->image = $data->files;
            $cart->save();

            return response()->json([
                'status'=> 200,
                'message'=>'Successfully Add to cart!',
            ]);


        }

    }else{


        return response()->json([
            'status'=> 401,
            'message'=>'Please login first',
        ]);
    }


    }



}
