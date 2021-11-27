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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menus = Menu::all();
         $categories = Category::all();
        return view('index')->with('menus',$menus)->with('categories',$categories);
    }


    public function search(Request $request ){
        $query = $request->search;
    $menus=Menu::where ( 'menu_name', 'LIKE', '%' . $query . '%' )->orWhere ( 'category', 'LIKE', '%' . $query . '%' )->get ();
if (count ( $menus) > 0){

         $categories = Category::all();

        return view('shop')->with('menus',$menus)->with('categories',$categories)->withQuery ( $query );
    }
    else{
          $categories = Category::all();
        return view('shop')->withMessage ( 'No Details found. Try to search again !' )->with('categories',$categories);
        
    }
        
    }
}