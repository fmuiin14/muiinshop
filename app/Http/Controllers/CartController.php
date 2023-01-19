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
        $cartproducts = Cart::join('order_log', 'order_log.order_id', '=', 'carts.order_id')
                        ->join('orders', 'orders.id', '=', 'carts.order_id')
                        ->where('order_log.status', '=', 'open')
                        ->where('order_log.user_id', '=', $user->id)
                        ->get()->toArray();;
        var_dump($cartproducts); die;
        // var_dump(json_decode($cartproducts)); die;
        // $datas = json_decode(json_encode($cartproducts), true);
        // var_dump(json_decode($datas)); die;

        // foreach ($cartproducts as $val) {
        //     var_dump($val);
        //     die;
        //     }

        return view('frontend.cart', compact('brand'));
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
        $user = Auth::user();

        if (empty($request->slug)) {
            request()->session()->flash('error','Invalid Products');
            return back();
        }
        $product = Product::where('slug', $request->slug)->first();
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
                'status' => 'open',
                'user_id' => $user->id
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
            $orderExist = Order::join('order_log', 'order_log.order_id', '=', 'orders.id')
                            ->where('order_log.status', '=', 'open')->orderBy('orders.created_at','DESC')->first();
            // dd($orderExist);

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
