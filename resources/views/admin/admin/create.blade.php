<?php
/**
 * essential-foods
 * Olamiposi
 * 03/05/2021
 * 01:09
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')
@section('title')
    Add Admin
@endsection
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Add Admin</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Manage Admin(s)</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{isset($data) ? 'Edit Admin' : 'Add New Admin'}}</li>
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
        <!-- Start row -->
        <div class="row justify-content-center">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">{{isset($data) ? 'Edit Admin Form' : 'Add New Admin Form'}}</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle">{{isset($data) ? 'Edit Admin' : 'Add New Admin'}}.</h6>
                        @include('partials.list_error')
                        @include('partials.success')
                        <form class="form-validate" action="{{route('admin.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="name">Name <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Admin Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="email">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="password">Password <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Admin Password">
                                </div>
                            </div><div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="Confirm Admin Password">
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
@endsection
@section('script')
    <script src="{{asset('assets/plugins/validatejs/validate.min.js')}}"></script>
    <!-- Validate js -->
    <script src="{{asset('assets/js/custom/custom-validate.js')}}"></script>
    <script src="{{asset('assets/js/custom/custom-form-validation.js')}}"></script>
@endsection
