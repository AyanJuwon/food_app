@extends('layouts.app')



@section('content')


    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach (\Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
                                        <tr>
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="assets/images/products/table/product-1.jpg"
                                                                alt="Product image">
                                                        </a>
                                                    </figure>

                                                    <h3 class="product-title">
                                                        <a href="#">{{ $item->model->menu_name }}</a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col">${{ $item->model->menu_price }}</td>
                                            <form id="quantityForm" method="POST"
                                                action="{{ route('cart.update', $item->rowId) }}">

                                                @csrf
                                                {{ method_field('PATCH') }}
                                                <td class="quantity-col">
                                                    <div class="cart-product-quantity">
                                                        <input type="number" class="form-control" name="qty"
                                                            placeholder="{{ $item->qty }}" min="1" max="10" step="1"
                                                            data-decimals="0" required>
                                                    </div><!-- End .cart-product-quantity -->
                                                </td>
                                                <td class="total-col">${{ $item->model->menu_price * $item->qty }}</td>

                                                <td class="remove-col">

                                                    <input hidden name='rowId' value="{{ $item->rowId }}">
                                                    <button class="btn btn-outline-dark-2" type="submit"><span>UPDATE
                                                            CART</span><i class="icon-refresh"></i></button>
                                                </td>
                                            </form>
                                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <td class="remove-col"><button class="btn-remove"><i
                                                            class="icon-close"></i></button></td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><!-- End .table table-wishlist -->
                            <div class="cart-bottom">


                            </div><!-- End .cart-bottom -->
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <?php $total = str_replace(',', '', Cart::SubTotal()); ?>
                                            <td>${{ $total }}</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr class="summary-shipping">
                                            <td>Shipping:</td>
                                            <td>&nbsp;</td>
                                        </tr>

                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <label class="custom-control-label" for="free-shipping">
                                                        Shipping</label>
                                                </div><!-- End .custom-control -->
                                            </td>
                                            <td>$10.00</td>
                                        </tr><!-- End .summary-shipping-row -->

                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>$ {{ $total + 10 }}</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <a href="{{ route('checkout') }}"
                                    class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO
                                    CHECKOUT</a>
                            </div><!-- End .summary -->

                            <a href="{{ route('home') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE
                                    SHOPPING</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->


@endsection
