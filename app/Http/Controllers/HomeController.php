<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu = Menu::paginate(16);
        $swallow = Category::where('name', 'swallow')->take(3);
        $combo = Category::where('name', 'combo')->take(3);
        // $drinks = Category::where('name','drinks')->take(3);
        $sides = Category::where('name', 'sides')->take(3);
        $breakfast = Category::where('name', 'breakfast')->take(3);
        $categories = Category::all();
        return view('index')->with('menu', $menu)->with('categories', $categories)->with('swallow', $swallow)
            ->with('combo', $combo)
            // ->with('drinks',$drinks)
            ->with('sides', $sides)
            ->with('breakfast', $breakfast);
    }


    public function search(Request $request)
    {
        $query = $request->search;
        $menus = Menu::where('menu_name', 'LIKE', '%' . $query . '%')->paginate(16);
        if (count($menus) > 0) {

            $categories = Category::all();

            return view('shop')->with('menus', $menus)->with('categories', $categories)->withQuery($query);
        } else {
            $categories = Category::all();
            return view('shop')->withMessage('No Details found. Try to search again !')->with('categories', $categories);
        }
    }
}
