@extends('layouts.admin')



@section('content')
  <h1>Media</h1>

  @if(Session::has('message'))
    <p class="text-success">{{Session('message')}}</p>
  @endif

  <table class="table">
  <thead>
    <tr>
      <th>Photo id</th>
      <th>Picture</th>
      <th>Path</th>
      <th>Created at</th>
      <th>Delte Image</th>
    </tr>
  </thead>
  <tbody>
  @if($photos)
    @foreach ($photos as $photo)
    <tr>
      <td>{{$photo->id}}</td>
      <td><img height="50" src="{{$photo->path}}" alt=""></td>
      <td>{{$photo->path}}</td>
      <td>{{$photo->created_at ? $photo->created_at : "No date"}}</td>
      <td>
        {!!Form::open(['method'=>'Delete', 'action'=>['AdminMediaConrtoller@destroy', $photo->id]])!!}
          {!!Form::submit('Delete Image', ['class'=>'btn btn-danger'])!!}
        {!!Form::close()!!}
      </td>
    </tr>
    @endforeach
  @endif
  </tbody>
  </table>


@endsection
