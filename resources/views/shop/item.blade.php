@extends('layouts.shop')
@section('title', $product->name)

@section('styles')
  <link href="{{url("css/starrating.css")}}" rel="stylesheet">
  <link href="css/shop-homepage.css" rel="stylesheet">

@endsection
@section('content')

<div class="row">

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
                         <p class="pull-right">{{count($product->reviews)}} reviews</p>
                           <p>
                             @for ($i=0; $i < $product->score(); $i++)
                               <span class="glyphicon glyphicon-star"></span>
                             @endfor
                               {{$product->score()}}/5 stars
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
                    @if($product->reviews)
                      @foreach($product->reviews as $review)
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
