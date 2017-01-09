@extends('layouts.shop')

@section('styles')
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link href="{{url("css/starrating.css")}}" rel="stylesheet">
@endsection
@section('content')


<div id="shop-content" style="padding-top:30px;" class="container">

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


            <!-- Page Content -->
     <div class="container">


                 <div class="thumbnail">
                     <img class="img-responsive" src="{{url('images', $product->imageurl)}}" alt="">
                     <div class="caption-full">
                         <h4 class="pull-right">${{$product->price}}</h4>
                         <h4><a href="#">{{$product->name}}</a>
                         </h4>
                         <p>{{$product->description}}</p>
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                     </div>
                     <div class="ratings">
                         <p class="pull-right">{{count($reviews)}} reviews</p>
                           <p>
                             @for ($i=0; $i < $score; $i++)
                               <span class="glyphicon glyphicon-star"></span>
                             @endfor
                               {{$score}}/5 stars
                           </p>
                     </div>
                 </div>

                 <div class="well">

                   <div class="well">
                       <h4>Leave a review:</h4>
                       {!!Form::open(['method'=>'POST', 'action'=>'ProductPublicController@StoreReview'])!!}
                         <input type="hidden" name="product_id" value="{{$product->id}}">
                         <div class="form-group">
                           {!!Form::label('review', 'Review')!!}
                           {!!Form::textarea('review', null, ['class'=>'form-control', 'rows'=>3])!!}
                           {{-- <label for="input-2" class="control-label">Rate This</label> --}}
                           <input id="input-5" name="rating" class="rating-loading" data-show-clear="false" data-show-caption="true">

                         </div>

                         <div class="form-group">
                           {!!Form::submit('Post review', ['class'=>'btn btn-primary'])!!}
                         </div>

                       {!!Form::close()!!}

                   </div>
                     <hr>
                    @if($reviews)
                      @foreach($reviews as $review)
                     <div class="row">
                         <div class="col-md-12">
                             @for ($i=0; $i < $review->rating; $i++)
                               <span class="glyphicon glyphicon-star"></span>
                             @endfor
                             ({{ $review->rating}}/5)
                             {{$review->user->name}}
                             <span class="pull-right">{{$review->created_at->diffforhumans()}}</span>
                             <p>{{$review->review}}</p>
                         </div>
                     </div>

                     <hr>
                    @endforeach
                  @elseif(emptyArray($reviews))

                    <h3 class="text-center">No reviews yet!</h3>
                   @endif

                 </div>

             </div>


     </div>
     <!-- /.container -->

            </div>

        </div>

    </div>

</div>
<!-- /.container -->

@endsection

@section('scripts')
<script type="text/javascript" src="{{url("js/starrating.js")}}">

</script>
<script>

$(document).on('ready', function(){
    $('#input-5').rating({clearCaption: 'No stars yet'});
});
</script>

@endsection
