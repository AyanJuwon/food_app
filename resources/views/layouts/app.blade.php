<!DOCTYPE html>
<html lang="en">


<!-- molla/index-14.html  22 Nov 2019 09:59:31 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Food App</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <meta name="theme-color" content="#ffffff">
 {{--   <link rel="stylesheet"
         href="{{ asset('assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}"> --}}
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery.countdown.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skins/skin-demo-14.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/demos/demo-14.css') }}"> --}}
    @yield('css')
</head>

<body>
    <div class="page-wrapper">
        <header class="header header-14">
            <div class="header-top">
                <div class="container">


@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error')    }}
    </div>
@endif
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success')    }}
    </div>
@endif


                    @include('partials.success')
                    @include('partials.list_error')


                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-auto col-lg-3 col-xl-3 col-xxl-2">
                            <button class="mobile-menu-toggler">
                                <span class="sr-only">Toggle mobile menu</span>
                                <i class="icon-bars"></i>
                            </button>
                            <a href="/" class="logo">
                                <h1>Food App</h1>
                            </a>
                        </div><!-- End .col-xl-3 col-xxl-2 -->

                        <div class="col col-lg-9 col-xl-9 col-xxl-10 header-middle-right">
                            <div class="row">
                                <div class="col-lg-8 col-xxl-4-5col d-none d-lg-block">
                                    <div
                                        class="header-search header-search-extended header-search-visible header-search-no-radius">
                                        <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                                        <form action="{{ route('menus.search') }}" method="get">
                                            <div class="header-search-wrapper search-wrapper-wide">
                                                @csrf

                                                <label for="search" class="sr-only">Search</label>
                                                <input type="search" value="{{request()->query('search')}}" class="form-control" name="search" id="q"
                                                    placeholder="Search our Menu ..." required>

                                                <button class="btn btn-primary" type="submit"><i
                                                        class="icon-search"></i></button>
                                            </div><!-- End .header-search-wrapper -->
                                        </form>
                                    </div><!-- End .header-search -->
                                </div><!-- End .col-xxl-4-5col -->

                                <div class="col-lg-4 col-xxl-5col d-flex justify-content-end align-items-center">
                                    <div class="header-dropdown-link">



                                     <a href="{{route('cart.index')}}">   <div class="dropdown cart-dropdown">
                                            <a href="{{ route('cart.index') }}" class="dropdown-toggle" >
                                                <i class="icon-shopping-cart"></i>
                                                <span class="cart-count">
                                                    {{ \Gloudemans\Shoppingcart\Facades\Cart::count() }}

                                                </span>
                                                <span class="cart-txt">Cart</span>
                                            </a>

                                        </div>
                                    </div>

                                </a><!-- End .col-xxl-5col -->
                                </div><!-- End .row -->
                            </div><!-- End .col-xl-9 col-xxl-10 -->
                        </div><!-- End .row -->
                    </div><!-- End .container-fluid -->
                </div><!-- End .header-middle -->
 {{-- <p class="text-success">Help</p> --}}

                <div class="header-bottom sticky-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-auto col-lg-3 col-xl-3 col-xxl-2 header-left">
                                <div class="dropdown category-dropdown show is-on" data-visible="true">
                                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" data-display="static"
                                        title="Browse Categories">
                                        Browse Categories
                                    </a>

                                    <div class="dropdown-menu ">
                                        <nav class="side-nav">
                                            <ul class="menu-vertical sf-arrows">
                                                <li class="megamenu-container">
                                                    @foreach (\App\Models\Category::all() as $category)


                                                        <a class="sf-with-ul"
                                                            href="{{ route('category', $category) }}">{{ $category->name }}</a>
                                                    @endforeach

                                                </li>

                                            </ul><!-- End .menu-vertical -->
                                        </nav><!-- End .side-nav -->
                                    </div><!-- End .dropdown-menu -->
                                </div><!-- End .category-dropdown -->
                            </div><!-- End .col-xl-3 col-xxl-2 -->

                            <div class="col col-lg-6 col-xl-6 col-xxl-8 header-center">
                                <nav class="main-nav">
                                    <ul class="menu sf-arrows">
                                        <li>
                                            <a href="{{ route('menus.list') }}" class="sf-with-ul">Menu List</a>
                                        </li>
                                        <li>
                                            <a href="" class="sf-with-ul">Menu Categories</a>
                                            <ul>
                                                @foreach (\App\Models\Category::all() as $category)
                                                    <li>
                                                        <a href="{{ route('category', $category) }}"
                                                            class="sf-with-ul">{{ $category->name }}</a>    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @if (\App\Models\Orders::where('tracking', 0)->orWhere('tracking', 1)->count() > 0)


                                        <li>@foreach (\App\Models\Orders::where('tracking', 0)->orWhere('tracking', 1)->orderBy('created_at','desc')->get()->take(1) as $pendingOrder )
<a href="{{ route('myOrder',$pendingOrder->id) }}" class="sf-with-ul">View pending order</a>
                                        @endforeach

                                        </li>@endif

                                    </ul><!-- End .menu -->
                                </nav><!-- End .main-nav -->
                            </div><!-- End .col-xl-9 col-xxl-10 -->


                        </div><!-- End .row -->
                    </div><!-- End .container-fluid -->
                </div><!-- End .header-bottom -->
        </header><!-- End .header -->


        @yield('content')
        <footer class="footer">


        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>


    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin"
                                        role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                                        aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel"
                                    aria-labelledby="signin-tab">

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="singin-email">email address *</label>
                                            <input name="email" type="text" class="form-control" id="singin-email"
                                                required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input name="password" type="password" class="form-control"
                                                id="singin-password" required>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>


                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="firstName">First Name *</label>
                                            <input type="text" name="firstName" class="form-control" id="register-email"
                                                required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="lastName">Last Name *</label>
                                            <input type="text" class="form-control" id="register-email" name="lastName"
                                                required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email" name="email"
                                                required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password"
                                                name="password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Confirm Password *</label>
                                            <input type="password" class="form-control" id="register-password"
                                                name="password_confirmation" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy"
                                                    required>
                                                <label class="custom-control-label" for="register-policy">I agree to the
                                                    <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


    <!-- Plugins JS File -->
    @yield('scripts')
    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/superfish.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/demos/demo-14.js') }}"></script>
</body>


<!-- molla/index-14.html  22 Nov 2019 09:59:54 GMT -->

</html>
