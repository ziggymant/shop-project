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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="{{url('/shop/products')}}">Store</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                  </ul>

                  <ul class="nav navbar-nav navbar-right">


                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                @if (Auth::user()->isAdmin())
                                  <li>
                                      <a href="admin">Admin page</a>
                                  </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                      @if(!Auth::user())
                          <li><a href="/auth/login">Login</a></li>
                          <li><a href="/auth/register">Signup</a></li>
                      @else
                          <li><a href="/order">My Order <span class="fa fa-briefcase"></span></a></li>
                          <li><a href="{{url('shop/cart')}}">Cart <span class="fa fa-shopping-cart"></span></a></li>
                      @endif
                  </ul>



            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

@yield('content')



        <hr>

        <!-- Footer -->
        <footer>

        </footer>


    <!-- jQuery -->
    <script src="{{asset('js/libs.js')}}"></script>

</body>

</html>
