@extends('layouts.app')

@section('css')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('asset/styles/store.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/styles/orders.css') }}">
@endsection

@section('content')
    

  <main>

            <div class="container">
                <div class="sheet">
                    <section class="header">
                        <h3>Order Details</h3>
                    </section>
                    <section class="order-meta">
                        <p class="meta-data">order no
                            <?php echo $order_id; ?></p>
                        <p class="meta-data">placed on :{{ $order->created_at->toDateString() }}</p>
                        <p class="meta-data">total : ${{ $order->total }}</p>
                    </section>
                    <section class="order-details">
                        <h4>Items In Your Order</h4>

                        @foreach (\App\OrderDetail::where('order_id', $order_id)->get() as $orderDetail)
                            @foreach (\App\Menu::where('id', $orderDetail->product_id)->get() as $menu)
                            


                                <div class="story-card flex-container">

                                    <div class="story-card__body-story">

                                        <div class="story-card__body-left">
                                            <img src="{{asset('uploads/menu/'.$menu->product_image)}}}"
                                                alt="{{ $menu->product_image }}" class="story-card__story-img">
                                        </div>

                                        <div class="story-card__body-right">
                                            <div class="story-card__header">

                                                <div class="story-card__info">
                                                    <h6>{{ $menu->product_name }}</h6>
                                                </div>

                                            </div>
                                            <p class="memorial-card-content">
                                            <p>Order No: {{ $order->id }} </p>
                                            <p>Quantity: {{ $orderDetail->quantity }} </p>
                                            <div>
                                                @if ($order->tracking == 0)
                                     <span class="out-of-stock">In Transit</span>

                                 @endif
                                 @if ($order->tracking == 1)

                                     <span class="in-stock">Completed</span>
                                 @else
                                     @if ($order->tracking == 2)

                                         <span class="out-of-stock">Cancelled</span>
                                     @endif

                                 @endif
                                            </div>
                                            <p class="story-card__date">Ordered on:
                                                {{ $order->created_at->toDateString() }}
                                            </p>
                                            <p class="story-card__date">Price:
                                                ${{ $menu->product_price }}
                                            </p>
                                            <a href="{{ route('menu', $menu->id) }}" class="memorial-card-button">Buy
                                                Again</a>
                                            <a href="#" class="memorial-card-button">Track
                                                Order</a>
                                            </p>
                                        </div>
                                    </div>

                                </div>


                            @endforeach
                        @endforeach
                    </section>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        Payment Information
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Payment Details</h5>
                                        <p class="card-text text-secondary  ">Paid with Paystacks</p>
                                        <p class="card-text text-secondary">Items Total: ${{ $order->total - 10 }} </p>
                                        <p class="card-text text-secondary">Delivery Fee: $100 </p>
                                        <p class="card-text ">Total: ${{ $order->total }} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        Delivery Information
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Delivery Address</h5>
                                        <p class="card-text text-secondary">Address: {{ $order->address }}</p>
                                        <p class="card-text text-secondary">Address: {{ $order->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection