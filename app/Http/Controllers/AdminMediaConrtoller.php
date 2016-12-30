<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Session;

class AdminMediaConrtoller extends Controller
{
    public function index(){

      $photos = Photo::all();

      return view('admin.media.index', compact('photos'));
    }

    public function create(){

      return view('admin.media.create');
    }

    public function store(Request $request) {
      $file = $request->file('file');
      $name = time() . $file->getClientOriginalName();
      $name = str_replace(" ", "_", $name);
      $file ->move('images', $name);
      Photo::create(['path'=> $name]);

    }

    public function destroy($id){
      $file = Photo::findOrFail($id);
      if(file_exists(public_path().$file->path)){
        unlink(public_path() . $file->path);
      }
      $file->delete();
      Session::flash('message', 'File ' .$file->path. ' has been deleted');
      return redirect('/admin/media');

    }
}
