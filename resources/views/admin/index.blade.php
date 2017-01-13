@extends('layouts.admin')

@section('head')
  {!! Charts::assets() !!}

@endsection

@section('content')
  <div class="container-fluid">
    <div class="row ">
      <div class="panel">
        <div class="panel-body col-md-5">
          {!! $chart2->render() !!}
        </div>
        <div class="panel-body col-md-5">
          {!! $chart3->render() !!}
        </div>
      </div>
    </div>

    <div class="row ">
      <div class="panel">
        <div class="panel-body col-md-5">
          {!! $chart4->render() !!}
        </div>
        <div class="panel-body col-md-5">
          {!! $chart->render() !!}
        </div>
      </div>
    </div>
  </div>



@endsection
