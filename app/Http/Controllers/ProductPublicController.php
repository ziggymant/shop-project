<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Cart;
use App\Review;
use App\Category;

class ProductPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sort = "newest")
    {
      // $products = Product::all();
      if($sort == "price_asc") {$products = Product::orderBy('price', 'asc')->paginate(9);}
      elseif($sort == "price_desc") {$products = Product::orderBy('price', 'desc')->paginate(9);}
      elseif($sort == "newest") {$products = Product::orderBy('created_at', 'desc')->paginate(9);}
      elseif($sort == "oldest") {$products = Product::orderBy('created_at', 'asc')->paginate(9);}
      else {$products = Product::all();
      }

      // $products->paginate($id);
      return view('index',compact('products'));
    }

    public function item($id){
      $product = Product::findOrFail($id);

      return view('shop.item', compact( 'product'));
    }

    public function storeReview(Request $request){
      $input = $request->all();
      $input['user_id'] = Auth::id();
      Review::create($input);
      return redirect()->back();
    }

    public function home()
    {
      $cart = Cart::where('user_id',Auth::user()->id)->first();
      $items = $cart->cartItems;
      $products = Product::all();
      return view('shop.categories',compact('products','items'));
    }

    public function category($id){
      $products = Product::where('category_id', $id)->get();
      return view('shop.category', compact('products'));
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
