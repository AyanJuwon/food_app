@extends('layouts.app')

@section('content')
    <main>

        <div class="page-content">
            <div class="container">
                <div class="toolbox">
                    <div class="toolbox-left">

                    </div><!-- End .toolbox-left -->

                    <div class="toolbox-center">
                        <div class="toolbox-info">

                        </div><!-- End .toolbox-info -->
                    </div><!-- End .toolbox-center -->

                    <div class="toolbox-right">

                    </div><!-- End .toolbox-right -->
                </div><!-- End .toolbox -->
               
                @foreach ($menus as $menu)
 @if(!$menu)

 No item in this category

 @endif
                    <div class="products">
                        <div class="row">
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ route('menu', $menu->id) }}">

                                            <img src="{{ asset('uploads/menu/' . $menu->menu_image) }}"
                                                alt="Product image" class="product-image">
                                        </a>

                                        {{-- <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                wishlist</span></a>
                                    </div><!-- End .product-action --> --}}
                                        <form method="POST" action="{{ route('cart.store') }}">
                                            <div class="product-action">
                                                @csrf
                                                <input type="hidden" name="menu_price" value="{{ $menu->menu_price }}">
                                                <input type="hidden" name="menu_name" value="{{ $menu->menu_name }}">
                                                <input type="hidden" name="id" value="{{ $menu->id }}">
                                                <input type="hidden" name="qty" value="1">

                                                <button href="#" type="submit" class="btn-product btn-cart"
                                                    title="Add to cart"><span>Add to cart</span></button>

                                            </div><!-- End .product-action -->
                                        </form>
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a
                                                href="{{ route('category', $menu->category_id) }}">{{ $menu->category }}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a
                                                href="{{ route('menu', $menu->id) }}">{{ $menu->menu_description }}</a>
                                        </h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            $50.00
                                        </div><!-- End .product-price -->
                                        {{-- <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 0%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 0 Reviews )</span>
                                    </div><!-- End .rating-container --> --}}

                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                        </div><!-- End .row -->

                    </div><!-- End .products -->
                @endforeach

            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->




@endsection
