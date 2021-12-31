<?php
/**
 * votingSystem
 * Olamiposi
 * 02/09/2020
 * 16:24
 * CREATED WITH PhpStorm
 **/
?>
@extends('layouts.index')

@section('title')
  Vote -  {{ $contestant->name }} at Royal Queen Contest
@endsection


@section('content')
    <section class="gray">
        <div class="container">
            <div class="row">

                <!-- property main detail -->
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <div class="slide-property-first mb-4">
                        <div class="pr-price-into">
                            <h2>{{ $contestant->name }} <span class="prt-type rent">Vote</span></h2>
                            <span> Candidate Number: {{ $contestant->number }}</span>
                        </div>
                    </div>

                    <div class="block-wrap text-center" style="background: none">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ asset('uploads/contestants/'.$contestant->image) }}" width="200" height="200">
                            </div>
                        </div>
                        <h3 class="mt-5"> Share Contestant</h3>
                        <div class="addthis_inline_share_toolbox text-center"></div>

                    </div>



                    <!-- Single Block Wrap -->
                </div>

                <!-- property Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="page-sidebar">

                        <div class="block-wrap">

                            @include('partials.success')

                            <div class="block-header">
                                <h4 class="block-title">Vote Form</h4>
                                <p>Ensure that the contestant is who you actually want to vote. No refund or reversal of vote if you choose a wrong contestant</p>
                            </div>
                            <form method="POST" action="{{ route('pay-now') }}" id="form-id">
                                @csrf
                                <div class="block-body">
                                    <div class="row">
                                        <input type="hidden" name="contestant_id" id="contestant_id" value="{{ $contestant->id }}">

                                        <input type="hidden" name="amount" id="amount">

                                        <input type="hidden" name="reference" id="reference" >
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <span id="checkTimes" style="color:green"></span>
                                                <input type="number" class="form-control" name="times" onblur="getPayable()" id="vote_times" placeholder="Enter the total number of votes">
                                                <small style="color: red"></small>

                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your full name">
                                                <small style="color: red"></small>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter a valid Email for your receipt">
                                                <small style="color: red"></small>

                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter your phone number">
                                                <small style="color:red"></small>

                                                <h4 class="mt-3">Each Vote Costs N30</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <a class="btn btn-theme" onclick="payWithPaystack()" style="color: #fff;" id="voteButton">VOTE</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </form>

                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script>

        function payWithPaystack() {
            var times = document.querySelector('#vote_times').value
            var mail = document.querySelector('#email').value
            var name = document.querySelector('#name').value
            var phone = document.querySelector('#phone').value
            var time = document.querySelector('#vote_times')
            var mails = document.querySelector('#email')
            if(!validateEmail(mail)){
                setErrorFor(mails, 'Please Input a valid email address!')
            }
            var names = document.querySelector('#name')
            var phones = document.querySelector('#phone')
            var amt = times * 3000;
            var amt_save = amt / 100;
            var handler = PaystackPop.setup({
            key: 'pk_test_455a676aed97734dd97c33e8a18b90abcc16dba4', // Replace with your public key
            email:  mail,// document.getElementById("email").value,
            amount: amt,
            currency: "NGN",
            ref: '{{ \Illuminate\Support\Str::random(32) }}',
            metadata: {
                custom_fields: [
                    {
                        display_name: name,
                        variable_name: "mobile_number",
                        value: phone
                    }
                ]
            },
            callback: function(response){
                if(response.message === 'Approved'){
                    $('#reference').val(response.reference);
                    $('#vote_times').val(times);
                    $('#email').val(mail);
                    $('#phone').val(phone);
                    $('#name').val(name);
                    $('#amount').val(amt_save)
                    $('form#form-id').submit();
                    }
                }
            });
            if (times === ''){
                setErrorFor(time, 'This field is required!')
            }
            if (mail === '') {
                setErrorFor(mails, 'This field is required!')
            }
            if(phone === ''){
                setErrorFor(phones, 'This field is required!')
            }
            if(name === ''){
                setErrorFor(names, 'This field is required!')
            }
            if(times !== '' && mail !== '' && phone !== '' && name !== '') {
                handler.openIframe();
            }
        }
    </script>
    <script>
        function getPayable() {
            let a = document.getElementById('vote_times').value
            let b = document.getElementById('checkTimes')

            b.textContent = `Total: N${a * 30}`
        }

        function setErrorFor(input, message){
            const formControlParent = input.parentElement
            const small = formControlParent.querySelector('small')

            small.innerText = message;

            formControlParent.className = 'form-group error';
        }

        function validateEmail(email) {
            const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
    </script>
    @endsection

