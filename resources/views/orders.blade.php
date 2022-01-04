<div class="container">
    <table class="table table-wishlist table-mobile">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

                @foreach ($orders as $order)

                  <tr>   @foreach (\App\Models\OrderDetail::where('order_id', $order->id)->orderBy('id','desc')->get()->take(5) as $orderDetail)



                        @foreach (\App\Models\Menu::where('id', $orderDetail->menu_id)->get() as $menu)

                            <td class="product-col">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{ asset( $menu->menu_image) }}"
                                                alt="Product image">
                                        </a>
                                    </figure>

                                    <h3 class="product-title">
                                        <a href="#">{{ $menu->menu_name }}</a>
                                    </h3><!-- End .product-title -->
                                </div><!-- End .product -->
                            </td>
                            <td class="price-col">&#x20A6;{{ $menu->menu_price }}</td>
                            <td class="stock-col">
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
                                {{-- <span class="in-stock">In stock</span> --}}

                            </td>
                            {{-- <td class="stock-col"><span class="in-stock">In stock</span></td> --}}
                            <td class="action-col">
                                    <a href="{{ route('myOrder', $order) }}"  class="btn btn-block btn-outline-primary-2">
                                            See Details

                                    </a>


                            </td>
                            <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>

                        @endforeach
                </tr>     @endforeach
                @endforeach

        </tbody>
    </table><!-- End .table table-wishlist -->
</div><!-- End .container -->
