@extends('layouts.admin')

@section('Admin shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')


  <div class="panel panel-info">
      <div class="panel-heading">
          <div class="panel-title">All products</div>
      </div>
      <div class="panel-body" >

              <div class="row">
                  <div class="col-md-6">
                      <a href="{{url("/admin/shop/new")}}"><button class="btn btn-success">New Product</button></a>
                  </div>
              </div>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>File</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}$</td>
                                <td>Placehold</td>
                                <td><a href="/shop/product/destroy/{{$product->id}}"><button class="btn btn-danger">Delete</button></a> </td>
                            </tr>
                        @endforeach
                          </tbody>
                      </table>
          </div>
  </div>

@endsection
