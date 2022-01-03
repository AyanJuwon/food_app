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
@endsection

@section('content')
    <div class="breadcrumbbar mt-3">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">All Categories</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Manage Orders</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('home') }}" class="btn btn-primary-rgba"><i
                            class="feather icon-skip-back mr-2"></i>Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>


         <!-- Start Contentbar -->
         <div class="contentbar">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-12 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <h5 class="card-title mb-0">Order No : #{{$order_id}}</h5>
                                </div>

                                <div class="col-5 text-right">
                                    @if ($order->tracking == 0)
                                    <span class="badge badge-info-inverse">Cooking</span>
                                    <div class="button-list">
                                        <form hidden id="completeForm"
                                        action="{{ route('admin.completeOrder', [$order->id]) }}" method="post">
                                        @csrf<button type="submit" class="btn btn-success">Complete Order</button></form>
                                    <form hidden id="cancelForm" action="{{ route('admin.cancelOrder', [$order->id]) }}"
                                        method="post">
                                        @csrf<button type="submit" class="btn btn-danger">Cancel Order</button></form>

                                        <a href="#" onclick="event.preventDefault();document.getElementById('completeForm').submit();" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <a href="#" onclick="event.preventDefault();document.getElementById('cancelForm').submit();" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                    </div>
                                @endif
                                @if ($order->tracking == 1)

                                    <span class="badge badge-success-inverse">Ready</span>
                                @else
                                    @if ($order->tracking == 2)

                                        <span class="badge badge-danger-inverse">Cancelled</span>
                                    @endif

                                @endif
                                    {{-- <span class="badge badge-success-inverse">Completed</span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="order-primary-detail mb-4">
                                    <h6>Order Placed</h6>
                                    <p class="mb-0">{{ $order->created_at->toDateString() }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="order-primary-detail mb-4">
                                    <h6>Name</h6>
                                    <p class="mb-0">{{$order->payer_name}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="order-primary-detail mb-4">
                                    <h6>Email ID</h6>
                                    <p class="mb-0">{{$order->email}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="order-primary-detail mb-4">
                                    <h6>Contact No</h6>
                                    <p class="mb-0">{{$order->phone_number}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="order-primary-detail mb-4">
                                    <h6>Table No</h6>
                                    <p class="mb-0">Table: {{$order->table_id}}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Order Items</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive ">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            @if($order->tracking == 0)
                                            <th scope="col">Action</th>
                                            @endif
                                            <th scope="col">Photo</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Price</th>
                                            <th scope="col" class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                @foreach (\App\Models\OrderDetail::where('order_id', $order_id)->get() as $orderDetail)
                @foreach (\App\Models\Menu::where('id', $orderDetail->menu_id)->get() as $menu)
                                        <tr>
                                            @if($order->tracking == 0)
                                            <td><a href="#" class="text-success mr-2"><i class="feather icon-edit-2"></i></a><a href="#" class="text-danger"><i class="feather icon-trash"></i></a></td>

                                           @endif <td><img src="{{ asset($menu->menu_image) }}" class="img-fluid" width="35" alt="{{ $menu->menu_image}}"></td>
                                            <td>{{$menu->menu_name}}</td>
                                            <td> {{ $orderDetail->quantity }}</td>
                                            <td>${{$menu->menu_price}}</td>
                                            <td class="text-right">${{$orderDetail->quantity * $menu->menu_price }}</td>
                                        </tr>
                                        @endforeach
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="row border-top pt-3">

                                <div class="col-md-12 order-1 order-lg-2 col-lg-8 col-xl-6">
                                    <div class="order-total table-responsive ">
                                        <table class="table table-borderless text-right">
                                            <tbody>
                                                <tr>
                                                    <td>Sub Total :</td>
                                                    <td>${{$order->total}}</td>
                                                </tr>


                                                <tr>
                                                    <td class="text-black f-w-7 font-18">Amount :</td>
                                                    <td class="text-black f-w-7 font-18">${{ $order->total }}</td>

                                                    <td class="text-black f-w-7 font-18"> @if( $order->payment_method == 0) Paid with Paystack
                                @else
                                Paid with cash
                                @endif
                                                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- End col -->
                <!-- Start col -->

            </div>
            <!-- End row -->

        <!-- End Contentbar -->

@endsection


@section('script')
    <script src="{{ asset('asset/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('asset/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('asset/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('asset/script/main.js') }}"></script>

    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-table-datatable.js') }}"></script>
@endsection
