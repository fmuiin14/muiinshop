<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ShowDataProduct;
use App\Http\Controllers\Controller;
use App\Models\SizeAvailableProduct;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ShowDataProduct::join('products', 'products.product_id', '=', 'show_data_products.id')->get();
        // $products = Product::join('show_data_products', 'show_data_products.id', '=', 'products.product_id')->first();
        dd($products);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product.create', compact('category', 'brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        // master product
        $image_path_master = '';
            if ($request->hasFile('photo')) {
                $image_path_master = $request->file('photo')->store('products', 'public');
            }
        $masterProduk = ShowDataProduct::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'summary' => $request->summary,
            'description' => $request->description,
            'photo' => $image_path_master,
            // 'stock' => $request->s,
            // 'size' => 's',
            // 'price' => $request->price,
            // 'discount_price' => $request->discount_price,
            // 'status' => 'show',
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);

        // size S
        if ($request->s != '' || $request->s != null) {
            // $image_path = '';
            // if ($request->hasFile('photo')) {
            //     $image_path = $request->file('photo')->store('products', 'public');
            // }

            $produk = Product::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title) . '-s',
                // 'summary' => $request->summary,
                // 'description' => $request->description,
                // 'photo' => $image_path,
                'stock' => $request->s,
                'size' => 's',
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'status' => 'show',
                'product_id' => $masterProduk->id
                // 'category_id' => $request->category_id,
                // 'brand_id' => $request->brand_id,
            ]);
        }

        // size M
        if ($request->m != '' || $request->m != null) {
            // $image_path_m = '';
            // if ($request->hasFile('photo')) {
            //     $image_path_m = $request->file('photo')->store('products', 'public');
            // }

            $produk = Product::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title) . '-m',
                // 'summary' => $request->summary,
                // 'description' => $request->description,
                // 'photo' => $image_path_m,
                'stock' => $request->m,
                'size' => 'm',
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'status' => 'show',
                'product_id' => $masterProduk->id
                // 'category_id' => $request->category_id,
                // 'brand_id' => $request->brand_id,
            ]);
        }

        // size L
        if ($request->l != '' || $request->l != null) {
            // $image_path_l = '';
            // if ($request->hasFile('photo')) {
            //     $image_path_l = $request->file('photo')->store('products', 'public');
            // }

            $produk = Product::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title) . '-l',
                // 'summary' => $request->summary,
                // 'description' => $request->description,
                // 'photo' => $image_path_l,
                'stock' => $request->l,
                'size' => 'l',
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'status' => 'show',
                'product_id' => $masterProduk->id
                // 'category_id' => $request->category_id,
                // 'brand_id' => $request->brand_id,
            ]);
        }

        // size xl
        if ($request->xl != '' || $request->xl != null) {
            // $image_path_xl = '';
            // if ($request->hasFile('photo')) {
            //     $image_path_xl = $request->file('photo')->store('products', 'public');
            // }

            $produk = Product::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title) . '-xl',
                // 'summary' => $request->summary,
                // 'description' => $request->description,
                // 'photo' => $image_path_xl,
                'stock' => $request->xl,
                'size' => 'xl',
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'status' => 'show',
                'product_id' => $masterProduk->id
                // 'category_id' => $request->category_id,
                // 'brand_id' => $request->brand_id,
            ]);
        }

        // size xxl
        if ($request->xxl != '' || $request->xxl != null) {
            // $image_path_xxl = '';
            // if ($request->hasFile('photo')) {
            //     $image_path_xxl = $request->file('photo')->store('products', 'public');
            // }

            $produk = Product::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title) . '-xxl',
                // 'summary' => $request->summary,
                // 'description' => $request->description,
                // 'photo' => $image_path_xxl,
                'stock' => $request->xxl,
                'size' => 'xxl',
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'status' => 'show',
                'product_id' => $masterProduk->id
                // 'category_id' => $request->category_id,
                // 'brand_id' => $request->brand_id,
            ]);
        }

        // size allsize
        if ($request->allsize != '' || $request->allsize != null) {
            // $image_path_allsize = '';
            // if ($request->hasFile('photo')) {
            //     $image_path_allsize = $request->file('photo')->store('products', 'public');
            // }

            $produk = Product::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title) . '-allsize',
                // 'summary' => $request->summary,
                // 'description' => $request->description,
                // 'photo' => $image_path_allsize,
                'stock' => $request->allsize,
                'size' => 'allsize',
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'status' => 'show',
                'product_id' => $masterProduk->id
                // 'category_id' => $request->category_id,
                // 'brand_id' => $request->brand_id,
            ]);
        }

        // SizeAvailableProduct::create([
        //     'product_id' => $produk->id,
        //     's' => $request->s,
        //     'm' => $request->m,
        //     'l' => $request->l,
        //     'xl' => $request->xl,
        //     'xxl' => $request->xxl,
        //     'allsize' => $request->allsize

        // ]);

        return redirect()->route('product.create')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        // dd($products);
        $category = Category::all();
        $brand = Brand::all();
        $size = SizeAvailableProduct::where('product_id', '=', $id)->first();
        return view('admin.product.edit', compact('products', 'category', 'brand', 'size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $products = Product::findOrFail($id);

        $products->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'summary' => $request->summary,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id
        ]);

        if ($request->hasFile('photo')) {
            $image_path = $request->file('photo')->store('products', 'public');

            //delete old image
            // Storage::delete('public/'.$products->photo);

            $products->update([
                'image'     => $image_path
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        Storage::delete('public/'.$item->image);
        $item->delete();

        SizeAvailableProduct::where('product_id',$id)->delete();

        return redirect()->route('product.index')->with('success', 'Data Berhasil Dihapus!');
    }

    public function detail ($slug, $id)
    {
        $brand = Brand::all();
        $product = Product::where('id', '=', $id)->first();
        $size = SizeAvailableProduct::where('product_id', '=', $id)->first();
        $related = Product::take(4)->get();


        return view('frontend.productDetail', compact('product', 'brand', 'related', 'size'));
    }
}
