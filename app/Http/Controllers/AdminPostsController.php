<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Photo;
use App\Category;
use App\Comment;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::paginate(2);
        return view('admin.posts.index', compact('posts'));

    }

    public function post($slug){

      $post = Post::whereSlug($slug)->get()->first();
      $comments = $post->comments()->whereIsActive(1)->get();
      return view('post', compact('post', 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {

      $input = $request->all();
      $user = Auth::user();
      if($file = $request->file('photo_id')){
        $name = time(). $file->getClientOriginalName();
        $name = str_replace(' ', '_', $name);
        $file->move('images', $name);
        $photo = Photo::create(['path'=>$name]);
        $input['photo_id'] = $photo->id;
      }
      $user->posts()->create($input);
      return redirect('/admin/posts');
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
        $categories = Category::pluck('name', 'id');
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post', 'categories'));
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
        $input = $request->all();
        if($file = $request->file('photo_id')){
          $name = time(). $file->getClientOriginalName();
          $name = str_replace(' ', '_', $name);
          $file->move('images', $name);
          $photo = Photo::create(['path'=>$name]);
          $input['photo_id'] = $photo->id;
        }
        Auth::user()->posts()->whereId($id)->first()->update($input);
        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path() . $post->photo->path);
        $post->delete();
        return redirect('/admin/posts');
    }
}
