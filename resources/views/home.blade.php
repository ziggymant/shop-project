@extends('layouts.blog-home')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- First Blog Post -->
    @foreach($posts as $post)
    <h2>
        <a href="#">{{$post->title}}</a>
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
