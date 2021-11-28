<?php
/**
* essential-foods
* Olamiposi
* 23/04/2021
* 07:04
* CREATED WITH PhpStorm
**/
?>

@extends('layouts.dashboard')
@section('title')
    All categoriess
@endsection
@section('css')
    <link href="{{ asset('asset/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{ asset('asset/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">All Categories</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Manage Categories</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Categories</li>
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
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">All Categories</h5>
                    </div>
                    @include('partials.list_error')
                    @include('partials.success')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="display table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>

                                        <th>Created at</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            {{-- <td>{{ $category->created_at->toDateString() }}</td> --}}

                                            <td>
                                                <div class="single-dropdown">
                                                    <div class="dropdown">
                                                        <a class="btn btn-primary-rgba dropdown-toggle" href="#"
                                                            role="button" id="dropdowncategoriesLink" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </a>
                                                        <div class="dropdown-categories"
                                                            aria-labelledby="dropdowncategoriesLink">
                                                            <a class="dropdown-item"
                                                                href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                                            <a class="dropdown-item"
                                                                onclick="handleDelete('{{ $category->id }}')">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
        </div>
        <!-- End row -->
    </div>


@endsection
@section('script')
    @include('partials.modal')
    <script>
        function handleDelete(id) {
            $('#deleteModal').modal({
                backdrop: 'static',
                keyboard: false
            });
            var form = document.getElementById('deleteForm');
            var url = '{{ route('categories.destroy', [':id']) }}';
            url = url.replace(':id', id);
            form.action = url;
        }

    </script>
    <script src="{{ asset('asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset/js/custom/custom-table-datatable.js') }}"></script>
@endsection
