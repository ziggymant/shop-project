@extends('layouts.admin')

@section('New Product', 'Page Title')

@section('styles')

<script src="{{asset('/js/summernote.js')}}"></script>
<link href="{{asset('css/summernote.css')}}" rel="stylesheet">

@endsection

@section('content')

    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Edit Product</div>
        </div>
        <div class="panel-body" >

              {!!Form::model($product,['method'=>'PATCH', 'action'=>['ProductController@update', $product->id ], 'files'=>true])!!}

                    <!-- Text input-->
                    <div class="form-group">
                      {!!Form::label('name', 'Product name', ['class'=>'col-md-3 control-label'])!!}
                        <div class="col-md-9">
                          {!!Form::text('name', null, ['placeholder'=>'Product name','class'=>'form-control input-md'])!!}
                        </div>
                    </div>

                    <div class="form-group">
                      {!!Form::label('description', 'Description', ['class'=>'col-md-3 control-label'])!!}
                        <div class="col-md-9">
                          {!!Form::textarea('description', null, ['placeholder'=>'Description','id'=>'texarea', 'class'=>'form-control', 'id'=>'summernote'])!!}
                        </div>
                    </div>

                    <div class="form-group">
                      {!!Form::label('price', 'Price', ['class'=>'col-md-3 control-label'])!!}
                        <div class="col-md-9">
                          {!!Form::text('price', null, ['placeholder'=>'Price','class'=>'form-control input-md'])!!}
                        </div>
                    </div>

                    <div class="form-group">
                  		{!!Form::label('category_id', 'Category',  ['class'=>'col-md-3 control-label'])!!}
                      <div class="col-md-9">
                  		    {!!Form::select('category_id', $categories  , null, ['class'=>'form-control input-md'])!!}
                      </div>
                  	</div>

                    <div class="form-group">
                      {!!Form::label('image', 'Image', ['class'=>'col-md-3 control-label'])!!}
                        <div class="col-md-9">
                          {!!Form::file('image', null, ['id'=>'imageurl','class'=>'form-control input-md'])!!}
                        </div>
                    </div>

                    <div class="form-group">
                      {!!Form::label('file', 'Product', ['class'=>'col-md-3 control-label'])!!}
                        <div class="col-md-9 pull-right">
                          {!!Form::file('file', null, ['id'=>'imageurl','class'=>'form-control input-md'])!!}
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-9">
                          {!!Form::submit('submit', ['id'=>'submit','class'=>'btn btn-primary'])!!}
                        </div>
                    </div>

            {!!Form::close()!!}
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">
    $('#summernote').summernote({
      height: 300,                 // set editor height
      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor
      focus: true                  // set focus to editable area after initializing summernote
    });
    </script>

@endsection
