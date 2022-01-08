<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Slider\SliderService;
use App\Models\Product;

class MenuController extends Controller
{
    protected $menuService;
    //
    public function __construct(MenuService $menuService,SliderService $slider)
    {
        $this->menuService=$menuService;

    }

    public function index(Request $request, $id, $slug = ' ')
    {
        $menu = $this-> menuService->getId($id);
        $products = $this->menuService->getProduct($menu, $request);
        
        return view('menu',[
            'title'=>$menu->name,
            'products'=>$products,
            'menu'=>$menu
        ]);
    }
    
    public function search(Request $request)
    {
        $search_text =$_GET['query'];
        $products = Product::where('name', 'LIKE', '%' .$search_text. '%')->get();
        return view('products.search',[
            'title'=>'Tìm Kiếm'
        ] ,compact('products'));
    }
}
