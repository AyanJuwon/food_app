<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class MenuController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index')
            ->with('menus', $menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu_name' => 'required|unique:menus',
            'menu_image' => 'required|mimes:jpg,png,jpeg|max:3072',
            'menu_price' => 'required',
            'menu_description' => 'required',
            'category' => 'required'
        ]);

        if($request->hasFile('menu_image')){
            $file = $request->file('menu_image');
            $resize = Image::make($file)->encode('jpg');
            $hash = md5($resize->__toString());
            $path = "uploads/menu/{$hash}.jpg";
            $resize->save($path);
            $image = "{$hash}.jpg";
        }
        $category = Category::where('id',$request->category)->first();
        Menu::create([
            'menu_name' => $request->menu_name,
            'menu_image' => $image,
            'menu_price' => $request->menu_price,
            'menu_description' => $request->menu_description,
            'category' =>$category->name ,
            'category_id' => $request->category,
        ]);
        session()->flash('message', 'Category Added Successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menus
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $menu = Menu::where('id', $id)->firstOrFail();
        return view('admin.menus.show')->with('menu' ,$menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menus
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($menu)
    {
        $menu = Menu::where('id', $menu)->firstOrFail();
        return view('admin.menus.create')
            ->with('data', $menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menus
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $menu)
    {
        $menu = Menu::where('id', $menu)->firstOrFail();
        $data = $request->only([
            'menu_name',
            'menu_price',
            'menu_description',
            'category'
        ]);

        if($request->hasFile('menu_image')){
            $file = $request->file('menu_image');
            $resize = Image::make($file)->encode('jpg');
            $hash = md5($resize->__toString());
            $path = "uploads/menu/{$hash}.jpg";
            $resize->save($path);
            $image = "{$hash}.jpg";

            $data['menu_image'] = $image;
        }

        $menu->update($data);

        session()->flash('message', 'menu Updated successfully');

        return redirect(route('menu.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menus
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($menu)
    {
//        dd($menus);
        $menu = Menu::where('id', $menu)->firstOrFail();

        $menu->delete();

        session()->flash('message', 'menu Deleted successfully');

        return redirect()->back();

   }
}