@extends('layouts.shop')

@section('Admin shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')

  <div height="100px" class="row">

  </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($products as $product)

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail" >
                            <img id="thumb-image" src="/images/{{$product->imageurl}}" class="img-responsive">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <h3>{{$product->name}}</h3>
                                    </div>
                                    <div class="col-md-6 col-xs-6 price">
                                        <h3>
                                            <label>${{$product->price}}</label></h3>
                                    </div>
                                </div>
                                <p>{{$product->description}}</p>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                      {!!Form::open(['method'=>'GET', 'action'=>['CartController@addItem',$product->id ]])!!}
                                          {!!Form::button('<span class="fa fa-shopping-cart"> Add to cart</span>', ['id'=>'', 'class'=>'btn btn-success btn-product', 'type'=>'submit'])!!}
                                      {!!Form::close()!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
