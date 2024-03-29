@extends('layouts.fe')


@section('title')
    Product Detail
@endsection

@section('content')
    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" data-thumb="{{ Storage::url('public/') . $product->photo }}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{ Storage::url('public/') . $product->photo }}" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="{{ Storage::url('public/') . $product->photo }}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>

                                {{-- gallery photo start --}}
                                <div class="item-slick3" data-thumb="{{ Storage::url('public/') . $product->photo }}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{ Storage::url('public/') . $product->photo }}" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="{{ Storage::url('public/') . $product->photo }}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="item-slick3" data-thumb="{{ Storage::url('public/') . $product->photo }}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{ Storage::url('public/') . $product->photo }}" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="{{ Storage::url('public/') . $product->photo }}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="item-slick3" data-thumb="{{ Storage::url('public/') . $product->photo }}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{ Storage::url('public/') . $product->photo }}" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="{{ Storage::url('public/') . $product->photo }}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                {{-- gallery photo end --}}

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $product->title }}
                        </h4>

                        <span class="mtext-106 cl2">
                            <?php
                                if ($product->harga_produk_satuan_diskon != '' || $product->harga_produk_satuan_diskon != null) {
                                    echo $product->harga_produk_satuan_diskon;
                                } elseif ($product->harga_produk_diskon_master != '' || $product->harga_produk_diskon_master != null) {
                                    echo $product->harga_produk_diskon_master;
                                } else {
                                    echo $product->price_master;
                                }
                            ?>
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            {{ $product->summary }}
                        </p>

                        <form onsubmit="return showNotif()" action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <input type="hidden" value="{{ $product->slug }}" name="slug">
                                <input type="hidden" value="{{ $product->product_id_satuan }}" name="product_id_satuan">
                                <input type="hidden" value="<?php
                                if ($product->harga_produk_satuan_diskon != '' || $product->harga_produk_satuan_diskon != null) {
                                    echo $product->harga_produk_satuan_diskon;
                                } elseif ($product->harga_produk_diskon_master != '' || $product->harga_produk_diskon_master != null) {
                                    echo $product->harga_produk_diskon_master;
                                } else {
                                    echo $product->price_master;
                                }
                            ?>" name="price">

                                <div class="size-203 flex-c-m respon6">
                                    Ukuran
                                </div>

                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bg0">
                                        <div class="flex-w size-217">

                                            @foreach ($selectedProduct as $item)
                                            <a href="{{ url('product/' . $item->slug . '/' . $item->size) . '/' . $item->id }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5 <?php if ($product->size == $item->size) { echo 'active-product';} ?>">
                                                {{ $item->size }}
                                            </a>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                            name="quantity" id="totaljumlah" onkeyup="if (event.srcElement.value.charAt(0) == '0') { event.srcElement.value = event.srcElement.value.slice(1); }" min="1" max="50" value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>

                                    <button
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" title="Add to cart">
                                        Add to cart
                                    </button>
                                    {{-- <a class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" title="Add to cart" href="{{route('add-to-cart',$product->slug)}}">Add to cart</a> --}}
                                </div>
                            </div>
                        </div>
                        </form>

                        <!--  -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                <a href="#"
                                    class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                    data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </div>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Google Plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                        </li>


                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <div class="stext-102 cl6">
                                    {{ $product->description }}
                                </div>
                            </div>
                        </div>

                        <!-- - -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <div class="p-b-30 m-lr-15-sm">
                                        <!-- Review -->
                                        <div class="flex-w flex-t p-b-68">
                                            <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                <img src="{{ asset('fe/images/avatar-01.jpg') }}" alt="AVATAR">
                                            </div>

                                            <div class="size-207">
                                                <div class="flex-w flex-sb-m p-b-17">
                                                    <span class="mtext-107 cl2 p-r-20">
                                                        Ariana Grande
                                                    </span>

                                                    <span class="fs-18 cl11">
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star-half"></i>
                                                    </span>
                                                </div>

                                                <p class="stext-102 cl6">
                                                    Quod autem in homine praestantissimum atque optimum est, id deseruit.
                                                    Apud ceteros autem philosophos
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Add review -->
                                        <form class="w-full">
                                            <h5 class="mtext-108 cl2 p-b-7">
                                                Add a review
                                            </h5>

                                            <p class="stext-102 cl6">
                                                Your email address will not be published. Required fields are marked *
                                            </p>

                                            <div class="flex-w flex-m p-t-50 p-b-23">
                                                <span class="stext-102 cl3 m-r-16">
                                                    Your Rating
                                                </span>

                                                <span class="wrap-rating fs-18 cl11 pointer">
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <input class="dis-none" type="number" name="rating">
                                                </span>
                                            </div>

                                            <div class="row p-b-25">
                                                <div class="col-12 p-b-5">
                                                    <label class="stext-102 cl3" for="review">Your review</label>
                                                    <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                                </div>

                                                <div class="col-sm-6 p-b-5">
                                                    <label class="stext-102 cl3" for="name">Name</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name"
                                                        type="text" name="name">
                                                </div>

                                                <div class="col-sm-6 p-b-5">
                                                    <label class="stext-102 cl3" for="email">Email</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email"
                                                        type="text" name="email">
                                                </div>
                                            </div>

                                            <button
                                                class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- Related Products -->
    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Related Products
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    @foreach ($related as $item)
                        <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                            <!-- Block2 -->
                            <a href="{{ url('product/' . $item->slug . '/' . $item->id) }}" class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="{{ Storage::url('public/') . $item->photo }}" alt="IMG-PRODUCT">

                                    <a href="{{ url('product/' . $item->slug . '/' . $item->id) }}"
                                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="{{ url('product/' . $item->slug . '/' . $item->id) }}"
                                            class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{ $item->title }}
                                        </a>

                                        <span class="stext-105 cl3">
                                            {{ $item->price }}
                                        </span>
                                    </div>

                                    <div class="block2-txt-child2 flex-r p-t-3">
                                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                            <img class="icon-heart1 dis-block trans-04"
                                                src="{{ asset('fe/images/icons/icon-heart-01.png') }}" alt="ICON">
                                            <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                src="{{ asset('fe/images/icons/icon-heart-02.png') }}" alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection


@section('js')
    <script>
        $(".num-product").keyup(function() {
        var jumlah = $(this).val();
        if (jumlah == '' || jumlah == 0) {
            document.getElementById('totaljumlah').value = '';
            return false;
        }
        if (jumlah < 1) {
            alert("Jumlah produk tidak boleh kurang dari 1")
            document.getElementById('totaljumlah').value = 1;
        } else if (jumlah > 50) {
            alert("Jumlah produk tidak boleh lebih dari 50")
            document.getElementById('totaljumlah').value = 50;
        }
    });

    var AuthUser = "{{{ (Auth::user()) ? Auth::user() : null }}}";
    var namaProduk = "{{{ $product->title }}}";
    var redirectLogin = "{{{ route('login') }}}";

    function showNotif() {
        if (AuthUser == null || AuthUser == '') {
            alert('Anda harus login/ register terlebih dahulu.');
            window.location = redirectLogin;
            return false;
        } else {
            swal(namaProduk, "is added to cart !", "success");
            return true;
        }
    }
    </script>
@endsection
