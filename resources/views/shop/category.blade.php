@extends('layouts.shop')

@section('styles')
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link href="{{url("css/starrating.css")}}" rel="stylesheet">
@endsection
@section('content')
        <!-- Project One -->
<div class="row">
    @if($products)
      @foreach($products as $product)
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img height="170" class="img-responsive" src="{{url('images', $product->imageurl)}}" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3></h3>
                <h4>{{$product->name}}</h4>
                <h4 >${{$product->price}}</h4>
                {{-- <h4>{{count($product->reviews)}} Reviews</h4> --}}
                <div class="ratings">
                    <p class="pull-right">{{count($product->reviews) ==1 ? count($product->reviews). " review": count($product->reviews). " reviews"}}</p>
                      <p>
                        @for ($i=0; $i < $product->score(); $i++)
                          <span class="glyphicon glyphicon-star"></span>
                        @endfor
                          {{$product->score()}}/5 stars
                      </p>
                </div>
                <p>{{$product->description}}</p>
                <a class="btn btn-primary" href="{{url('item', $product->id)}}">View Product <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <hr>
      @endforeach
    @endif
        <!-- /.row -->

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
