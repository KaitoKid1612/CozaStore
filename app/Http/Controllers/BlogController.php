<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $product;
    //
    public function __construct(ProductService $product)
    {
        $this->product=$product;
    }
    //
    public function index()
    {
        return view('blog.blog',[
            'title'=>'Blog',
            'products'=>$this->product->get()
        ]);
    }
}
