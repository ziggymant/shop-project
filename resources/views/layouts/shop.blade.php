<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    @yield('styles')


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

  <div class="container">

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
                                        <a href="{{url("category", 7)}}">All books</a>
                                    </li>
                                    <li>
                                        <a href="{{url("category", 7)}}">Science</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-laptop fa-fw"></i> Computers<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{url("category", 8)}}">All Computers</a>
                                    </li>
                                    <li>
                                        <a href="{{url("category", 8)}}">Dell</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-print fa-fw"></i> Office equipment<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{url("category", 9)}}">All Categories</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-shopping-cart fa-fw"></i>Other Products<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{url("category", 10)}}">Bicycles</a>
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

                @yield('content')


            </div>

        </div>

  </div>



</div>





        <hr>

        <!-- Footer -->
        <section class="container-fluid" >
          <div class="row" id="section7">
              <!--fontawesome icons-->
              <div class="col-sm-1 col-sm-offset-3 col-xs-4 text-center">
                  <i class="fa fa-github fa-4x"></i>
              </div>
              <div class="col-sm-1 col-xs-4 text-center">
                  <i class="fa fa-facebook fa-4x"></i>
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
                <p class="text-center">©2017</p>
            </div>
        </footer>


    <!-- jQuery -->
    <script src="{{asset('js/libs.js')}}"></script>
    <script src="{{url("js/productsearch.js")}}"></script>
    @yield('scripts')

</body>

</html>
