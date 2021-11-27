@extends('layouts.app')

@section('content')



    <main class="main">
        <div class="mb-lg-2"></div><!-- End .mb-lg-2 -->

        <div class="container-fluid">
            <div class="row">
                {{-- Product --}}
                @foreach ($trending as $trending)
                    <div class="col-lg-9">

                        <div class="products mb-3">
                            <div class="row justify-content-center">
                                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                           
                                            <a href="{{ route('menu', $trending->id) }}">
                                                <img src="{{ asset('uploads/menu/' . $trending->menu_image) }}"
                                                    alt="Product image" class="product-image">
                                            </a>

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
                                            <h3 class="product-title"><a href="product.html">{{ $trending->menu_name }}</a>
                                            </h3><!-- End .product-title -->
                                            <div class="product-price">
                                                ${{ $trending->menu_price }}
                                            </div><!-- End .product-price -->


                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->


                            </div><!-- End .row -->
                        </div><!-- End .products -->



                    </div><!-- End .col-lg-9 -->




                @endforeach
            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->

        </div><!-- End .tab-content -->
        </div><!-- End .bg-lighter -->

        <div class="mb-5"></div><!-- End .mb-5 -->
<div class="d-flex justify-content-center">
    {{ $trending->links() }}
</div>
        </div><!-- End .page-content -->


        </div><!-- End .row -->
        </div><!-- End .container-fluid -->
    </main><!-- End .main -->



@endsection
