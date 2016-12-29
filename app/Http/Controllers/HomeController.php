<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
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
