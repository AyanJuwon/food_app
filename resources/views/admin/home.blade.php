@extends('layouts.dashboard')
@section('title')
    Dashboard
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">
@endsection
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Essential Foods</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Essential Foods</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>DashBoard</button>
                </div>
            </div>
        </div>
    </div>

    <div class="contentbar">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-lg-4 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="media">
                                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i
                                            class="feather icon-folder"></i></span>
                                    <div class="media-body">
                                        <p class="mb-0">All Categories</p>
                                        <h5 class="mb-0">2</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="media">
                                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i
                                            class="feather icon-folder"></i></span>
                                    <div class="media-body">
                                        <p class="mb-0">All Products</p>
                                        <h5 class="mb-0"> {{ App\Products::all()->count() }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="media">
                                    <span class="align-self-center mr-3 action-icon badge badge-success-inverse"><i
                                            class="feather icon-user"></i></span>
                                    <div class="media-body">
                                        <p class="mb-0">All Users</p>
                                        <h5 class="mb-0">{{ number_format(\App\User::where('role', 'user')->count()) }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="media">
                                    <span class="align-self-center mr-3 action-icon badge badge-primary-inverse"><i
                                            class="feather icon-loader"></i></span>
                                    <div class="media-body">
                                        <p class="mb-0">Pending Orders</p>
                                        <h5 class="mb-0"> {{ \App\Orders::where('tracking', 0)->count() }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="media">
                                    <span class="align-self-center mr-3 action-icon badge badge-success-inverse"><i
                                            class="feather icon-check-square"></i></span>
                                    <div class="media-body">
                                        <p class="mb-0">Completed Orders</p>
                                        <h5 class="mb-0"> {{ \App\Orders::where('tracking', 2)->count() }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="media">
                                    <span class="align-self-center mr-3 action-icon badge badge-danger-inverse"><i
                                            class="fa fa-close"></i></span>
                                    <div class="media-body">
                                        <p class="mb-0">Canceled Orders</p>
                                        <h5 class="mb-0"> {{ \App\Orders::where('tracking', 2)->count() }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-label">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <p><i class="feather icon-circle text-primary"></i>Pending Orders</p>
                                </li>
                                <li class="list-inline-item">
                                    <p><i class="feather icon-circle text-success"></i>Completed Orders</p>
                                </li>
                                <li class="list-inline-item">
                                    <p><i class="feather icon-circle text-light"></i>Cancelled Orders</p>
                                </li>
                            </ul>
                        </div>
                        <div id="morris-donut" class="morris-chart"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <!-- End col -->
        </div>
    </div>
@endsection
@section('script')

    <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-chart-morris.js') }}"></script>
    <script>
        Morris.Donut({
            element: 'morris-donut',
            data: [{
                    value: {{ App\Orders::where('tracking', 0)->count() }},
                    label: 'Pending Orders'
                },
                {
                    value: {{ App\Orders::where('tracking', 1)->count() }},
                    label: 'Completed Orders'
                },
                {
                    value: {{ App\Orders::where('tracking', 2)->count() }},
                    label: 'Cancelled Orders'
                }
            ],
            colors: ['#EE6624', '#18d26b', '#e9eff9'],
            resize: true,
            labelColor: "#8A98AC",
            backgroundColor: "transparent",
            formatter: function(x) {
                return x + ""
            }
        });

    </script>
@endsection
