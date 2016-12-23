@extends('layouts.admin')

@section('content')

  <h1>Categories</h1>

  @if (Session::has('message'))
    <p class="text-success">{{Session('message')}}</p>
  @endif

  <div class="col-sm-6">

    {!!Form::open(['method'=>'POSTS', 'action'=>'AdminCategoriesController@store'])!!}

      <div class="form-group">
        {!!Form::label('name', 'Name')!!}
        {!!Form::text('name', null, ['class'=>'form-control'])!!}
      </div>
      <div class="form-group">
        {!!Form::submit('Create category', ['class'=>'btn btn-primary'])!!}
      </div>
    {!!Form::close()!!}

  </div>

  <div class="col-sm-6">

@if ($categories)

    <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created date</th>
      </tr>
    </thead>
    <tbody>
@foreach($categories as $category)
      <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->created_at ? $category->created_at->diffForHumans() : "No date" }}</td>
      </tr>
@endforeach
    </table>
@endif

  </div>



@endsection
