@extends('layouts.app')
@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message')    }}
    </div>
@endif
@section('content')

    <main class="main">

        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Account</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-4 col-lg-3">
                            <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab"
                                        aria-controls="tab-orders" aria-selected="false">Orders</a>
                                </li>



                            </ul>
                        </aside><!-- End .col-lg-3 -->

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel"
                                    aria-labelledby="tab-dashboard-link">
                                    @if ($orders_count > 0)
                                    @include('orders')
                                @else
                                    <p>No order has been made yet.</p>
                                @endif
                                <a href="{{route('menus.search')}}" class="btn btn-outline-primary-2"><span>GO SHOP</span><i
                                        class="icon-long-arrow-right"></i></a>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-orders" role="tabpanel"
                                    aria-labelledby="tab-orders-link">
                                    @if ($orders_count > 0)
                                        @include('orders')
                                    @else
                                        <p>No order has been made yet.</p>
                                    @endif
                                    <a href="{{route('menus.search')}}" class="btn btn-outline-primary-2"><span>GO SHOP</span><i
                                            class="icon-long-arrow-right"></i></a>
                                </div><!-- .End .tab-pane -->


                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->


@endsection

@section('scripts')
<script>


setTimeout(function(){
    // window.location.reload()
    console.log('reloaded')
}, 120000);
    </script>
