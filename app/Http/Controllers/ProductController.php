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

        $image = $request->file('image');
        $img_name = "shop_".time(). $image->getClientOriginalName();
        $img_name = str_replace(" ", "_", $img_name);
        $image->move('images', $img_name);
        Photo::create(['path'=>$img_name]);

        $file = $request->file('file');
        $file_name = "storage_".$file->getClientOriginalName();
        $file_name = str_replace(" ", "_", $file_name);
        // $file->move('products', $file_name);

        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file_name,  File::get($file));

        $entry = new \App\File();
        // $entry-> = $file->getClientOriginalExtension();
        $entry->mime = $file->getClientMimeType();
        $entry->filename = $file_name;
        $entry->original_filename = $file->getClientOriginalName();
        $entry->save();

        $input['imageurl'] = $img_name;
        $input['file_id'] = $entry->id;

        $product = Product::create($input);
        $entry->update(['product_id'=>$product->id]);

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
