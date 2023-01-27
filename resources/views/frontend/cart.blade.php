@extends('layouts.fe')


@section('title')
    Cart
@endsection

@section('content')

<!-- Shoping Cart -->
<div class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    {{-- <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf --}}
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2"></th>
                                <th class="column-3">Price</th>
                                <th class="column-4">Quantity</th>
                                <th class="column-5">Total</th>
                                <th class="column-6">Action</th>
                            </tr>
                            <?php $total = 0; ?>
                            @foreach ($getcartdata as $item)
                            <?php
                            $valueprice = '';
                            if ($item->discount_price != '') {
                                $valueprice = $item->discount_price;
                            } else {
                                $valueprice = $item->price;
                            }

                            // total per produk
                            $subtotal_product = '';
                            $subtotal_product = $item->quantity * $valueprice;

                            // subtotal
                            $total += $subtotal_product;

                            ?>
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="{{ Storage::url('public/') . $item->photo }}" alt="IMG">
                                    </div>
                                </td>
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <td class="column-2">{{ $item->title }}</td>
                                <td class="column-3"><?= $subtotal_product ?></td>
                                <td class="column-4">
                                    <form action="{{ route('cart.update', $item->cartid) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" onkeyup="if (event.srcElement.value.charAt(0) == '0') { event.srcElement.value = event.srcElement.value.slice(1); }" type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="50">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5"><?= $subtotal_product ?></td>
                                <td class="column-6">

                                        <button class="btn btn-sm btn-primary mr-3">Update</button>
                                    </form>

                                    <form onsubmit="return confirm('Are you sure?')" action="{{ route('cart.destroy', $item->cartid) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger mr-3 mb-1">Delete</button>
                                    </form>


                                    {{-- <a href="{{ route('category.edit', $item->id) }}" class="btn btn-sm btn-primary">Update</a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            {{-- <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

                            <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                Apply coupon
                            </div> --}}
                        </div>

                        {{-- <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                            Update Cart
                        </div> --}}
                    </div>
                {{-- </form> --}}
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                <?= $total ?>
                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Shipping:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <p class="stext-111 cl6 p-t-2">
                                There are no shipping methods available. Please double check your address, or contact us if you need any help.
                            </p>

                            <div class="p-t-15">
                                <span class="stext-112 cl8">
                                    Calculate Shipping
                                </span>

                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select class="js-select2" name="time">
                                        <option>Select a country...</option>
                                        <option>USA</option>
                                        <option>UK</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
                                </div>

                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
                                </div>

                                <div class="flex-w">
                                    <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                        Update Totals
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                $79.65
                            </span>
                        </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>

</script>

@endsection
