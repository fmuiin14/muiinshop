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
        $products = ShowDataProduct::select('p.id', 'p.title', 'p.slug', 'p.size', 'p.stock', 'show_data_products.price as pricemaster', 'p.discount_price as discount_price_product', 'show_data_products.discount_price as discount_price_master', 'show_data_products.summary', 'show_data_products.description', 'show_data_products.photo')
                        ->join('products AS p', 'p.product_id', '=', 'show_data_products.id')->get();
        // $products = Product::join('show_data_products', 'show_data_products.id', '=', 'products.product_id')->first();
        // dd($products);
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
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'price' => $request->price,
            'status' => 'show',
            'discount_price' => $request->discount_price,
        ]);

        // size S
        if ($request->s != '' || $request->s != null) {

            $produk = Product::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title) . '-s',
                'stock' => $request->s,
                'size' => 's',
                'status' => 'show',
                'product_id' => $masterProduk->id
                // 'price' => $request->price,
                // 'discount_price' => $request->discount_price,
                // 'summary' => $request->summary,
                // 'description' => $request->description,
                // 'photo' => $image_path,
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
                'stock' => $request->m,
                'size' => 'm',
                'status' => 'show',
                'product_id' => $masterProduk->id
                // 'price' => $request->price,
                // 'discount_price' => $request->discount_price,
                // 'summary' => $request->summary,
                // 'description' => $request->description,
                // 'photo' => $image_path_m,
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
                'stock' => $request->l,
                'size' => 'l',
                'status' => 'show',
                'product_id' => $masterProduk->id
                // 'price' => $request->price,
                // 'discount_price' => $request->discount_price,
                // 'summary' => $request->summary,
                // 'description' => $request->description,
                // 'photo' => $image_path_l,
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
                'stock' => $request->xl,
                'size' => 'xl',
                'status' => 'show',
                'product_id' => $masterProduk->id
                // 'price' => $request->price,
                // 'discount_price' => $request->discount_price,
                // 'summary' => $request->summary,
                // 'description' => $request->description,
                // 'photo' => $image_path_xl,
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
                'stock' => $request->xxl,
                'size' => 'xxl',
                'status' => 'show',
                'product_id' => $masterProduk->id
                // 'price' => $request->price,
                // 'discount_price' => $request->discount_price,
                // 'summary' => $request->summary,
                // 'description' => $request->description,
                // 'photo' => $image_path_xxl,
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
                'stock' => $request->allsize,
                'size' => 'allsize',
                'status' => 'show',
                'product_id' => $masterProduk->id
                // 'price' => $request->price,
                // 'discount_price' => $request->discount_price,
                // 'summary' => $request->summary,
                // 'description' => $request->description,
                // 'photo' => $image_path_allsize,
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
        // $size = SizeAvailableProduct::where('product_id', '=', $id)->first();
        return view('admin.product.edit', compact('products', 'category', 'brand'));
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
        // dd($request);
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $products = Product::findOrFail($id);

        $stock = '';

        if ($request->s != '' || $request->s != null) {
            $stock = $request->s;
        } elseif ($request->m != '' || $request->m != null) {
            $stock = $request->m;
        } elseif ($request->l != '' || $request->l != null) {
            $stock = $request->l;
        } elseif ($request->xl != '' || $request->xl != null) {
            $stock = $request->xl;
        } elseif ($request->xxl != '' || $request->xxl != null) {
            $stock = $request->xxl;
        } elseif ($request->allsize != '' || $request->allsize != null) {
            $stock = $request->allsize;
        }


        $products->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            // 'summary' => $request->summary,
            // 'description' => $request->description,
            'stock' => $stock,
            // 'price' => $request->price,
            'discount_price' => $request->discount_price,
            // 'category_id' => $request->category_id,
            // 'brand_id' => $request->brand_id
        ]);

        if ($request->hasFile('photo')) {
            $image_path = $request->file('photo')->store('products', 'public');

            //delete old image
            // Storage::delete('public/'.$products->photo);

            $products->update([
                'image'     => $image_path
            ]);
        }

        return redirect()->route('product.index')->with('success', 'Data Berhasil Diupdate!');
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
        // Storage::delete('public/'.$item->image);
        $item->delete();

        // SizeAvailableProduct::where('product_id',$id)->delete();

        return redirect()->route('product.index')->with('success', 'Data Berhasil Dihapus!');
    }

    public function detail ($slug, $id)
    {
        $brand = Brand::all();
        $product = ShowDataProduct::where('id', '=', $id)->first();
        $related = ShowDataProduct::take(4)->where('id', '!=', $id)->get();

        $selectedProduct = Product::select('size', 'slug', 'id')->where('product_id', '=', $id)->get();

        return view('frontend.productDetail', compact('product', 'brand', 'related', 'selectedProduct'));
    }

    public function satuanDetail($slug, $size, $id) {
        $product = Product::select('products.product_id', 'products.title','products.id AS product_id_satuan', 'products.slug', 'products.stock', 'products.size', 'products.discount_price AS harga_produk_satuan_diskon', 'sdp.summary', 'sdp.description', 'sdp.photo', 'sdp.price AS price_master', 'sdp.discount_price AS harga_produk_diskon_master', 'sdp.id AS id_master')
                    ->join('show_data_products AS sdp', 'sdp.id', '=', 'products.product_id')
                    ->where('products.id', '=', $id)->first();
                    // dd($product);
        $brand = Brand::all();
        $related = ShowDataProduct::take(4)->where('id', '!=', $product->id_master)->get();
        // dd($related);

        $selectedProduct = Product::select('size', 'slug', 'id')->where('product_id', '=', $product->product_id)->get();

        return view('frontend.productSatuanDetail', compact('product', 'brand', 'related', 'selectedProduct'));
    }
}
