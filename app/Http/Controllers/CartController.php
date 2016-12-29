<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  public function addItem ($productId){

      $cart = Cart::where('user_id',Auth::user()->id)->first();

      if(!$cart){
          $cart =  new Cart();
          $cart->user_id=Auth::user()->id;
          $cart->save();
      }

      $cartItem  = new Cartitem();
      $cartItem->product_id=$productId;
      $cartItem->cart_id= $cart->id;
      $cartItem->save();

      return redirect('/cart');

  }

  public function showCart(){
        $cart = Cart::where('user_id',Auth::user()->id)->first();

        if(!$cart){
            $cart =  new Cart();
            $cart->user_id=Auth::user()->id;
            $cart->save();
        }

        $items = $cart->cartItems;
        $total=0;
        foreach($items as $item){
            $total+=$item->product->price;
        }

        return view('shop.cart',['items'=>$items,'total'=>$total]);
    }

    public function removeItem($id){

        CartItem::destroy($id);
        return redirect('/cart');
    }
}
