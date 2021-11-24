<?php
/**
* essential-foods
* Olamiposi
* 23/04/2021
* 07:03
* CREATED WITH PhpStorm
**/
?>
@extends('layouts.dashboard')
@section('title')
    {{ isset($data) ? 'Edit menu' : 'Add Menu' }}
@endsection
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Add menu</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Manage menus</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ isset($data) ? 'Edit menu' : 'Add menu' }}</li>
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
    <div class="contentbar">
        <!-- Start row -->
        <div class="row justify-content-center">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">{{ isset($data) ? 'Edit menu' : 'Add menu' }}</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle">{{ isset($data) ? 'Edit menu' : 'Add menu' }}.</h6>
                        @include('partials.list_error')
                        @include('partials.success')
                        <form class="form-validate"
                            action="{{ isset($data) ? route('menus.update', $data->id) : route('menus.store') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @isset($data)
                                @method('PUT')
                            @endisset
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="menu_name">menu Name <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="menu_name" name="menu_name"
                                        value="{{ isset($data) ? $data->menu_name : old('menu_name') }}"
                                        placeholder="Enter menu Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="amount">Price<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" id="menu_price" name="menu_price"
                                        value="{{ isset($data) ? $data->menu_price : old('menu_price') }}"
                                        placeholder="Enter Price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="amount">Description <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <textarea type="number" class="form-control" id="menu_description"
                                        name="menu_description"
                                        value="{{ isset($data) ? $data->menu_price : old('menu_description') }}"
                                        placeholder="Enter Description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="category">Category <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                <select name="category_id" class="form-control">
    @foreach ($categories as $category)

    <option value="{{$category->id}}" >{{$category->name}}</option>
    @endforeach

                                </select>
                                    

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="menu_image">menu Image <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    @if (isset($data))
                                        <img class="text-center" src="{{ asset('uploads/menu/' . $data->menu_image) }}">
                                    @endif
                                    <input type="file" class="form-control" id="menu_image" name="menu_image">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
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
    <script src="{{ asset('assets/plugins/validatejs/validate.min.js') }}"></script>
    <!-- Validate js -->
    <script src="{{ asset('assets/js/custom/custom-validate.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-validation.js') }}"></script>
@endsection
