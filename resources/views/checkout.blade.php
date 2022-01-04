@extends('layouts.app')
<script>


    </script>
@section('content')


    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Checkout</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">

                    <aside class="col-lg-2">

                            <div class="col-lg-12">
                                <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->

                                </div>


                            </div><!-- End .col-lg-9 -->
                                <div class="summary container col-sm-10">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Menu</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="{{ route('payment.complete') }}" id="checkoutForm" method="POST">
                                                @csrf
                                            <tr> <div class="col-sm-8 form-group">
                                                <label>Your Name*</label>
                                                <input type="text" class="form-control" placeholder="Enter Your name" name="payer_name"
                                                    id="name" required>
                                                    <small style="color: red"></small>

                                  </tr>

                                            <tr>
                                                <div class="col-sm-8 form-group">
                                                    <label>Email*</label>
                                                    <input name="email" type="email" class="form-control" placeholder="Enter Your Email"  required id="email">
                                                    <small style="color: red"></small>
                                                </div><!-- End .col-sm-6 --></tr>
                                        </tbody>

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
                                                <td>&#x20A6;{{ $total }}</td>
                                            </tr><!-- End .summary-subtotal -->

                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>&#x20A6; {{ $total }}</td>
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <div class="accordion-summary" id="accordion-payment">
                                        <div class="card">
                                            <div class="card-header" id="heading-1">
                                                <h2 class="card-title">
                                                        Payment Method
                                                </h2>
                                            </div><!-- End .card-header -->
<div class="col-sm-6 form-group">
    <input type="radio" name="payment_method" value="0" id="payment_method" >
     <label for="Payment_method">Pay With Paystacks</label>
</div>
<div class="col-sm-6 form-group">
          <input type="radio" name="payment_method" value="1">
                                             <label for="Payment_method">Pay With Cash</label>
                               </div>
                                               </div><!-- End .card -->


                                    </div><!-- End .accordion -->
                                    <input type="hidden" id="reference" name="reference">
                                    <input type="hidden" id="table" name="table_id" value = 1>
                                    <a onclick="pay('paid', {{ $total }}, '{{ \Illuminate\Support\Str::random(32) }}')"
                                        class="card-button-light-create paystacks"> <button type="button"
                                            class="btn btn-outline-primary-2 btn-order btn-block">
                                            <span class="btn-text">Place Order</span>
                                            <span class="btn-hover-text"> Pay
                                                &#x20A6;
                                                {{ $total }}
                                            </span>
                                        </button> </a>




                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->


@endsection

@section('scripts')

<script
src="https://code.jquery.com/jquery-3.6.0.js"
integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script>



function setErrorFor(input, message){
            const small = document.querySelector('small')

            small.innerText = message;

        }

 function validateEmail(email) {
            const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
    </script>


    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>


function pay(plan_type, amount, ref){

            var mail = document.querySelector('#email').value
            var name = document.querySelector('#name').value
            var option=document.getElementsByName('payment_method');
            if (mail === '') {
                setErrorFor(mail, 'This field is required!')
            }

     if (!(option[0].checked || option[1].checked)) {

        setErrorFor(option, 'This field is required!')
         return false;
     }

            if(name === ''){
                setErrorFor(name, 'This field is required!')
            }
            if( mail !== ''  && name !== '' && option != '') {

        if ($("input:radio[name='payment_method']:checked").val() == 0 ) {
          payWithPaystack(plan_type,amount,ref);
        } else{
            payWithCash(amount,plan_type,ref);
        }



}

        function payWithPaystack(plan_type, amount, ref) {
            var amt = amount * 100;
            var plan_type = plan_type;
            var amt_save = amt / 100;
            // console.log(plan_type)

            var handler = PaystackPop.setup({
                key: 'pk_test_e4c13c774ed4719123ccfb37ae4107a23e25a5a3', // Replace with your public key
                email: document.getElementById("email").value,
                amount: amt,
                currency: "NGN",
                ref: ref,
                metadata: {
                    custom_fields: [{
                        display_name: document.getElementById("name").value,
                        value: document.getElementById("email").value,
                    }]
                },
                callback: function(response) {
                    if (response.message === 'Approved') {

                        $('#reference').val(ref);
                        $('form#checkoutForm').submit();
                    }
                }
            });


                handler.openIframe();


        }};  function payWithCash(plan_type, amount, ref) {
            var amt = amount * 100;
            var amt_save = amt / 100;


                        $('#reference').val(ref);
                        $('form#checkoutForm').submit();

            };

        </script>

@endsection
