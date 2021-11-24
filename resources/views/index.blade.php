@extends('layouts.app')

@section('content')



    <main class="main">
        <div class="mb-lg-2"></div><!-- End .mb-lg-2 -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9 col-xxl-10">

                    <div class="mb-3"></div><!-- End .mb-3 -->


                    <div class="mb-5"></div><!-- End .mb-5 -->

                    <div class="bg-lighter trending-products">
                        <div class="heading heading-flex mb-3">
                            <div class="heading-left">
                                <h2 class="title">Trending Today</h2><!-- End .title -->
                            </div><!-- End .heading-left -->

                            <div class="heading-right">
                                <ul class="nav nav-pills justify-content-center" role="tablist">

                                </ul>
                            </div><!-- End .heading-right -->
                        </div><!-- End .heading -->

                        <div class="tab-content tab-content-carousel">
                            <div class="tab-pane p-0 fade show active" id="trending-all-tab" role="tabpanel"
                                aria-labelledby="trending-all-link">
                                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow"
                                    data-toggle="owl" data-owl-options='{
                                                                                        "nav": false,
                                                                                        "dots": true,
                                                                                        "margin": 20,
                                                                                        "loop": false,
                                                                                        "responsive": {
                                                                                            "0": {
                                                                                                "items":1
                                                                                            },
                                                                                            "480": {
                                                                                                "items":2
                                                                                            },
                                                                                            "768": {
                                                                                                "items":3
                                                                                            },
                                                                                            "992": {
                                                                                                "items":4
                                                                                            },
                                                                                            "1200": {
                                                                                                "items":3,
                                                                                                "nav": true
                                                                                            },
                                                                                            "1600": {
                                                                                                "items":5,
                                                                                                "nav": true
                                                                                            }
                                                                                        }
                                                                                    }'>

                                    {{-- Product --}}
                                    @foreach ($trending as $trending)




                                        <div class="product text-center">
                                            <figure class="product-media">

                                                <a href="{{ route('menu', $trending->id) }}">

                                                    <img src="{{ asset('uploads/menu/' . $trending->menu_image) }}"
                                                        alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist"
                                                        title="Add to wishlist"><span>add to wishlist</span></a>

                                                </div><!-- End .product-action-vertical -->

                                                    <form method="POST" action="{{ route('cart.store') }}">
                                                <div class="product-action">
                                                        @csrf
                                                        <input type="hidden" name="menu_price"
                                                            value="{{ $trending->menu_price }}">
                                                        <input type="hidden" name="menu_name"
                                                            value="{{ $trending->menu_name }}">
                                                        <input type="hidden" name="id" value="{{ $trending->id }}">
                                                        <input type="hidden" name="qty" value="1">

                                                        <button href="#" type="submit" class="btn-product btn-cart"
                                                            title="Add to cart"><span>Add to cart</span></button>
                                                    
                                                </div><!-- End .product-action -->
                                            </form>
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">{{ $trending->category }}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a
                                                        href="{{ route('menu', $trending->id) }}">{{ $trending->menu_name }}</a>
                                                </h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    <span class="new-price">${{ $trending->menu_price }}</span>
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    {{-- <div class="ratings">
                                                         <div class="ratings-val" style="width: 100%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings --> --}}
                                                    {{-- <span class="ratings-text">( 2 Reviews )</span> --}}
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    @endforeach
                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->

                        </div><!-- End .tab-content -->
                    </div><!-- End .bg-lighter -->

                    <div class="mb-5"></div><!-- End .mb-5 -->



                </div><!-- End .row cat-banner-row -->

                <div class="icon-boxes-container">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="icon-rocket"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">Free Shipping</h3>
                                        <!-- End .icon-box-title -->
                                        <p>Orders $50 or more</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="icon-rotate-left"></i>
                                    </span>

                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                                        <p>Within 30 days</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="icon-info-circle"></i>
                                    </span>

                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">Get 20% Off 1 Item</h3>
                                        <!-- End .icon-box-title -->
                                        <p>When you sign up</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="icon-life-ring"></i>
                                    </span>

                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                        <p>24/7 amazing services</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container-fluid -->
                </div><!-- End .icon-boxes-container -->

                <div class="mb-5"></div><!-- End .mb-5 -->
            </div><!-- End .col-lg-9 col-xxl-10 -->


        </div><!-- End .row -->
        </div><!-- End .container-fluid -->
    </main><!-- End .main -->



@endsection
