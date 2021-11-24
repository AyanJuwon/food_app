use App\Models\Category;

@extends('layouts.dashboard')
@section('title')
    {{ isset($data) ? 'Edit Category' : 'Add Category' }}
@endsection
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Add category</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Create Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ isset($data) ? 'Edit category' : 'Add category' }}</li>
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
                        <h5 class="card-title">{{ isset($data) ? 'Edit category' : 'Add category' }}</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle">{{ isset($data) ? 'Edit category' : 'Add category' }}.</h6>
                        @include('partials.list_error')
                        @include('partials.success')
                        <form class="form-validate"
                            action="{{ isset($data) ? route('categories.update', $data->id) : route('categories.store') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @isset($data)
                                @method('PUT')
                            @endisset
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="name">Category Name <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="category_name" name="name"
                                        value="{{ isset($data) ? $data->name : old('name') }}"
                                        placeholder="Enter Category Name">
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
