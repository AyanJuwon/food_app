<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\OrderDetail;

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
            'name' => 'required',
           
        ]);
 $total = str_replace(',', '', Cart::SubTotal()); 
              $order =  Orders::create([
               'name'=>$request->name,
                'tracking'=> 0 ,
                'payment_id' => $request->payment_id,
                'total' => $total,
               ]);
      
            foreach(Cart::content() as $item){
                OrderDetail::create([
                'order_id' => $order->id,
                'menu_id' => $item->model->id,
                'quantity' => $item->qty,
                'menu_name' => $item->model->menu_name,
                'price' => $item->model->menu_price * $item->qty,
            ]);}
        // Mail::to(auth()->user()->email)->send(new OrderPlaced($order));
 
        session()->flash('message', 'Order Completed, Ypu will be served in 30 nminues');
        session()->flash('error', 'Order Failed');
//     Mail::to('ayanniran@gmail.com')->send(new OrderPlaced($order,$email,$firstname))   ;
     Cart::instance('default')->destroy();
        return redirect()->route('dashboard');
    }
// private function sendMail(){


//     $details = [
//         'title' => 'Mail from ItSolutionStuff.com',
//         'body' => 'This is for testing email using smtp'
//     ];

//     \Mail::to('ayanniran@gmail.com')->send(new \App\Mail\MyTestMail($details));

//     dd("Email is Sent.");

// }
}