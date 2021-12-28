@extends('layouts.app')

@section('content')
    <main class="main">



                <div class="container">
                    <div class="row" style="margin: auto;
                    width: 90%;s
                    padding: 10px;
                    }">
                        <div class="col-lg-9">

                            <div class="products mb-3">
                                <div class="row justify-content-center">
                                    @foreach ($menus as $menu)
                                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                            <div class="product product-7 text-center">
                                                <figure class="product-media">

                                                    <a href="{{ route('menu', $menu->id) }}">
                                                        <img src="{{ asset( $menu->menu_image) }}"
                                                            alt="Product image" class="product-image">
                                                    </a>

                                                    <div class="product-action-vertical">

                                                    </div><!-- End .product-action-vertical -->
                                                    <form method="POST" action="{{ route('cart.store') }}">
                                                        <div class="product-action">
                                                            @csrf
                                                            <input type="hidden" name="menu_price"
                                                                value="{{ $menu->menu_price }}">
                                                            <input type="hidden" name="menu_name"
                                                                value="{{ $menu->menu_name }}">
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
                                                            href="{{ route('category', $menu->category_id) }}">{{ $menu->category->name }}</a>
                                                    </div><!-- End .product-cat -->
                                                    <h3 class="product-title"><a
                                                            href="{{ route('menu', $menu->id) }}">{{ $menu->menu_name }}</a>
                                                    </h3><!-- End .product-title -->
                                                    <div class="product-price">
                                                        ${{ $menu->menu_price }}
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


    </main><!-- End .main -->




@endsection
