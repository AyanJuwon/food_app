<?php

namespace App\Http\Controllers;

use App\Models\Menu;

use App\Models\User;
use App\Models\Orders;
use App\Models\Category;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class UserController extends Controller
{
    //
     public function index()
    {
        //
        $trending = Menu::all();
         $categories = Category::all();
        return view('shop')->with('trending',$trending)->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $categories = Category::all();
        $menu =  Menu::where('id',$id)->get();
        return view('menu')->with('menu',$menu)->with('categories',$categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('my-profile')->with('user', auth()->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'password' => 'sometimes|nullable|string|min:6|confirmed',
        ]);

        $user = auth()->user();
        $input = $request->except('password', 'password_confirmation');

        if (! $request->filled('password')) {
            $user->fill($input)->save();

            return back()->with('success_message', 'Profile updated successfully!');
        }

        $user->password = bcrypt($request->password);
        $user->fill($input)->save();

        return back()->with('success_message', 'Profile (and password) updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

     public function categoryFilter($category){
        $menus = Menu::where('category_id',$category)->get();

        return view('shop')->with('menus',$menus)->with('categories',Category::all());
     }


     public function dashboard(){
            $orders = Orders::where('user_id',auth()->user()->id)->get();
             $categories = Category::all();
        
            $orders_count = Orders::where('user_id',auth()->user()->id)->count();





         
        return view('dashboard')
        ->with('orders',$orders)->with('categories',$categories)->with('orders_count',$orders_count);
        
     }
    public function orders(){
        session()->put('backUrl', '/orders');
        $orders = Orders::where('user_id',auth()->user()->id)->get();
         $categories = Category::all();
        return view('orders')
        ->with('orders',$orders)->with('categories',$categories);
        // ->with('ordermenus',$ordermenus);
    
    }
   
    public function viewOrderDetails(Orders $order){
        session()->put('backUrl','/my-order');
         if (auth()->id() !== $order->user_id) {
            return back()->withErrors('You do not have access to this!');
        }
         $categories = Category::all();
        $orderDetails =  OrderDetail::where('order_id',$order->id)->get();
        $order_id = $order->id;
        $order = $order;
        return view('order')->with([
            'orderDetails' => $orderDetails,
            'order_id'=> $order_id,
            'order'=> $order,
            'categories' => $categories
        ]);
    }


    public function trackOrder($id){
        session()->put('backUrl', '/tracking');
        $orders = Orders::where('user_id',auth()->user()->id)->get();
        $order = Orders::where('id',$id)->get();
        $tracked = Orders::where('id',$id)->where('tracking',1)->get();
        $completed = Orders::where('tracking',1)->get();
         $categories = Category::all();
        return view('tracking')
        ->with('order',$order)
        ->with('tracked',$tracked)
        ->with('completed',$completed)
        ->with('categories',$categories)
        ->with('orders',$orders);
    }

    public function savedItems(){
        session()->put('backUrl', '/saved-items');
        $orders = Orders::where('user_id',auth()->user()->id)->get();
        $wishlist = Cart::instance('wishlist')->content();
        $completed = Orders::where('tracking',1)->get(); 
        $categories = Category::all();

        return view('tracking')
        ->with('completed',$completed)
        ->with('categories',$categories)
        ->with('orders',$orders)
        ->with('wishlist',$wishlist);
    }



    public function checkout(){
        $delivery = 0;
        foreach (Cart::content() as $item){
            $deliveryFee = $delivery + $item->options->delivery;
            $delivery = $deliveryFee;
        }

        return view('checkout')
            ->with('delivery', $delivery);
    }
    public function checkoutFailed(){
        $delivery = 0;
         $categories = Category::all();
        foreach (Cart::content() as $item){
            $deliveryFee = $delivery + $item->options->delivery;
            $delivery = $deliveryFee;
        }
       session()->flash('error','Payment failed, Try again');
        return view('checkout')
            ->with('delivery', $delivery)
            ->with('categories', $categories);
    }

    public function destroy($id){
        $user = User::find($id);

        $user->delete();

        session()->flash('message', 'User Deleted successfully');

        return redirect()->back();
    }
    
}