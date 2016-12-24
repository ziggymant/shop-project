@extends('layouts.admin')

@section('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">

@endsection


@section('content')

  <h1>Upload media</h1>

  @include('includes.errors')

  {!!Form::open(['method'=>'POST', 'action'=>'AdminMediaConrtoller@store', 'class'=>'dropzone'])!!}


  {!!Form::close()!!}

@endsection

@section('scripts')

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

@endsection
