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
        $swallow = Menu::where('category_id', 1)->get()->take(3);

        $combo = Menu::where('category_id', 2)->get()->take(3);
        // $drinks = Category::where('name','drinks')->take(3);
        $sides = Menu::where('category_id', 3)->get()->take(3);

        $breakfast = Menu::where('category_id', 4)->get()->take(3);
        $categories = Category::all();
        return view('index')->with('menu', $menu)->with('categories', $categories)->with('swallow', $swallow)
            ->with('combo', $combo)
            // ->with('drinks',$drinks)
            ->with('sides', $sides)
            ->with('breakfast', $breakfast);
    }


    public function search(Request $request)
    {
        $query = request()->query('search');
        if($query) {
            $menus = Menu::query()
                ->whereLike(['menu_name'], $query)->paginate(16);
        }else {
            $menus = Menu::paginate(16);
        }

        $categories = Category::all();


        return view('shop')
            ->with('menus', $menus)
            ->with('categories', $categories);

    }

    public function dashboard(){
        return view('admin.home');
    }
}
