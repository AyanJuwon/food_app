@extends('layouts.dashboard')


@section('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/main.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
        <style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
</style>

@endsection
@section('content')
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Date</th>
                            <th class="column2">Order ID</th>
                            <th class="column5">Order Quantity</th>
                            <th class="column6">Total</th>
                            <th class="column7">Reference</th>
                            <th class="column8">Status</th>
                            <th class="column9">See Details</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orders as $order)

                            <?php $cart_quantity = 0; ?>
                            <tr>
                                <td class="column1">{{ $order->created_at->toDateString() }}</td>
                                <td class="column2">{{ $order->id }}</td>


                                <td class="column5">
                                    @foreach (\App\Models\OrderDetail::where('order_id', $order->id)->get() as $orderDetail)
                                        <?php $cart_quantity += $orderDetail->quantity; ?>
                                    @endforeach
                                    <?php echo $cart_quantity; ?>
                                </td>

                                <td class="column6">${{ $order->total }}</td>
                                <td class="column7">{{ $order->reference}}</td>
                                <td class="column8 ">
                                    <form hidden id="completeForm"
                                        action="{{ route('admin.completeOrder', [$order->id]) }}" method="post">
                                        @csrf<button type="submit" class="btn btn-success">Complete Order</button></form>
                                    <form hidden id="cancelForm" action="{{ route('admin.cancelOrder', [$order->id]) }}"
                                        method="post">
                                        @csrf<button type="submit" class="btn btn-danger">Cancel Order</button></form>

                                        <div class="dropdown">
                                            <button class="dropbtn" onclick="myFunction()">Action
                                              <i class="fa fa-caret-down"></i>
                                            </button>
                                            <div class="dropdown-content" id="myDropdown">
                                               <a href="" class="text-success" onclick="event.preventDefault();document.getElementById('completeForm').submit();">Complete Order</a>

        <a href="" onclick="event.preventDefault();document.getElementById('cancelForm').submit();" class="text-danger">Cancel Order</a>
                                            </div>
                                            </div>

            </div>
            </td>
            <td class="column9"><a href="{{ route('adminViewOrder', $order) }}" class="text-primary">See Details</a></td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection

@section('script')

    <script src="{{ asset('asset/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('asset/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
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
