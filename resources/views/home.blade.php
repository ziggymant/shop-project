@extends('layouts.shop')
<!-- Page Content -->
@section('styles')
  <link href="css/shop-homepage.css" rel="stylesheet">
@endsection
@section('content')


<div id="shop-content" class="container">

    <div class="row">

        <div class="col-sm-3 col-md-3">
            <p class="lead">Shop Name</p>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input id="search" type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <div  class="search-result list-group">
                              <ul id="search-suggest">
                                {{-- ajax input goes here --}}
                              </ul>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i> Books<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route("users.index")}}">All books</a>
                                </li>
                                <li>
                                    <a href="{{route("users.create")}}">Science</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>



                        <li>
                            <a href="#"><i class="fa fa-laptop fa-fw"></i> Computers<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route("posts.index")}}">All Computers</a>
                                </li>
                                <li>
                                    <a href="{{route("posts.create")}}">Dell</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-print fa-fw"></i> Office equipment<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route("categories.index")}}">All Categories</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-shopping-cart fa-fw"></i>Other Products<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('admin/shop/products')}}">Bicycles</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
        </div>

        <div class="col-md-9">

            <div class="row carousel-holder">

                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="slide-image" src="/photos/shop1-800x300.jpg" alt="">

                            </div>
                            <div class="item">
                                <img class="slide-image" src="/photos/shop2-800x300.jpg" alt="">
                            </div>
                            <div class="item">
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
                            <p class="pull-right">{{count($product->review) ==1 ? count($product->review). " review": count($product->review). " reviews"}}</p>
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


            </div>

        </div>

    </div>

</div>
<!-- /.container -->

@endsection
