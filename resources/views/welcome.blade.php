@extends('layouts.blog-home')

@section('content')

  @foreach($posts as $post)
  <h2>
      <a href="{{route('home.post', $post->slug)}}">{{$post->title}}</a>
  </h2>
  <p class="lead">
      by <a href="index.php">{{$post->user->name}}</a>
  </p>
  <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}}</p>
  <hr>
  <img height="300" class="img-responsive" src="{{$post->photo->path}}" alt="">
  <hr>
  <p>{{str_limit($post->body, 300)}}</p>
  <a class="btn btn-primary" href="{{route('home.post', $post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

  <hr>
  @endforeach

@endsection

@section('categories')

  {{-- <!-- Blog Categories Well -->
  <div class="well">
      <h4>Blog Categories</h4>
      <div class="row">
          <div class="col-lg-6">
              <ul class="list-unstyled">
                @if($categories)
                  @foreach($categories->take(4) as $category)
                    <li><a href="#">{{$category->name}}</a></li>
                  @endforeach
                @endif
              </ul>
          </div>
          <!-- /.col-lg-6 -->
          <div class="col-lg-6">
              <ul class="list-unstyled">
                  <li><a href="#">Category Name</a>
                  </li>
                  <li><a href="#">Category Name</a>
                  </li>
                  <li><a href="#">Category Name</a>
                  </li>
                  <li><a href="#">Category Name</a>
                  </li>
              </ul>
          </div>
          <!-- /.col-lg-6 -->
      </div>
      <!-- /.row -->
  </div> --}}

@endsection
