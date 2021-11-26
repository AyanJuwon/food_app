@extends('layouts.app')

@section('content')


    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Checkout<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <form action="{{ route('payment.complete') }}" id="checkoutForm" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <label>Street address *</label>
                                    <input type="text" class="form-control" placeholder="Delivery Address" name="address"
                                        required>

                                    <div class="col-sm-6">
                                        <label>Phone *</label>
                                        <input name="phoneNumber" type="tel" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->


                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Menu</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach (\Gloudemans\Shoppingcart\Facades\Cart::content() as $item)


                                                <tr>
                                                    <td><a href="#">{{ $item->model->menu_name }}</a></td>
                                                    <td>${{ $item->model->menu_price * $item->qty }}</td>
                                                </tr>

                                            @endforeach
                                            <?php $total = str_replace(',', '', Cart::SubTotal()); ?>
                                            <tr class="summary-subtotal">
                                                <td>Subtotal:</td>
                                                <td>${{ $total }}</td>
                                            </tr><!-- End .summary-subtotal -->
                                            <tr>
                                                <td>Shipping:</td>
                                                <td>Free shipping</td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>$ {{ $total + 10.0 }}</td>
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <div class="accordion-summary" id="accordion-payment">
                                        <div class="card">
                                            <div class="card-header" id="heading-1">
                                                <h2 class="card-title">
                                                    <a role="button" data-toggle="collapse" href="#collapse-1"
                                                        aria-expanded="true" aria-controls="collapse-1">
                                                        Pay with Paystacks
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-1" class="collapse show" aria-labelledby="heading-1"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Pay with Paystacks
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->


                                    </div><!-- End .accordion -->
                                    <input type="hidden" id="reference" name="payment_id">
                                    <button type="button" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Place Order</span>
                                        <span class="btn-hover-text"> <a
                                                onclick="payWithPaystack('paid', {{ $total + 10 }}, '{{ \Illuminate\Support\Str::random(32) }}')"
                                                class="card-button-light-create">Pay
                                                $
                                                {{ $total + 10 }}
                                            </a></span>
                                    </button>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->


@endsection

@section('scripts')


    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        function payWithPaystack(plan_type, amount, ref) {
            var amt = amount * 100;
            var plan_type = plan_type;
            var amt_save = amt / 100;
            // console.log(plan_type)

            var handler = PaystackPop.setup({
                key: 'pk_test_e4c13c774ed4719123ccfb37ae4107a23e25a5a3', // Replace with your public key
                email: '{{ auth()->user()->email }}', // document.getElementById("email").value,
                amount: amt,
                currency: "NGN",
                ref: ref,
                metadata: {
                    custom_fields: [{
                        display_name: '{{ auth()->user()->name }}',
                        variable_name: "mobile_number",
                        value: "{{ auth()->user()->id }}"
                    }]
                },
                callback: function(response) {
                    if (response.message === 'Approved') {

                        $('#reference').val(response.reference);
                        $('form#checkoutForm').submit();
                    }
                }
            });
            handler.openIframe();

        }

        //     

    </script>

@endsection