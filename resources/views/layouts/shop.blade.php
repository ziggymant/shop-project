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

    @yield('styles')
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    {{-- <link href="css/styles.css" rel="stylesheet"> --}}

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
  <div class="row">
    <div id="page-title" class="">
      <h1>@yield('title')</h1>
    </div>
  </div>

    <div id="shop-content" class="container">

            <div class="col-md-3 navbar-default sidebar">

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
                                        <a href="{{url("category", 4)}}">All books</a>
                                    </li>
                                    <li>
                                        <a href="{{url("category", 4)}}">Science</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-laptop fa-fw"></i> Computers<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{url("category", 1)}}">All Computers</a>
                                    </li>
                                    <li>
                                        <a href="{{url("category", 1)}}">Dell</a>
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

            <div class="col-md-9">

                @yield('content')


            </div>


  </div>

        <hr>

@include('layouts.footer')


    <!-- jQuery -->
    <script src="{{asset('js/libs.js')}}"></script>
    <script src="{{url("js/productsearch.js")}}"></script>
    @yield('scripts')

</body>

</html>
