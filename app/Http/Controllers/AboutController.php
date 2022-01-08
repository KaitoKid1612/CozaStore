<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductService;
use App\Http\Services\Slider\SliderService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    protected $slider;
    protected $product;
    //
    public function __construct(SliderService $slider, ProductService $product)
    {
        $this->slider=$slider;
        $this->product=$product;
    }
    //
    public function index()
    {
        return view('about.about',[
            'title'=>'About',
            'sliders'=>$this->slider->show(),
            'products'=>$this->product->get()
        ]);
    }
}
