@extends('layouts.fe')


@section('title')
    Home
@endsection

@section('content')
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                @foreach ($slider as $val)
                    <div class="item-slick1" style="background-image: url('{{ Storage::url('public/') . $val->photo }}');">
                        <div class="container h-full">
                            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                    <span class="ltext-101 cl2 respon2">
                                        {{ $val->label1 }}
                                    </span>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                    <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                        {{ $val->label2 }}
                                    </h2>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                    <a href="#"
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                        {{ $val->label3 }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Banner -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                @foreach ($brand as $item)
                    <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                        <!-- Block1 -->
                        <div class="block1 wrap-pic-w">
                            <img src="{{ Storage::url('public/') . $item->photo }}" alt="{{ $item->slug }}">

                            <a href="#"
                                class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                                <div class="block1-txt-child1 flex-col-l">
                                    <span class="block1-name ltext-102 trans-04 p-b-8">
                                        {{ $item->label1 }}
                                    </span>

                                    <span class="block1-info stext-102 trans-04">
                                        {{ $item->label2 }}
                                    </span>
                                </div>

                                <div class="block1-txt-child2 p-b-4 trans-05">
                                    <div class="block1-link stext-101 cl0 trans-09">
                                        {{ $item->label3 }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5 mb-2">
                    Product
                </h3>
            </div>

            <div class="row isotope-grid">

                @foreach ($product as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                        <!-- Block2 -->
                        <a class="block2" href="{{ url('product/' . $item->slug . '/' . $item->id) }}">
                            <div class="block2-pic hov-img0">

                                <img src="{{ Storage::url('public/') . $item->photo }}" alt="{{ $item->slug }}">

                                <a href="{{ url('product/' . $item->slug . '/' . $item->id) }}"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 detail">
                                    Detail
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

                            </div>
                        </a>
                    </div>
                @endforeach


            </div>

            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    View More
                </a>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('.detail').click(function() {
            var href = $(this).attr('href');
            window.location.href = href;
        });
    </script>
@endsection
