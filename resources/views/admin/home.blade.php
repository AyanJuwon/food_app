@extends('layouts.dashboard')
@section('title')
    Dashboard
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">
@endsection
@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Food App</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Food App</li>
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
                                    <span class="align-self-center mr-3 action-icon badge badge-success-inverse"><i class="feather icon-credit-card"></i></span>
                                    <div class="media-body">
                                        <p class="mb-0">Total Amount Made</p>
                                        <h5 class="mb-0">₦ {{number_format(\App\Models\Orders::totalAmount())}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="media">
                                    <span class="align-self-center mr-3 action-icon badge badge-success-inverse"><i class="feather icon-credit-card"></i></span>
                                    <div class="media-body">
                                        <p class="mb-0">Total Number Of Tables</p>
                                        <h5 class="mb-0">{{number_format(\App\Models\Table::totalTables())}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="media">
                                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
                                    <div class="media-body">
                                        <p class="mb-0">Queued Orders</p>
                                        <h5 class="mb-0">{{number_format(\App\Models\Orders::totalQueuedOrders())}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="media">
                                    <span class="align-self-center mr-3 action-icon badge badge-primary-inverse"><i class="feather icon-loader"></i></span>
                                    <div class="media-body">
                                        <p class="mb-0">Processing Orders</p>
                                        <h5 class="mb-0">{{number_format(\App\Models\Orders::totalProcessingOrders())}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="media">
                                    <span class="align-self-center mr-3 action-icon badge badge-success-inverse"><i class="feather icon-check"></i></span>
                                    <div class="media-body">
                                        <p class="mb-0">Completed Orders</p>
                                        <h5 class="mb-0">{{number_format(\App\Models\Orders::totalCompletedOrders())}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="media">
                                    <span class="align-self-center mr-3 action-icon badge badge-danger-inverse"><i class="fa fa-close"></i></span>
                                    <div class="media-body">
                                        <p class="mb-0">Canceled Orders</p>
                                        <h5 class="mb-0">{{number_format(\App\Models\Orders::totalCanceledOrders())}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="media">
                                    <span class="align-self-center mr-3 action-icon badge badge-warning-inverse"><i class="feather icon-shopping-cart"></i></span>
                                    <div class="media-body">
                                        <p class="mb-0">Total Orders</p>
                                        <h5 class="mb-0">{{number_format(\App\Models\Orders::all()->count())}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')


@endsection
