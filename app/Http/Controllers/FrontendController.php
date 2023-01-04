<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index() {
        $brand = Brand::all();
        $slider = Slider::all();
        $brand = Brand::all();
        $product = Product::all();
        return view('frontend.index', compact('brand', 'slider', 'brand', 'product'));
    }
}
