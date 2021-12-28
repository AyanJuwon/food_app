@extends('layouts.app')

@section('css')
    <meta http-equiv="refresh" content="5">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('asset/styles/store.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/styles/orders.css') }}">
@endsection

@section('content')


    <main class="m-5 main">

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

                    @foreach (\App\Models\OrderDetail::where('order_id', $order_id)->get() as $orderDetail)
                        @foreach (\App\Models\Menu::where('id', $orderDetail->menu_id)->get() as $menu)



                            <div class="story-card flex-container">

                                <div class="story-card__body-story">

                                    <div class="story-card__body-left">
                                        <img src="{{ asset( $menu->menu_image) }}"
                                            alt="{{ $menu->menu_image }}" class="story-card__story-img">
                                    </div>

                                    <div class="story-card__body-right">
                                        <div class="story-card__header">

                                            <div class="story-card__info">
                                                <h6>{{ $menu->menu_name }}</h6>
                                            </div>

                                        </div>
                                        <p class="memorial-card-content">
                                        <p>Order No: {{ $order->id }} </p>
                                        <p>Quantity: {{ $orderDetail->quantity }} </p>
                                        <div>
                                            @if ($order->tracking == 0)
                                                <span class="out-of-stock text-warning">Cooking</span>

                                            @endif
                                            @if ($order->tracking == 1)

                                                <span class="in-stock text-success">Ready</span>
                                                <?php session()->flash('message', 'your order with id' .
                                                $order->id . 'and ' . $order->payment_id . ' is ready'); ?>
                                            @else
                                                @if ($order->tracking == 2)
                                                    <?php session()->flash('error', 'your order with id' .
                                                    $order->id . 'and ' . $order->payment_id . ' is cancelled'); ?>
                                                    <span class="out-of-stock text-danger">Cancelled</span>
                                                @endif

                                            @endif
                                        </div>
                                        <p class="story-card__date">Ordered on:
                                            {{ $order->created_at->toDateString() }}
                                        </p>
                                        <p class="story-card__date">Price:
                                            ${{ $menu->menu_price }}
                                        </p>
                                        <a href="{{ route('menu', $menu->id) }}" class="memorial-card-button">Buy
                                            Again</a>

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
                                    <p class="card-text text-secondary">Items Total: ${{ $order->total }} </p>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script>
        // / Count Down that executes ever second
        setInterval(function() {
            refreshCheck();
            //   updateVisualTimer();
        }, 20000);

        // The code that checks if the window needs to reload
        function refreshCheck() {
            window.location.reload(); // If this is called no reset is needed
            reset(); // We want to reset just to make sure the location reload is not called.


        }

    </script>



@endsection
