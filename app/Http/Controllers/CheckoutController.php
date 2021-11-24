<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\OrderDetail;

class CheckoutController extends Controller
{
    //
    
    public function checkout(Request $request)
    {
        $address = $request->input('address');
       $request->validate([
            'phoneNumber' => 'required|min:10',
            'address' => 'required|address',
            'payment_reference' => 'required',
        ]);

            $address = $request->input('address');
            $phone_number = $request->input('phoneNumber');
              $order =  Orders::create([
                'user_id' => auth()->user()->id,
                'email' => auth()->user()->email,
                'tracking'=> 0 ,
                'phoneNumber' => $phone_number,
                'payment_id' => $payment_id,
                'address'=> $address,
                'total' => Cart::subTotal() + 10,
               ]);
      
            foreach(Cart::content() as $item){
                // dd($item->model);
                OrderDetail::create([
                'order_id' => $order->id,
                'menu_id' => $item->model->id,
                'quantity' => $item->qty,
                'menu_name' => $item->model->menu_name,
                'price' => $item->model->menu_price * $item->qty,
            ]);}
        Mail::to(auth()->user()->email)->send(new OrderPlaced($order));
 
        session()->flash('message', 'Order Completed, you will recieve an email shortly to get order details');
//     Mail::to('ayanniran@gmail.com')->send(new OrderPlaced($order,$email,$firstname))   ;
     Cart::instance('default')->destroy();
        return redirect()->route('orders');
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