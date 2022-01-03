<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\OrderDetail;
use App\Models\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    //

    public function checkout(Request $request)
    {
        $address = $request->input('address');
        $request->validate([
            'payer_name' => 'required',
            'table_id' => 'required',
            'email' => 'required',
            'payment_method'=>'required',

        ]);
        $total = str_replace(',', '', Cart::SubTotal());
        $order = Orders::create([
            'table_id' => $request->table_id,
            'payer_name' => $request->payer_name,
            'tracking' => 0,
            'reference' => $request->reference,
            'total' => $total,
            'email' => $request->email,
            'payment_method'=>$request->payment_method,
        ]);

        foreach (Cart::content() as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'menu_id' => $item->model->id,
                'quantity' => $item->qty,
                'menu_name' => $item->model->menu_name,
                'price' => $item->model->menu_price * $item->qty,
            ]);
        }
        // Mail::to(auth()->user()->email)->send(new OrderPlaced($order));
        session()->flash('notification-admin', 'Order created at' . $order->table_id);
        session()->flash('message', 'Order Completed, You will be served in 30 minutes');
//     Mail::to('ayanniran@gmail.com')->send(new OrderPlaced($order,$email,$firstname))   ;
        Cart::instance('default')->destroy();
        return redirect()->route('myOrder', $order->id);
    }
}
