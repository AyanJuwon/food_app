<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food App | Home</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">

    <!-- Font awesome -->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">
    <!-- Gallery Lightbox -->
    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('assets/css/theme-color/default-theme.css') }}" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="{{ asset('homestyle.css') }}" rel="stylesheet">


    <!-- Google Fonts -->

    <!-- Prata for body  -->
    <link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>
    <!-- Tangerine for small title -->
    <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
    <!-- Open Sans for title -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body>

    <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- END SCROLL TOP BUTTON -->

    <!-- Start header section -->
    <header id="mu-header">
        <nav class="navbar navbar-default mu-main-navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- LOGO -->

                    <!--  Text based logo  -->
                    <a class="navbar-brand" href="#">Osteria<span>X</span></a>

                    <!--  Image based logo  -->
                    <!-- <a class="navbar-brand" href="#"><img src="{{ asset('assets/img/logo.png') }}" alt="Logo img"></a>  -->


                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
                        <li><a href="#">HOME</a></li>
                        <li><a href="#mu-about-us">ABOUT US</a></li>
                        <li><a href="#mu-restaurant-menu">MENU</a></li>
                        <li><a href="#mu-reservation">RESERVATION</a></li>
                        <li><a href="#mu-contact">CONTACT</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
    </header>
    <!-- End header section -->


    <!-- Start slider  -->
    <section id="mu-slider">
        <div class="mu-slider-area">

            <!-- Top slider -->
            <div class="mu-top-slider">

                <!-- Top slider single slide -->
                <div class="mu-top-slider-single">
                    <img src="{{ asset('assets/img/slider/index1.jpg') }}" alt="img">
                    <!-- Top slider content -->
                    <div class="mu-top-slider-content">
                        <span class="mu-slider-small-title">Welcome</span>
                        <h2 class="mu-slider-title">To The OsteriaX</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque voluptatem accusamus non
                            quidem, deleniti optio.</p>
                        <a href="{{route('menus')}}" class="mu-readmore-btn mu-reservation-btn">PLACE AN ORDER</a>
                    </div>
                    <!-- / Top slider content -->
                </div>
                <!-- / Top slider single slide -->

                <!-- Top slider single slide -->
                <div class="mu-top-slider-single">
                    <img src="{{ asset('assets/img/slider/index2.jpg ') }}" alt="img">
                    <!-- Top slider content -->
                    <div class="mu-top-slider-content">
                        <span class="mu-slider-small-title">The Elegant</span>
                        <h2 class="mu-slider-title">Italian Restaurant</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque voluptatem accusamus non
                            quidem, deleniti optio.</p>
                        <a href="{{route('menus')}}" class="mu-readmore-btn mu-reservation-btn">PLACE AN ORDER</a>
                    </div>
                    <!-- / Top slider content -->
                </div>
                <!-- / Top slider single slide -->

                <!-- Top slider single slide -->
                <div class="mu-top-slider-single">
                    <img src="{{ asset('assets/img/slider/index3.jpg ') }}" alt="img">
                    <!-- Top slider content -->
                    <div class="mu-top-slider-content">
                        <span class="mu-slider-small-title">Delicious</span>
                        <h2 class="mu-slider-title">Spicy Masalas</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque voluptatem accusamus non
                            quidem, deleniti optio.</p>
                        <a href="{{route('menus')}}" class="mu-readmore-btn mu-reservation-btn">PLACE AN ORDER</a>
                    </div>
                    <!-- / Top slider content -->
                </div>
                <!-- / Top slider single slide -->

            </div>
        </div>
    </section>
    <!-- End slider  -->

    <!-- Start About us -->
    <section id="mu-about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-about-us-area">

                        <div class="mu-title">
                            <span class="mu-subtitle">Discover</span>
                            <h2>ABOUT US</h2>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mu-about-us-left">
                                    <img src="{{ asset('assets/img/index4.jpg') }}" alt="img">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mu-about-us-right">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam minus aliquid,
                                        itaque illum assumenda repellendus dolorem, dolore numquam totam saepe, porro
                                        delectus, libero enim odio quo. Explicabo ex sapiente sit eligendi, facere
                                        voluptatum! Quia vero rerum sunt porro architecto corrupti eaque corporis eum,
                                        enim soluta, perferendis dignissimos, repellendus, beatae laboriosam.</p>
                                    <ul>
                                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia.</li>
                                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia.</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque similique
                                        molestias est quod reprehenderit, quibusdam nam qui, quam magnam.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About us -->

    <!-- Start Counter Section -->
    <section id="mu-counter">
        <div class="mu-counter-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mu-counter-area">

                            <ul class="mu-counter-nav">

                                <li class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="mu-single-counter">
                                        <span>Fresh</span>
                                        <h3><span class="counter-value" data-count="150">0</span><sup>+</sup></h3>
                                        <p>Breakfast Items</p>
                                    </div>
                                </li>

                                <li class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="mu-single-counter">
                                        <span>Delicious</span>
                                        <h3><span class="counter-value" data-count="60">0</span><sup>+</sup></h3>
                                        <p>Lunch Items</p>
                                    </div>
                                </li>

                                <li class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="mu-single-counter">
                                        <span>Hot</span>
                                        <h3><span class="counter-value" data-count="45">0</span><sup>+</sup></h3>
                                        <p>Coffee Items</p>
                                    </div>
                                </li>

                                <li class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="mu-single-counter">
                                        <span>Satisfied</span>
                                        <h3><span class="counter-value" data-count="6560">0</span><sup>+</sup></h3>
                                        <p>Customers</p>
                                    </div>
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Counter Section -->

    <!-- Start Restaurant Menu -->
    <section id="mu-restaurant-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-restaurant-menu-area">

                        <div class="mu-title">
                            <span class="mu-subtitle">Discover</span>
                            <h2>OUR MENU</h2>
                        </div>

                        <div class="mu-restaurant-menu-content">
                            <ul class="nav nav-tabs mu-restaurant-menu">
                                <li class="active"><a href="#breakfast" data-toggle="tab">Swallow</a></li>
                                <li><a href="#meals" data-toggle="tab">Meals</a></li>
                                <li><a href="#snacks" data-toggle="tab">Snacks</a></li>
                                <li><a href="#desserts" data-toggle="tab">Desserts</a></li>
                                <li><a href="#drinks" data-toggle="tab">Drinks</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content container">
                                <div class="tab-pane fade in active" id="breakfast">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mu-tab-content-left">
                                                    <ul class="mu-menu-item-nav">
                                                        @foreach ($swallow as $swallow)
                                                            <li>
                                                                <div class="media">
                                                                    <div class="media-left">
                                                                        <a href="#">
                                                                            <img class="media-object"
                                                                                src="{{ asset('assets/img/menu/item-1.jpg ') }}"
                                                                                alt="img">
                                                                        </a>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h4 class="media-heading"><a
                                                                                href="#">{{ $swallow->menu_name }}</a>
                                                                        </h4>
                                                                        <span
                                                                            class="mu-menu-price">${{ $swallow->menu_price }}</span>
                                                                        <p>{{ $swallow->menu_description }}</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="meals">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mu-tab-content-left">
                                                    <ul class="mu-menu-item-nav">


                                                        @foreach ($combo as $combo)
                                                            <li>
                                                                <div class="media">
                                                                    <div class="media-left">
                                                                        <a href="#">
                                                                            <img class="media-object"
                                                                                src="{{ asset('assets/img/menu/item-3.jpg ') }}"
                                                                                alt="img">
                                                                        </a>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h4 class="media-heading"><a
                                                                                href="#">{{ $combo->menu_name }}</a>
                                                                        </h4>
                                                                        <span
                                                                            class="mu-menu-price">${{ $combo->menu_price }}</span>
                                                                        <p>{{ $$combo->menu_description }}</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-6">
                                                <div class="mu-tab-content-right">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-4.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">English
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-3.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-4.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> --}}

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="snacks">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mu-tab-content-left">
                                                    <ul class="mu-menu-item-nav">

                                                        @foreach ($sides as $sides)
                                                            <li>
                                                                <div class="media">
                                                                    <div class="media-left">
                                                                        <a href="#">
                                                                            <img class="media-object"
                                                                                src="{{ asset('assets/img/menu/item-5.jpg ') }}"
                                                                                alt="img">
                                                                        </a>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h4 class="media-heading"><a
                                                                                href="#">{{ $sides->memu_name }}</a>
                                                                        </h4>
                                                                        <span
                                                                            class="mu-menu-price">${{ $sides->menu_price }}</span>
                                                                        <p>{{ $sides->menu_description }}.</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6">
                                                <div class="mu-tab-content-right">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-5.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">English
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-6.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-5.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> --}}

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="desserts">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mu-tab-content-left">
                                                    <ul class="mu-menu-item-nav">
                                             
                                             @foreach($breakfast as $breakfast)
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-7.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">English
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                     @endforeach
                                                    </ul>
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-6">
                                                <div class="mu-tab-content-right">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-8.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">English
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-7.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-8.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> --}}

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="drinks">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mu-tab-content-left">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-9.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">English
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-10.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-9.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-6">
                                                <div class="mu-tab-content-right">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-9.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">English
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-10.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="{{ asset('assets/img/menu/item-9.jpg ') }}"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Restaurant Menu -->








    <!-- Start Contact section -->
    <section id="mu-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-contact-area">

                        <div class="mu-title">
                            <span class="mu-subtitle">Get In Touch</span>
                            <h2>Contact Us</h2>
                        </div>

                        <div class="mu-contact-content">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mu-contact-left">
                                        <!-- Email message div -->
                                        <div id="form-messages"></div>
                                        <!-- Start contact form -->
                                        <form id="ajax-contact" method="post" action="mailer.php"
                                            class="mu-contact-form">
                                            <div class="form-group">
                                                <label for="name">Your Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input type="text" class="form-control" id="subject" name="subject"
                                                    placeholder="Subject" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <textarea class="form-control" id="message" name="message" cols="30"
                                                    rows="10" placeholder="Type Your Message" required></textarea>
                                            </div>
                                            <button type="submit" class="mu-send-btn">Send Message</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mu-contact-right">
                                        <div class="mu-contact-widget">
                                            <h3>Office Address</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia
                                                temporibus corporis ea non consequatur porro corrupti hic voluptatibus
                                                assumenda, doloribus.</p>
                                            <address>
                                                <p><i class="fa fa-phone"></i> (850) 457 6688</p>
                                                <p><i class="fa fa-envelope-o"></i>contact@markups.io</p>
                                                <p><i class="fa fa-map-marker"></i>368 St. Panama City, Florida, USA</p>
                                            </address>
                                        </div>
                                        <div class="mu-contact-widget">
                                            <h3>Open Hours</h3>
                                            <address>
                                                <p><span>Monday - Friday</span> 9.00 am to 12 pm</p>
                                                <p><span>Saturday</span> 9.00 am to 10 pm</p>
                                                <p><span>Sunday</span> 10.00 am to 12 pm</p>
                                            </address>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact section -->

    < <!-- Start Footer -->
        <footer id="mu-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mu-footer-area">
                            <div class="mu-footer-social">
                                <a href="#"><span class="fa fa-facebook"></span></a>
                                <a href="#"><span class="fa fa-twitter"></span></a>
                                <a href="#"><span class="fa fa-google-plus"></span></a>
                                <a href="#"><span class="fa fa-linkedin"></span></a>
                                <a href="#"><span class="fa fa-youtube"></span></a>
                            </div>
                            <div class="mu-footer-copyright">
                                <p>&copy; Copyright <a rel="nofollow" href="http://markups.io">markups.io</a>. All right
                                    reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- jQuery library -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
        <!-- Slick slider -->
        <script type="text/javascript" src="{{ asset('assets/js/slick.js') }}"></script>
        <!-- Counter -->
        <script type="text/javascript" src="{{ asset('assets/js/simple-animated-counter.js') }}"></script>
        <!-- Gallery Lightbox -->
        <script type="text/javascript" src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Date Picker -->
        <script type="text/javascript" src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
        <!-- Ajax contact form  -->
        <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>

        <!-- Custom js -->
        <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
