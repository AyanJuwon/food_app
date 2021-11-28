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
                            <th class="column5">Order Quantity</th>
                            <th class="column6">Total</th>
                            <th class="column7">Payment Refrence</th>
                            <th class="column8">Status</th>
                            <th class="column8">See Details</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($orders as $order)

                            <?php $cart_quantity = 0; ?>
                            <tr>
                                <td class="column1">{{ $order->updated_at }}</td>
                                <td class="column2">{{ $order->id }}</td>
                                <td class="column5">
                                    @foreach (\App\Models\OrderDetail::where('order_id', $order->id)->get() as $orderDetail)
                                        <?php $cart_quantity += $orderDetail->quantity; ?>
                                    @endforeach
                                    <?php echo $cart_quantity; ?>
                                </td>

                                <td class="column6">${{ $order->total }}</td>
                                <td class="column7">{{ $order->payment_id }}</td>
                                <td class="column8"><button type="submit" class="btn btn-danger">Cancelled</button></td>
                                <td class="column9"><a href="{{ route('adminViewOrder', $order) }}" class="text-primary">See
                                        Details</a></td>
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
