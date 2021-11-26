<div class="container">
    <table class="table table-wishlist table-mobile">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Status</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <tr>
                @foreach ($orders as $order)
                    @foreach (\App\Models\OrderDetail::where('order_id', $order->id)->get() as $orderDetail)



                        @foreach (\App\Models\Menu::where('id', $orderDetail->menu_id)->get() as $menu)

                            <td class="product-col">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{ asset('uploads/menu/' . $menu->menu_image) }}"
                                                alt="Product image">
                                        </a>
                                    </figure>

                                    <h3 class="product-title">
                                        <a href="#">{{ $menu->menu_name }}</a>
                                    </h3><!-- End .product-title -->
                                </div><!-- End .product -->
                            </td>
                            <td class="price-col">${{ $menu->menu_price }}</td>
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
                                <a href="{{ route('myOrder', $order) }}" class="btn btn-block btn-outline-primary-2">
                                    See Details


                                </a>


                            </td>
                            <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>

                        @endforeach
                    @endforeach
                @endforeach
            </tr>
        </tbody>
    </table><!-- End .table table-wishlist -->
    <div class="wishlist-share">
        <div class="social-icons social-icons-sm mb-2">
            <label class="social-label">Share on:</label>
            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
        </div><!-- End .soial-icons -->
    </div><!-- End .wishlist-share -->
</div><!-- End .container -->
