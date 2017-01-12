@extends('layouts.shop')
<!-- Page Content -->
@section('styles')
  <link href="css/shop-homepage.css" rel="stylesheet">
@endsection
@section('content')

<div class="row">

    <div class="col-md-12">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
              <div class="item active">
                  <h3><span>Adverts text placeholder 1</span></h3>
                  <img class="slide-image" src="/photos/shop1-800x300.jpg" alt="">

              </div>
              <div class="item">
                  <h3><span>Adverts text placeholder 2</span></h3>
                  <img class="slide-image" src="/photos/shop2-800x300.jpg" alt="">
              </div>
              <div class="item">
                  <h3><span>Adverts text placeholder 3</span></h3>
                  <img class="slide-image" src="/photos/shop3-800x300.jpg" alt="">
              </div>
          </div>
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
      </div>
  </div>

</div>

<div class="row">
  <div class="col-md-12">

      <div class="dropdown pull-right">
      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        Sort by
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a href="{{url('/newest')}}">Newest</a></li>
        <li><a href="{{url('/oldest')}}">Oldest</a></li>
        <li><a href="{{url('/price_asc')}}">Price: low to high</a></li>
        <li><a href="{{url('/price_desc')}}">Price: high to low</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="row">

  @if($products)
    @foreach($products as $product)
                  <div class="col-sm-4 col-lg-4 col-md-4">
                    <a href="{{url('item', $product->id)}}">
                      <div class="thumbnail">
                        <div class="">
                          <img height="150" src="/images/{{$product->imageurl}}" alt="">
                        </div>

                          <div class="caption">
                              <h4 class="pull-right">${{$product->price}}</h4>
                              <h4><a href="#">{{$product->name}}</a>
                              </h4>
                              <p>{{$product->description}}</p>
                          </div>
                          <div class="ratings">
                            @if($product->score() > 0)
                              <p class="pull-right">{{count($product->reviews) ==1 ? count($product->reviews). " review": count($product->reviews). " reviews"}}</p>
                              <p>
                                @for ($i=0; $i < $product->score(); $i++)
                                  <span class="glyphicon glyphicon-star"></span>
                                @endfor
                                  {{$product->score()}}/5 stars
                              </p>
                            @else
                              <p>No rating yet</p>
                            @endif
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                {!!Form::open(['method'=>'GET', 'action'=>['CartController@addItem',$product->id ]])!!}
                                    {!!Form::button('<span class="fa fa-shopping-cart"> Add to cart</span>', ['id'=>'', 'class'=>'btn btn-success btn-product', 'type'=>'submit'])!!}
                                {!!Form::close()!!}
                              </div>
                          </div>
                      </div>
                    </a>

                  </div>
    @endforeach
  @endif

  <div class="row">
    <div class="col-sm-6 col-sm-offset-5">
        {{$products->render()}}
    </div>
  </div>


</div>


@endsection
