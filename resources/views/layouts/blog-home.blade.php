<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    {{-- <link href="css/blog-home.css" rel="stylesheet"> --}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    @yield('title')
                    <small>Secondary Text</small>
                </h1>

@yield('content')


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    {!!Form::open()!!}
                      <div class="input-group">
                          <input id="search" type="text" class="form-control">
                          <span class="input-group-btn">
                              <button class="btn btn-default" type="button">
                                  <span class="glyphicon glyphicon-search"></span>
                          </button>
                          </span>
                      </div>
                    {!!Form::close()!!}
                    <!-- /.input-group -->
                    <div  class="search-result list-group">
                      <ul id="search-suggest">
                        {{-- ajax input goes here --}}
                      </ul>
                    </div>
                </div>


                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                              @if($categories1)
                                @foreach($categories1 as $category)
                                  <li><a href="#">{{$category->name}}</a></li>
                                @endforeach
                              @endif
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                              @if($categories2)
                                @foreach($categories2 as $category)
                                  <li><a href="#">{{$category->name}}</a></li>
                                @endforeach
                              @endif
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

    </div>

    <!-- Footer -->
    <section class="container-fluid" >
      <div class="row" id="section7">
          <!--fontawesome icons-->
          <div class="col-sm-1 col-sm-offset-3 col-xs-4 text-center">
              <i class="fa fa-github fa-4x"></i>
          </div>
          <div class="col-sm-1 col-xs-4 text-center">
              <i class="fa fa-foursquare fa-4x"></i>
          </div>
          <div class="col-sm-1 col-xs-4 text-center">
              <i class="fa fa-pinterest fa-4x"></i>
          </div>
          <div class="col-sm-1 col-xs-4 text-center">
              <i class="fa fa-google-plus fa-4x"></i>
          </div>
          <div class="col-sm-1 col-xs-4 text-center">
              <i class="fa fa-twitter fa-4x"></i>
          </div>
          <div class="col-sm-1 col-xs-4 text-center">
              <i class="fa fa-dribbble fa-4x"></i>
          </div>
      </div>
    </section>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-3 column">
                    <h4>Information</h4>
                    <ul class="nav">
                        <li><a href="about-us.html">Products</a></li>
                        <li><a href="about-us.html">Services</a></li>
                        <li><a href="about-us.html">Benefits</a></li>
                        <li><a href="elements.html">Developers</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-md-3 column">
                    <h4>Follow Us</h4>
                    <ul class="nav">
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Google+</a></li>
                        <li><a href="#">Pinterest</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-md-3 column">
                    <h4>Contact Us</h4>
                    <ul class="nav">
                        <li><a href="#">Email</a></li>
                        <li><a href="#">Headquarters</a></li>
                        <li><a href="#">Management</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-md-3 column">
                    <h4>Customer Service</h4>
                    <ul class="nav">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
            </div>
            <!--/row-->
            <p class="text-center">©2015</p>
        </div>
    </footer>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{asset('js/libs.js')}}"></script>
    <script type="text/javascript" src="{{url("js/livesearch.js")}}"></script>

    @yield('scripts')

</body>

</html>
