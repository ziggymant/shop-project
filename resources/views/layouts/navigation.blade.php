<nav id="shop-nav" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
                    <a href="#">Placehold</a>
                </li>
                <li>
                    <a href="{{url('blog/posts')}}">Blog</a>
                </li>
              </ul>

              <ul class="nav navbar-nav navbar-right">
                @if(Auth::user())
                    <li><a href="{{url('/shop/orders')}}">My Orders <span class="fa fa-briefcase"></span></a></li>
                    <li><a href="{{url('shop/cart')}}">Cart {{Auth::user()->cartItems() ? "(" .Auth::user()->cartItems(). ")" : ""}} <span class="fa fa-shopping-cart"></span></a></li>
                @endif

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
                                  <a href="{{url('/admin/index')}}">Admin page</a>
                              </li>
                            @endif
                        </ul>
                    </li>
                @endif
              </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
