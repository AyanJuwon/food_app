@extends('layouts.dashboard')


@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}"> --}}
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
<!--===============================================================================================-->
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/util.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/main.css') }}"> --}}
<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>
<link href="{{ asset('asset/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('asset/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('asset/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ asset('asset/styles/store.css') }}">
<link rel="stylesheet" href="{{ asset('asset/styles/orders.css') }}">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  cursor: pointer;
  font-size: 16px;
  border: none;
  outline: none;
  padding: 10px 0px 10px 0px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

 .dropdown:hover .dropbtn, .dropbtn:focus {

}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.show {
  display: block;
}
.flex-container {
  display: flex;
  flex-wrap: nowrap;
}

.flex-container > div {
  text-align: center;
}
</style>

@endsection
@section('content')
<div class="mt-5 pb-5"></div>
    <div class="contentbar mt-5 pt-5">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title mb-0">Pending Orders</h5>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Reference</th>
                                        <th>Payment Method</th>
                                        <th>Table ID</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                        <th>See Details</th>
                                    </tr>
                                </thead>
                                <tbody>


                        @foreach ($orders as $order)  <tr>
                                        <td scope="row">#{{$order->id}}</td>
                                        <td>{{$order->reference}}</td>
                                        <td>@if($order->payment_method == 0) Paystacks @else Cash @endif</td>
                                        <td>{{$order->table_id}}</td>
                                        <td>{{$order->created_at->toDateString()}}</td>
                                        <td>${{$order->total}}</td>
                                        <td>
                                                 @if ($order->tracking == 0)
                                            <span class="badge badge-info-inverse">Queued</span>

                                        @endif
                                        @if ($order->tracking == 1)

                                            <span class="badge badge-primary-inverse">Processing</span>
                                        @else
                                            @if ($order->tracking == 2)

                                                <span class="badge badge-success-inverse">Ready</span>
                                            @endif
                                            @if ($order->tracking == 3)

                                                <span class="badge badge-danger-inverse">Cancelled</span>
                                            @endif

                                        @endif
                                    </td>
                                        <td>
                                            <div class="button-list flex-container">
                                        <div>            <form  id="processOrder"
                                                action="{{ route('admin.processOrder', [$order->id]) }}" method="post">
                                                @csrf<button type="submit" class="btn btn-primary-rgba"><i class="feather icon-file"></i></button></form>
                                        </div>
                                            <div>    <form  id="completeForm"
                                                action="{{ route('admin.completeOrder', [$order->id]) }}" method="post">
                                                @csrf<button type="submit" class="btn btn-success-rgba"><i class="fas fa-check"></i></button></form>
                                                </div>
                                        <div>    <form  id="cancelForm" action="{{ route('admin.cancelOrder', [$order->id]) }}"
                                                method="post">
                                                @csrf<button type="submit" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></button></form>
                                        </div>
{{--
                                                <a href="{{ route('admin.processOrder', [$order->id]) }}" onclick="event.preventDefault();document.getElementById('processOrder').submit();" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                                <a href="{{ route('admin.completeOrder', [$order->id]) }}" onclick="event.preventDefault();document.getElementById('completeForm').submit();" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                                <a href="{{ route('admin.cancelOrder', [$order->id]) }}" onclick="event.preventDefault();document.getElementById('cancelForm').submit();" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a> --}}
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('adminViewOrder', $order) }}" class="text-primary">See
                                                Details</a>
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
        </div>
        <!-- End row -->
    </div>
@endsection

@section('script')


<script src="{{ asset('asset/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('asset/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('asset/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('asset/script/main.js') }}"></script>
<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
    console.log('clicked')
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>
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
