<?php
/**
 * essential-foods
 * Olamiposi
 * 03/05/2021
 * 00:28
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')
@section('title')
    {{ $menu->menu_name }}
@endsection
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">View {{ $menu->menu_name }}
                </h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Manage Manufacturer(s)</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View {{ $menu->menu_name }}
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{route('home')}}" class="btn btn-primary-rgba"><i class="feather icon-skip-back mr-2"></i>Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>

    <div class="contentbar">
        <!-- End row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="invoice">
                            <div class="invoice-head">
                                <div class="row">
                                    <div class="col-12 col-md-7 col-lg-7">
                                        <div class="invoice-logo">
                                            <img src="{{asset('asset/images/logo.svg')}}" class="img-fluid" alt="invoice-logo">
                                        </div>
                                        <h4>{{$menu->menu_name}}.</h4>
                                    </div>
                                    <div class="col-12 col-md-5 col-lg-5">
                                        <div class="invoice-name">
                                            <h5 class="text-uppercase mb-3">Details</h5>
                                            <p class="mb-1">No : {{$menu->id}}</p>
                                            <h4 class="text-success mb-0 mt-3">&#x20A6;{{number_format($menu->menu_price)}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="invoice-billing">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-sm-12 col-md-12 col-lg-12">--}}
{{--                                        <div class="invoice-address">--}}
{{--                                            <h6 class="mb-3">menu Description</h6>--}}
{{--                                            <p>{{$menu->menu_details}}</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-12 col-md-12 col-lg-12">--}}
{{--                                        <div class="invoice-address">--}}
{{--                                            <h6 class="mb-3">menu Manufacturer</h6>--}}
{{--                                            <p>{{$menu->manufacturer->manufacturer_name}}</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-12 col-md-12 col-lg-12">--}}
{{--                                        <div class="invoice-address">--}}
{{--                                            <h6 class="mb-3">menu Category</h6>--}}
{{--                                            <p>{{$menu->category->category_name}}</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body text-center">
                        <div class="user-slider">
                            <div class="user-slider-item">
                                <img src="{{asset($menu->menu_image)}}" alt="avatar" width="100" class="rounded-circle mt-3 mb-4">
                                <h5>{{$menu->menu_name}}</h5>
                                <p style="color: black">Created On: {{$menu->created_at->format('M d, Y')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End col -->

        <!-- End row -->
    </div>
@endsection

