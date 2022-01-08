<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductService;
use App\Http\Services\Slider\SliderService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $product;
    protected $slider;

    public function __construct(ProductService $product, SliderService $slider)
    {
        $this->product=$product;
        $this->slider=$slider;
    }
    //
    public function index()
    {
        return view('contact.contact',[
            'title'=>'Contact',
            'products'=>$this->product->get(),
            'sliders'=>$this->slider->show()
        ]);
    }
}
