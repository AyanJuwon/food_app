@extends('layouts.dashboard')


@section('css')

<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}"> --}}
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
<!--===============================================================================================-->
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/util.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/main.css') }}"> --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="{{ asset('asset/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('asset/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('asset/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ asset('asset/styles/store.css') }}">
<link rel="stylesheet" href="{{ asset('asset/styles/orders.css') }}">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
@section('content')

 <div class="mt-5 pb-5"></div>
 <div class="contentbar mt-5 pt-5">
     <!-- Start row -->
     <div class="row">
         <!-- Start col -->
         <div class="col-lg-12">
             <div class="card m-b-30">
                 <div class="card-header">
                     <div class="row align-items-center">
                         <div class="col-6">
                             <h5 class="card-title mb-0">Completed Orders</h5>
                         </div>

                     </div>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-borderless">
                             <thead>
                                 <tr>
                                     <th>ID</th>
                                     <th>Reference</th>
                                     <th>Payment Method</th>
                                     <th>Table ID</th>
                                     <th>Date</th>
                                     <th>Total</th>
                                     <th>Status</th>
                                     <th>See Details</th>
                                 </tr>
                             </thead>
                             <tbody>


                     @foreach ($orders as $order)  <tr>
                                     <td scope="row">#{{$order->table_id}}</td>
                                     <td>{{$order->reference}}</td>

                                     <td>@if($order->payment_method == 0) Paystacks @else Cash @endif</td>
                                     <td>{{$order->table_id}}</td>
                                     <td>{{$order->created_at->toDateString()}}</td>
                                     <td>&#x20A6;{{$order->total}}</td>
                                     <td>           @if ($order->tracking == 0)
                                         <span class="badge badge-info-inverse">Cooking</span>

                                     @endif
                                     @if ($order->tracking == 1)

                                         <span class="badge badge-success-inverse">Completed</span>
                                     @else
                                         @if ($order->tracking == 3)

                                             <span class="badge badge-danger-inverse">Cancelled</span>
                                         @endif

                                     @endif</td>
                                     <td>    <a href="{{ route('adminViewOrder', $order) }}" class="text-primary">See
                                         Details</a></td>

                                 </tr>
                                 @endforeach

                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
         <!-- End col -->
     </div>
     <!-- End row -->
 </div>
@endsection

@section('script')
    <script src="{{ asset('asset/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('asset/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('asset/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('asset/script/main.js') }}"></script>

@endsection
