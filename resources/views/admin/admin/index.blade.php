<?php
/**
* essential-foods
* Olamiposi
* 03/05/2021
* 01:00
* CREATED WITH PhpStorm
**/
?>
@extends('layouts.dashboard')
@section('title')
    All Admins
@endsection
@section('css')
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">All Admins</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Manage Admins</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Admins</li>
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
                        <h5 class="card-title">All Admins</h5>
                    </div>
                    @include('partials.list_error')
                    @include('partials.success')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="display table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created at</th>
                                        {{-- <th>View</th> --}}
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $admin->firstName . ' ' . $admin->lastName }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->created_at->format('M d, Y') }}</td>
                                            {{-- <td> --}}
                                            {{-- <a href="#" type="button" class="btn btn-primary-rgba"><i class="feather icon-send mr-2"></i> View</a> --}}
                                            {{-- </td> --}}
                                            <td>
                                                <div class="single-dropdown">
                                                    <div class="dropdown">
                                                        <a class="btn btn-primary-rgba dropdown-toggle" href="#"
                                                            role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                            <a class="dropdown-item"
                                                                onclick="handleDelete('{{ $admin->id }}')">Delete
                                                                Admin</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>

                                </tfoot>
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
            var url = '{{ route('admin.destroy', [':id']) }}';
            url = url.replace(':id', id);
            form.action = url;
        }

    </script>
    {{-- <script> --}}
    {{-- function handleDeletee(id){ --}}
    {{-- $('#activateModal').modal({backdrop: 'static',keyboard : false}); --}}
    {{-- var form = document.getElementById('activateForm'); --}}
    {{-- var url = '{{ route('activate.user', [':id']) }}'; --}}
    {{-- url = url.replace(':id', id); --}}
    {{-- form.action = url; --}}
    {{-- } --}}
    {{-- </script> --}}
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
