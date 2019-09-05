<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);
        Cart::add([
            'id'            => $product->id,
            'name'          => $product->product_name,
            'price'         => $product->product_discount_price,
            'quantity'      => $request->qty,
            'attributes'    => [
                'image'     => $product->product_image,
                'code'      => $product->product_code,
            ]
        ]);

        return redirect('/cart/show-cart');
    }

    public function showCart ()
    {
        $cartCollection = Cart::getContent();
        $categories = Category::where ('publication_status', '1')->get();
        return view('front.cart.show-cart',[
            'categories' => $categories,
            'cartCollection'    => $cartCollection

        ]);
    }

    public function updateCart (Request $request)
    {
        Cart::update($request->id, ['quantity' => [
            'relative' => false,
            'value' => $request->qty
        ]]);
        return redirect()->back();
    }

    public function deleteCart ($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }



//    Final 3rd time try
//    public function showCart ()
//    {
//        $cartCollection = Cart::getContent();
//        $categories = Category::where('publication_status', 1)->get();
//        return view('front.cart.show-carts',[
//            'categories'        => $categories,
//            'cartCollection'    => $cartCollection,
//        ]);
//    }
//
//    public function addCart(Request $request)
//    {
//        $product = Product::find($request->product_id);
//        Cart::add([
//            'id'            => $product->id,
//            'name'          => $product->product_name,
//            'price'         => $product->product_discount_price,
//            'quantity'      => $request->qty,
//            'attributes'    => [
//                'images'        => $product->product_image,
//                'code'          => $product->product_code,
//            ]
//        ]);
//        return redirect('/cart/show-cart');
//    }
//
//    public function updateCart (Request $request)
//    {
//        Cart::update($request->id, [
//            'quantity'   => [
//                'relative'  => false,
//                'value'     => $request->qty,
//            ]
//            ]);
//        return redirect()->back();
//    }
//
//    public function deleteCart ($id)
//    {
//       Cart::remove($id);
//        return redirect()->back();
//    }

}
