@extends('layouts.dashboard')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/main.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('asset/styles/store.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/styles/orders.css') }}">
@endsection

@section('content')
    <div class="breadcrumbbar">
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



    <div class="container">
        <div class="sheet">
            <section class="header">
                <h3>Order Details</h3>
            </section>
            <section class="order-meta">
                <p class="meta-data">order no
                    <?php echo $order_id; ?></p>
                <p class="meta-data">placed on :{{ $order->created_at->toDateString() }}</p>
                <p class="meta-data">total : ${{ $order->total }}</p>
            </section>
            <section class="order-details">
                <h4>Items In Your Order</h4>

                @foreach (\App\Models\OrderDetail::where('order_id', $order_id)->get() as $orderDetail)
                    @foreach (\App\Models\Menu::where('id', $orderDetail->menu_id)->get() as $menu)



                        <div class="story-card flex-container">

                            <div class="story-card__body-story">

                                <div class="story-card__body-left">
                                    <img src="{{ asset('uploads/menu/' . $menu->menu_image) }}}"
                                        alt="{{ $menu->menu_image }}" class="story-card__story-img">
                                </div>

                                <div class="story-card__body-right">
                                    <div class="story-card__header">

                                        <div class="story-card__info">
                                            <h6>{{ $menu->menu_name }}</h6>
                                        </div>

                                    </div>
                                    <p class="memorial-card-content">
                                    <p>Order No: {{ $order->id }} </p>
                                    <p>Quantity: {{ $orderDetail->quantity }} </p>
                                    <div>
                                        @if ($order->tracking == 0)
                                            <span class="out-of-stock">Cooking</span>

                                        @endif
                                        @if ($order->tracking == 1)

                                            <span class="in-stock">Ready</span>
                                        @else
                                            @if ($order->tracking == 2)

                                                <span class="out-of-stock">Cancelled</span>
                                            @endif

                                        @endif
                                    </div>
                                    <p class="story-card__date">Ordered on:
                                        {{ $order->created_at->toDateString() }}
                                    </p>
                                    <p class="story-card__date">Price:
                                        ${{ $menu->menu_price }}
                                    </p>
                                    <a href="{{ route('menu', $menu->id) }}" class="memorial-card-button">Buy
                                        Again</a>
                                    
                                    </p>
                                </div>
                            </div>

                        </div>


                    @endforeach
                @endforeach
            </section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                Payment Information
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Payment Details</h5>
                                <p class="card-text text-secondary  ">Paid with Paystacks</p>
                                <p class="card-text text-secondary">Items Total: ${{ $order->total }} </p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

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
