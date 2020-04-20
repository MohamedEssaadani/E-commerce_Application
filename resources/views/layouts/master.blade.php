<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SurveyCShop | @yield('title')</title>

  <!-- Font awesome -->
  <link href="../assets/css/font-awesome.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <!-- SmartMenus jQuery Bootstrap Addon CSS -->
  <link href="../assets/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
  <!-- Product view slider -->
  <link rel="stylesheet" type="text/css" href="../assets/css/jquery.simpleLens.css">
  <!-- slick slider -->
  <link rel="stylesheet" type="text/css" href="../assets/css/slick.css">
  <!-- price picker slider -->
  <link rel="stylesheet" type="text/css" href="../assets/css/nouislider.css">
  <!-- Theme color -->
  <link id="switcher" href="../assets/css/theme-color/default-theme.css" rel="stylesheet">
  <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
  <!-- Top Slider CSS -->
  <link href="../assets/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

  <!-- Main style sheet -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- Google Font -->
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  @yield('extra-head')

</head>

<body>
  <div id="app">
    <!-- wpf loader Two
        *I comment this loader when it give me problem in cart vue it load without stopping
        <div id="wpf-loader-two">          
          <div class="wpf-loader-two-inner">
            <span>Loading</span>
          </div>
        </div> -->
    <!-- / wpf loader Two -->
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->


    <!-- Start header section -->
    <header id="aa-header">
      <!-- start header top  -->
      <div class="aa-header-top">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="aa-header-top-area">
                <!-- start header top left -->
                <div class="aa-header-top-left">


                  <!-- / currency -->
                  <!-- start cellphone -->
                  <div class="cellphone hidden-xs">
                    <p><span class="fa fa-phone"></span>+212-6-94-49-67-95</p>
                  </div>
                  <!-- / cellphone -->
                </div>
                <!-- / header top left -->
                <div class="aa-header-top-right">
                  <ul class="aa-head-top-nav-right">
                    <li class="hidden-xs"><a href="{{route('cart.index')}}">My Cart</a></li>
                    <li class="hidden-xs"><a href="#">Checkout</a></li>
                    @guest
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item">
                      <a href="{{route('user.edit')}}" class="nav-link">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        Logout
                      </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                    @endguest
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- / header top  -->

      <!-- start header bottom  -->
      <div class="aa-header-bottom">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="aa-header-bottom-area">
                <!-- logo  -->
                <div class="aa-logo">
                  <!-- Text based logo -->
                  <a href="{{route('landingPage')}}">
                    <span class="fa fa-shopping-cart"></span>
                    <p>Survey<strong>CShop</strong> <span>Your Shopping Partner</span></p>
                  </a>
                  <!-- img based logo -->
                  <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
                </div>
                <!-- / logo  -->
                <!-- cart box -->
                <div class="aa-cartbox">
                  <a class="aa-cart-link" href="{{route('cart.index')}}">
                    <span class="fa fa-shopping-basket"></span>
                    <span class="aa-cart-title">SHOPPING CART</span>
                    @if(Cart::instance('default')->count()>0)
                    <span class="aa-cart-notify">{{Cart::instance('default')->count()}}</span>
                    @endif
                  </a>
                  <div class="aa-cartbox-summary">
                    @if(Cart::count()>0)
                    <ul>
                      @foreach(Cart::content() as $item)
                      <li>
                        <a class="aa-cartbox-img" href="#"><img
                            src="{{asset('../assets/img/productsImages/'.$item->model->slug.'.jpg')}}" alt="img"></a>
                        <div class="aa-cartbox-info">
                          <h4><a href="#">{{$item->model->nale}}</a></h4>
                          <p>{{$item->qty}} x <?php echo '$' . $item->model->price ?></p>
                        </div>
                        <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                      </li>
                      @endforeach
                      <li>
                        <span class="aa-cartbox-total-title">
                          Total
                        </span>
                        <span class="aa-cartbox-total-price">
                          $500
                        </span>
                      </li>
                    </ul>
                    @endif
                    <a class="aa-cartbox-checkout aa-primary-btn" href="">Checkout</a>
                  </div>
                </div>
                <!-- / cart box -->


                <!-- search box -->
                <div class="aa-search-box">
                  <form action="{{route('search')}}" method="GET">
                    <input type="text" name="query" id="query" value="{{request()->input('query')}}"
                      placeholder="Search here ex. 'iPhone' ">
                    <button type="submit"><span class="fa fa-search"></span></button>
                  </form>
                </div>

                <!-- / search box 
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / header bottom  -->
    </header>
    <!-- / header section -->
    <!-- menu -->
    <section id="menu">
      <div class="container">
        <div class="menu-area">
          <!-- Navbar -->
          <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="navbar-collapse collapse">
              <!-- Left nav -->
              {{menu('main', 'partials.menus.main')}}
            </div>
            <!--/.nav-collapse -->
          </div>
        </div>
      </div>
    </section>
    <!-- / menu -->
    <div>
      @yield('content')
    </div>

    <!-- footer -->
    <footer id="aa-footer">
      <!-- footer bottom -->
      <div class="aa-footer-top">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="aa-footer-top-area">
                <div class="row">
                  <div class="col-md-3 col-sm-6">
                    <div class="aa-footer-widget">
                      <h3>Main Menu</h3>
                      <ul class="aa-footer-nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Our Products</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                    <div class="aa-footer-widget">
                      <div class="aa-footer-widget">
                        <h3>Knowledge Base</h3>
                        <ul class="aa-footer-nav">
                          <li><a href="#">Delivery</a></li>
                          <li><a href="#">Returns</a></li>
                          <li><a href="#">Services</a></li>
                          <li><a href="#">Discount</a></li>
                          <li><a href="#">Special Offer</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                    <div class="aa-footer-widget">
                      <div class="aa-footer-widget">
                        <h3>Useful Links</h3>
                        <ul class="aa-footer-nav">
                          <li><a href="#">Site Map</a></li>
                          <li><a href="#">Search</a></li>
                          <li><a href="#">Advanced Search</a></li>
                          <li><a href="#">Suppliers</a></li>
                          <li><a href="#">FAQ</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                    <div class="aa-footer-widget">
                      <div class="aa-footer-widget">
                        <h3>Contact Us</h3>
                        <address>
                          <p>Maroc</p>
                          <p><span class="fa fa-phone"></span>+212-6-94-49-67-95</p>
                          <p><span class="fa fa-envelope"></span>essaadani80@gmail.com</p>
                        </address>
                        <div class="aa-footer-social">
                          <a href="#"><span class="fa fa-facebook"></span></a>
                          <a href="#"><span class="fa fa-twitter"></span></a>
                          <a href="#"><span class="fa fa-google-plus"></span></a>
                          <a href="#"><span class="fa fa-youtube"></span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- footer-bottom -->
      <div class="aa-footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="aa-footer-bottom-area">
                <div class="aa-footer-payment">
                  <span class="fa fa-cc-mastercard"></span>
                  <span class="fa fa-cc-visa"></span>
                  <span class="fa fa-paypal"></span>
                  <span class="fa fa-cc-discover"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- / footer -->

    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4>Login or Register</h4>
            <form class="aa-login-form" action="">
              <label for="">Username or Email address<span>*</span></label>
              <input type="text" placeholder="Username or email">
              <label for="">Password<span>*</span></label>
              <input type="password" placeholder="Password">
              <button class="aa-browse-btn" type="submit">Login</button>
              <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me
              </label>
              <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
              <div class="aa-register-now">
                Don't have an account?<a href="account.html">Register now!</a>
              </div>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
  </div>

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../assets/js/bootstrap.js"></script>
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="../assets/js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="../assets/js/jquery.smartmenus.bootstrap.js"></script>
  <!-- To Slider JS -->
  <script src="../assets/js/sequence.js"></script>
  <script src="../assets/js/sequence-theme.modern-slide-in.js"></script>
  <!-- Product view slider -->
  <script type="text/javascript" src="../assets/js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="../assets/js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="../assets/js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="../assets/js/custom.js"></script>

  <script src="../assets/js/app.js"></script>
  @yield('extra-js')
</body>

</html>