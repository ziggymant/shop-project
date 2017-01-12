@extends('layouts.admin')

@section('styles')

<script src="{{asset('/js/summernote.js')}}"></script>
<link href="{{asset('css/summernote.css')}}" rel="stylesheet">

@endsection

@section('content')

<h1>Edit Post</h1>

@include('includes.errors')

{!!Form::model($post,['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true])!!}

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
  {!!Form::textarea('body', null, ['class'=>'form-control', 'id'=>'summernote'])!!}
  </div>

  <div class="form-group">
{!!Form::submit('Edit post', ['class'=>'btn btn-primary col-sm-3'])!!}
</div>

{!!Form::close()!!}

{!!Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]])!!}

  <div class="form-group">
    {!!Form::submit('Delete post', ['class'=>'btn btn-danger col-sm-3'])!!}
  </div>

{!!Form::close()!!}

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
              height:300,
            });
        });
    </script>

@endsection
