<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderLog;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $brand = Brand::all();
        $getorder = Order::where('status', '=', 'open')->orderBy('created_at','DESC')->first();
        $getcartdata = Cart::select('sdp.photo', 'p.title', 'p.discount_price', 'sdp.price', 'carts.quantity')
                        ->join('products AS p', 'p.id', '=', 'carts.product_id')
                        ->join('show_data_products AS sdp', 'sdp.id', '=', 'p.product_id')
                        ->where('carts.order_id', '=', $getorder->id)->get();
        // foreach ($getcartdata as $key) {
        // // var_dump($key->price);
        // // $datacart = Cart::
        // }
        // dd($getcartdata);


        return view('frontend.cart', compact('brand', 'getcartdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user = Auth::user();

        if (empty($request->slug)) {
            request()->session()->flash('error','Invalid Products');
            return back();
        }
        $product = Product::where('id', $request->product_id_satuan)->first();
        // dd($product);
        // return $product;
        if (empty($product)) {
            request()->session()->flash('error','Invalid Products');
            return back();
        }

        $latestOrderLog = OrderLog::join('orders', 'orders.id', '=', 'order_log.order_id')
                            ->where('order_log.status', '=', 'open')->orderBy('order_log.created_at','DESC')->first();

        if ($latestOrderLog == null || $latestOrderLog == '') {

            $latestOrder = Order::where('status', '=', 'open')
            ->orderBy('created_at','DESC')->first();
                if ($latestOrder == null || $latestOrder == '') {
                $latestOrder = 0;
                $order_nr = 'ORD'.str_pad($latestOrder + 1, 8, "0", STR_PAD_LEFT);
                } else {
                $order_nr = 'ORD'.str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT);
                }

                $order = Order::create([
                'order_number' => $order_nr,
                'user_id' => $user->id,
                'status' => 'open'
                ]);

                $order_log = OrderLog::create([
                'order_id' => $order->id,
                'status' => 'open',
                'user_id' => $user->id
                ]);

                $cart = Cart::create([
                    'product_id' => $product->id,
                    'order_id' => $order->id,
                    'user_id' => $user->id,
                    'price' => $request->price,
                    'quantity' => $request->quantity
                ]);

                request()->session()->flash('success','Product successfully added to cart');
                return back();

        } else {
            // dd('kalo isi');
            // dd($request);
            $orderExist = Order::join('order_log', 'order_log.order_id', '=', 'orders.id')
                            ->where('order_log.status', '=', 'open')->orderBy('orders.created_at','DESC')->first();
            // dd($orderExist);

            $check_cart = Cart::where('product_id', '=', $request->product_id_satuan)
                            ->where('order_id', '=', $orderExist->id)->first();

            // dd($check_cart);

            if ($check_cart != '' || $check_cart != null) {
                $check_cart->update([
                    'product_id' => $product->id,
                    'order_id' => $orderExist->id,
                    'user_id' => $user->id,
                    'price' => $request->price,
                    'quantity' => $check_cart->quantity + $request->quantity
                ]);
            } else {
                $cartExist = Cart::create([
                    'product_id' => $product->id,
                    'order_id' => $orderExist->id,
                    'user_id' => $user->id,
                    'price' => $request->price,
                    'quantity' => $request->quantity
                ]);

                request()->session()->flash('success','Product successfully added to cart');
                return back();
            }
            request()->session()->flash('success','Product successfully added to cart');
            return back();



        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
