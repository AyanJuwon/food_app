@extends('layouts.app')

@section('content')


    <main class="main">


        <div class="container m-5 justify-content-center">

            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">

                            <div class="products mb-3">
                                <div class="row justify-content-center">
                                    @foreach ($trending as $trending)
                                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                            <div class="product product-7 text-center">
                                                <figure class="product-media">

                                                    <a href="{{ route('menu', $trending->id) }}">
                                                        <img src="{{ asset('uploads/menu/' . $trending->menu_image) }}"
                                                            alt="Product image" class="product-image">
                                                    </a>

                                                    <div class="product-action-vertical">

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
                                                        <a
                                                            href="{{ route('category', $trending->category_id) }}">{{ $trending->category }}</a>
                                                    </div><!-- End .product-cat -->
                                                    <h3 class="product-title"><a
                                                            href="{{ route('menu', $trending->id) }}">{{ $trending->menu_name }}</a>
                                                    </h3><!-- End .product-title -->
                                                    <div class="product-price">
                                                        ${{ $trending->menu_price }}
                                                    </div><!-- End .product-price -->
                                                    <!-- End .rating-container -->


                                                </div><!-- End .product-body -->
                                            </div><!-- End .product -->
                                        </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                    @endforeach

                                </div><!-- End .row -->
                            </div><!-- End .products -->


                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                            aria-disabled="true">
                                            <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                        </a>
                                    </li>
                                    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item-total">of 6</li>
                                    <li class="page-item">
                                        <a class="page-link page-link-next" href="#" aria-label="Next">
                                            Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- End .col-lg-9 -->

                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </div>
    </main><!-- End .main -->




@endsection
