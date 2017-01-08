<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Cart;
use App\Review;

class ProductPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cart = Cart::where('user_id',Auth::user()->id)->first();
      $items = $cart->cartItems;
      $products = Product::all();
      return view('shop.index',compact('products','items'));
    }

    public function item($id){
      $reviews = Review::where('product_id', $id)->get();
      $product = Product::findOrFail($id);
      $score = Review::score($id);
      $cart = Cart::where('user_id',Auth::user()->id)->first();
      $items = $cart->cartItems;
      return view('shop.item', compact('items', 'product', 'reviews', 'score'));
    }

    public function storeReview(Request $request){
      $input = $request->all();
      $input['user_id'] = Auth::id();
      Review::create($input);
      return redirect()->back();
    }

    public function categories()
    {
      $cart = Cart::where('user_id',Auth::user()->id)->first();
      $items = $cart->cartItems;
      $products = Product::all();
      return view('shop.categories',compact('products','items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function search($q) {
       $products = Product::where("name", "like", $q."%")->pluck("name", "id");
       // dd($posts);
       if ($products) {
         return $products;
       } else {
         exit();
       }
       exit();
     }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
