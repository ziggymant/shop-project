<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Photo;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::all();
      return view('admin.store.products', compact('products'));
    }

    public function newProduct(){
       return view('admin.store.new');
   }

   public function add(Request $request) {

      $input = $request->all();
        if($file = $request->file('imageurl')){
          $name = "shop_".time(). $file->getClientOriginalName();
          $name = str_replace(" ", "_", $name);
          $file->move('images', $name);
          $photo = Photo::create(['path'=>'name']);
          $input['imageurl'] = $name;
          $input['file_id'] = $photo->id;
        }

         if($file) {
         $extension = $file->getClientOriginalExtension();
         $entry = new \App\File();
         $entry->mime = $file->getClientMimeType();
         $entry->original_filename = $file->getClientOriginalName();
         $entry->filename = $name;
         $entry->save();
         } else {
           $entry = false;
         }

         Product::create($input);
         return redirect('/admin/shop/products');

   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
      Product::destroy($id);
      return redirect('/admin/shop/products');
    }
}
