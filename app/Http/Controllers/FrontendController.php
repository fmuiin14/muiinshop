<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Slider;
use App\Models\ShowDataProduct;

class FrontendController extends Controller
{
    public function index() {
        $brand = Brand::all();
        $slider = Slider::all();
        $brand = Brand::all();
        $product = ShowDataProduct::all();
        return view('frontend.index', compact('brand', 'slider', 'brand', 'product'));
    }
}
