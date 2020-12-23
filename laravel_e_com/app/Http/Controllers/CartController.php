<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;

class CartController extends Controller
{
    public function addToCart(Product $product,Request $request){
        if(session()->has('cart')){
    		$cart = new Cart(session()->get('cart'));
    	}else{
    		$cart = new Cart();
    	}
    	$cart->add($product);


    	session()->put('cart',$cart);
    	 notify()->success('Product added to cart!');
        return redirect()->back();
    }
    public function showCart(){
        if(session()->has('cart')){
    		$cart = new Cart(session()->get('cart'));
    	}else{
    		$cart = new Cart();
        }

        return view('cart',compact('cart'));
    }
    public function updateCart(Request $request, Product $product){
        $request->validate([
    		'qty'=>'required|numeric|min:1'
    	]);
        $cart =new Cart(session()->get('cart'));
        $cart->updateQty($product->id,$request->qty);
        session()->put('cart',$cart);
        notify()->success(' Cart updated successfully!');
        return redirect()->back();
    }
    public function removeCart(Product $product){
        $cart = new Cart(session()->get('cart'));
        $cart->remove($product->id);
        if($cart->totalQty<=0){
    		session()->forget('cart');
    	}else{
    		session()->put('cart',$cart);
    	}
    	notify()->success('Cart updated successfully!');
            return redirect()->back();
    }
    public function order(){
        if(session()->has('cart')){
    		$cart = new Cart(session()->get('cart'));
    	}else{
    		$cart = new Cart();
    	}

        return view('order',compact('cart'));

    }
    public function userOrder(){
        $orders = Order::latest()->get();
        return view('admin.order.index',compact('orders'));
    }
    public function viewUserOrder($orderid){
        $users = Order::find($orderid);
        $orders = $users->where('id',$orderid);
        $carts =$orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
        return view('admin.order.show',compact('carts'));
    }

}
