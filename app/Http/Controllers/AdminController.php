<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orders;
use App\Models\Category;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        return view('admin.admin.index')
            ->with('admins', $admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:2|confirmed',
        ]);

        User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        session()->flash('message', 'Admin Created successfully');

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $admin = User::find($id);

        $admin->delete();

        session()->flash('message', 'Admin Deleted successfully');

        return redirect()->back();
    }


    // create view for admin to view all orders and service them


    public function adminViewPendingOrders(Orders $order)
    {
        //    $orders = Orders::where('user_id',auth()->user()->id)->get();
        $orders = Orders::where('tracking', 0)->orWhere('tracking', 1)->get();

//        $total_quantity= 0;
//    foreach($OrderDetail as $qty) {
//        $total_quantity += $qty->quantity  ;}
        return view('admin.admin.pending')->with('orders', $orders);
    }

    public function adminViewOrderDetails(Orders $order)
    {
        session()->put('backUrl', '/my-order');
        if (auth()->id() !== $order->user_id) {
            return back()->withErrors('You do not have access to this!');
        }
        $orderDetails = OrderDetail::where('order_id', $order->id)->get();

        return view('users.my-order')->with([
            'orderDetails' => $orderDetails,
        ]);
    }


    public function adminViewCompletedOrders()
    {
        //    $orders = Orders::where('user_id',auth()->user()->id)->get();
        $orders = Orders::where('tracking', 1)->get();

        return view('admin.admin.completed')->with('orders', $orders);
        //
    }


    public function adminViewCancelledOrders()
    {
        $orders = Orders::where('tracking', 2)->get();

        return view('admin.admin.cancelled')->with('orders', $orders);
    }

    public function processOrders($id)
    {
        Orders::where('id', $id)->update(['tracking' => 1]);
        session()->flash('message', 'Order with id ' . $id . ' is being Processed');
        session()->flash('success', 'Order with id ' . $id . ' is being Processed');

        // return response()->json(['success' => true]);
        return redirect()->back();
    }


    public function completeOrders($id)
    {

        Orders::where('id', $id)->update(['tracking' => 2]);
        session()->flash('message', 'Order with id ' . $id . ' completed successfully');
        session()->flash('success', 'Order with id ' . $id . ' completed successfully');

        // return response()->json(['success' => true]);
        return redirect()->back();
    }


    public function cancelOrders(Request $request, $id)
    {

        Orders::where('id', $id)->update(['tracking' => 3]);
        // Orders::update('tracking',2 );

        session()->flash('message', 'Order with id ' . $id . ' cancelled successfully');
        session()->flash('error', 'Order with id ' . $id . ' cancelled successfully');
        return redirect()->back();
    }

    public function viewOrderDetails(Orders $order)
    {
        session()->put('backUrl', '/my-order');
        if (auth()->id() !== $order->user_id) {
            return back()->withErrors('You do not have access to this!');
        }
        $categories = Category::all();
        $orderDetails = OrderDetail::where('order_id', $order->id)->get();
        $order_id = $order->id;
        $order = $order;
        return view('admin.admin.orderDetails')->with([
            'orderDetails' => $orderDetails,
            'order_id' => $order_id,
            'order' => $order,
            'categories' => $categories
        ]);
    }
}
