@extends('layouts.dashboard')


@section('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/main.css') }}">

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
                            <th class="column5">Order Items Quantity</th>
                            <th class="column6">Total</th>
                            <th class="column7">Address</th>
                            <th class="column8">Status</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($orders as $order)

                            <tr>
                                <td class="column1">{{ $order->created_at }}</td>
                                <td class="column2">{{ $order->id }}</td>
                                <td class="column5">
                                    @foreach (\App\OrderProduct::where('order_id', $order->id)->get() as $orderProduct)
                                        <?php $cart_quantity += $orderProduct->quantity; ?>
                                    @endforeach
                                    <?php echo $cart_quantity; ?>
                                </td>

                                <td class="column6">${{ $order->total - 100 }}</td>
                                <td class="column7">{{ $order->address }}</td>
                                <td class="column8"><button type="submit" class="btn btn-danger">Cancelled</button>
                            </tr>
                        @endforeach
                        <h4>$orders</h4>
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
    <!--===============================================================================================-->
    <script src="{{ asset('asset/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('asset/script/main.js') }}"></script>

@endsection
