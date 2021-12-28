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
            'name' => 'required',
            'table_id'=>'required',
            'email'=>'required',
            'phoneNumber'=>'required',

        ]);
 $total = str_replace(',', '', Cart::SubTotal());
              $order =  Orders::create([
                  'table_id'=>$request->table_id,
               'name'=>$request->name,
                'tracking'=> 0 ,
                'reference'=>$request->reference,
                'total' => $total,
               ]);
      $customer = Customer::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'phoneNumber'=>$request->phoneNumber,


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

        session()->flash('message', 'Order Completed, You will be served in 30 nminues');
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
