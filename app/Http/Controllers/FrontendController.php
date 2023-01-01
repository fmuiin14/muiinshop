<?php

namespace App\Http\Controllers;

use App\Models\Brand;

class FrontendController extends Controller
{
    public function index() {
        $brand = Brand::all();
        return view('frontend.index', compact('brand'));
    }
}
