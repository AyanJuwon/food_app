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
                                                    src="{{ asset( $menu->menu_image) }}"
                                                    data-zoom-image="{{ asset( $menu->menu_image) }}"
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


                                            <div class="product-price">
                                             Price: &#x20A6;{{ $menu->menu_price }}
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
                                                        <input type="number" value =1  name ='qty' id="qty" class="form-control" min="1" max="10"
                                                            step="1" data-decimals="0" required>
                                                    </div><!-- End .product-details-quantity -->
                                                </div><!-- End .details-filter-row -->

                                                <div class="product-details-action">
                                                    <button  type="submit"
                                                        class="btn btn-cart mb-3"><span>Add to
                                                            cart</span></button>
                                            </form>
                                            <div class="mb-3"></div>
                                            <div class="details-action-wrapper">

                                        <div class="product-details-footer">
                                            <div class="product-cat">
                                                <span>Category:</span>
                                                        <a href="{{ route('category', $menu->category->id) }}"
                                                        >{{ $menu->category->name }}</a>
                                            </div><!-- End .product-cat -->


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
