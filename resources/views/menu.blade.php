@extends('layouts.app')


@section('css')


    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/skin-demo-14.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demos/demo-14.css') }}">

@endsection

@section('content')



    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                </ol>


            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            @foreach ($menu as $menu)


                <div class="page-content">
                    <div class="container">

                        <div class="product-details-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-gallery product-gallery-vertical">
                                        <div class="row">
                                            <figure class="product-main-image">
                                                <img id="product-zoom"
                                                    src="{{ asset('uploads/menu/' . $menu->menu_image) }}"
                                                    data-zoom-image="{{ asset('uploads/menu/' . $menu->menu_image) }}"
                                                    alt="product image">

                                                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                    <i class="icon-arrows"></i>
                                                </a>
                                            </figure><!-- End .product-main-image -->


                                        </div><!-- End .row -->
                                    </div><!-- End .product-gallery -->
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">
                                    <div class="product-details">
                                        <h1 class="product-title">{{ $menu->menu_name }}</h1>
                                        <!-- End .product-title -->
                                        @csrf
                                        <div class="ratings-container">

                                            <div class="product-price">
                                                ${{ $menu->menu_price }}
                                            </div><!-- End .product-price -->

                                            <div class="product-content">
                                                <p>{{ $menu->product_description }}</p>
                                            </div><!-- End .product-content -->

                                            <form method="POST" action="{{ route('cart.store') }}">
                                                @csrf
                                                <input type="hidden" name="menu_price" value="{{ $menu->menu_price }}">
                                                <input type="hidden" name="menu_name" value="{{ $menu->menu_name }}">
                                                <input type="hidden" name="id" value="{{ $menu->id }}">
                                                <div class="details-filter-row details-row-size">
                                                    <label for="qty">Qty:</label>
                                                    <div class="product-details-quantity">
                                                        <input type="number" name ='qty' id="qty" class="form-control" min="1" max="10"
                                                            step="1" data-decimals="0" required>
                                                    </div><!-- End .product-details-quantity -->
                                                </div><!-- End .details-filter-row -->

                                                <div class="product-details-action">
                                                    <button href="#" type="submit"
                                                        class="btn-product btn-cart mb-3"><span>add to
                                                            cart</span></button>
                                            </form>
                                            <div class="mb-3"></div>
                                            <div class="details-action-wrapper">
                                                <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add
                                                        to
                                                        Wishlist</span></a>
                                            </div><!-- End .details-action-wrapper -->
                                        </div><!-- End .product-details-action -->

                                        <div class="product-details-footer">
                                            <div class="product-cat">
                                                <span>Category:</span>
                                                <a href="#">{{ $menu->category }}</a>
                                            </div><!-- End .product-cat -->

                                            <div class="social-icons social-icons-sm">
                                                <span class="social-label">Share:</span>
                                                <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                                        class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                                        class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                                        class="icon-instagram"></i></a>
                                                <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                                        class="icon-pinterest"></i></a>
                                            </div>
                                        </div><!-- End .product-details-footer -->
                                    </div><!-- End .product-details -->
                                </div><!-- End .col-md-6 -->
                            </div>
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                                    role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="product-shipping-link" data-toggle="tab"
                                    href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab"
                                    aria-selected="false">Shipping & Returns</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                                aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Information</h3>
                                    <p>{{ $menu->menu_description }}
                                    </p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                                aria-labelledby="product-shipping-link">
                                <div class="product-desc-content">
                                    <h3>Delivery & returns</h3>
                                    <p>We deliver to over 100 countries around the world. For full details of the
                                        delivery
                                        options we offer, please view our <a href="#">Delivery information</a><br>
                                        We hope you’ll love every purchase, but if you ever need to return an item
                                        you
                                        can
                                        do so within a month of receipt. For full details of how to make a return,
                                        please
                                        view our <a href="#">Returns information</a></p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->



                </div><!-- End .container -->

                </form>
            @endforeach
        </div><!-- End .page-content -->
        </div>
    </main><!-- End .main -->


@endsection
