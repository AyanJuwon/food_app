<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Category;


class CartController extends Controller
{
    //
      public function index()
    {
        $categories = Category::all();

        return view('cart')->with('categories',$categories);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        // Function to add to cart from menus page
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });

        if($duplicates->isNotEmpty()){

            session()->flash('message', 'Item is already in your cart!');

            return redirect()->back();
        }


        $delivery = 2.0;
         Cart::add([
            'id' => $request->id,
            'name' => $request->menu_name,
            'qty' => $request->qty,
            'price' => $request->menu_price,

        ])
            ->associate('App\Models\Menu');
        if(auth()->user()){

            // Cart::store(auth()->user()->id);
            // Cart::instance('wishlist')->store(auth()->user()->id);

                session()->flash('message', 'Item was added to your cart Successfully');
                }
                    else{

                        // Cart::store();
                        // Cart::instance('wishlist')->store();

                        session()->flash('message', 'Item was added to your cart Successfully');
                        };

        session()->flash('message', 'Item was added to your cart Successfully');

        return redirect()->route('cart.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveItem(Request $request, $id)
    {
        $item = Cart::get($id);



             $categories = Category::all();

        Cart::instance('wishlist')->add([
            'id' => $request->id,
            'name' => $request->menu_name,
            'qty' => 1,
            'price'=>$request->menu_price,

        ])->associate('App\menus');


       Cart::instance('wishlist')->store(auth()->user()->id);

        session()->flash('message', 'Item was added to your wishlist Successfully');

        return redirect()->route('cart.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        Cart::update($id, $request->qty);
        session()->flash('message', 'Quantity was updated successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Cart::remove($id);

        session()->flash('message', 'Item was removed from your cart Successfully');

        return redirect()->back();
    }
}
