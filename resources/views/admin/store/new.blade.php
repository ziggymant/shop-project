@extends('layouts.admin')

@section('New Product', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')


    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">New Product</div>
        </div>
        <div class="panel-body" >

              {!!Form::open(['method'=>'POST', 'action'=>'ProductController@add', 'files'=>true])!!}

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
                          {!!Form::textarea('description', null, ['placeholder'=>'Description','id'=>'texarea', 'class'=>'form-control'])!!}
                        </div>
                    </div>

                    <div class="form-group">
                      {!!Form::label('price', 'Price', ['class'=>'col-md-3 control-label'])!!}
                        <div class="col-md-9">
                          {!!Form::text('price', null, ['placeholder'=>'Price','class'=>'form-control input-md'])!!}
                        </div>
                    </div>

                    <div class="form-group">
                      {!!Form::label('image', 'Image', ['class'=>'col-md-3 control-label'])!!}
                        <div class="col-md-9">
                          {!!Form::file('image', null, ['id'=>'imageurl','class'=>'form-control input-md'])!!}
                        </div>
                    </div>

                    <div class="form-group">
                      {!!Form::label('file', 'Digital Product', ['class'=>'col-md-3 control-label'])!!}
                        <div class="col-md-9">
                          {!!Form::file('file', null, ['class'=>'form-control input-md'])!!}
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
