@extends('layouts.admin')

@section('content')

<h1>Posts</h1>

<table class="table">
<thead>
  <tr>
    <th>Post id</th>
    <th>Photo</th>
    <th>User</th>
    <th>Category</th>
    <th>Title</th>
    <th>Body</th>
    <th>Created at</th>
    <th>Updated at</th>
  </tr>
</thead>
<tbody>
@if($posts)
  @foreach ($posts as $post)
  <tr>

    <td>{{$post->id}}</td>
    <td><img height="50" src="{{$post->photo ? $post->photo->path : "images/default.jpg"}}" alt=""></td>
    <td>{{$post->user->name}}</td>
    <td>{{$post->category ? $post->category->name : "uncategorized"}}</td>
    <td>{{$post->title}}</td>
    <td>{{$post->body}}</td>
    <td>{{$post->created_at->diffForHumans()}}</td>
    <td>{{$post->updated_at}}</td>
  </tr>
  @endforeach
@endif
</tbody>
</table>

@endsection
