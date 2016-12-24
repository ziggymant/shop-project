@extends('layouts.admin')

@section('content')

<h1>Create Post</h1>

@include('includes.errors')

{!!Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true])!!}

  <div class="form-group">
  {!!Form::label('title', 'Title')!!}
  {!!Form::text('title', null, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
  {!!Form::label('category_id', 'Category')!!}
  {!!Form::select('category_id', $categories , null, ['class'=>'form-control'])!!}
  </div>

  <div class="form-group">
  {!!Form::label('photo_id', 'Photo')!!}
  {!!Form::file('photo_id', ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
  {!!Form::label('body', 'Post')!!}
  {!!Form::textarea('body', null, ['class'=>'form-control'])!!}
  </div>

  <div class="form-group">
{!!Form::submit('Create post', ['class'=>'btn btn-primary'])!!}
</div>

{!!Form::close()!!}

@endsection
