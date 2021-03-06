@extends('layouts.admin')

@section('content')

  <h1>Categories</h1>

  @if (Session::has('message'))
    <p class="text-success">{{Session('message')}}</p>
  @endif

  <div class="col-sm-6">

    {!!Form::model($category,['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]])!!}

      <div class="form-group">
        {!!Form::label('name', 'Name')!!}
        {!!Form::text('name', null, ['class'=>'form-control'])!!}
      </div>
      <div class="form-group">
        {!!Form::submit('Edit category', ['class'=>'btn btn-primary col-sm-3'])!!}
      </div>
    {!!Form::close()!!}

    {!!Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]])!!}
      <div class="form-group">
        {!!Form::submit('Delete category', ['class'=>'btn btn-danger col-sm-3'])!!}
      </div>
    {!!Form::close()!!}

  </div>

@endsection
