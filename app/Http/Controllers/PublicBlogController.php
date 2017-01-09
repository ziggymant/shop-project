<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PublicBlogController extends Controller
{
  public function index()
  {
    $categories1 = Category::take(4)->get();
    $categories2 = Category::skip(4)->take(4)->get();
    $posts = Post::orderBy('created_at','desc')->paginate(5);
    return view('welcome', compact('posts', 'categories1', 'categories2'));
  }

  public function welcome() {
      return view('welcome');
  }
}
