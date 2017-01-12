@extends('layouts.admin')

@section('styles')

<script src="{{asset('/js/summernote.js')}}"></script>
<link href="{{asset('css/summernote.css')}}" rel="stylesheet">

@endsection


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
  {!!Form::textarea('body', null, ['class'=>'form-control', 'id' => 'summernote'])!!}
  </div>

  <div class="form-group">
{!!Form::submit('Create post', ['class'=>'btn btn-primary'])!!}
</div>

{!!Form::close()!!}

@endsection

@section('scripts')

    <script type="text/javascript">
    $('#summernote').summernote({
      height: 300,                 // set editor height
      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor
      focus: true                  // set focus to editable area after initializing summernote
    });
    </script>

@endsection
