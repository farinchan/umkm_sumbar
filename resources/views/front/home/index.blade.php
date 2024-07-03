@extends('front.app')

@section('seo')
@endsection

@section('styles')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/home_1.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="carousel-home">
        <div class="owl-carousel owl-theme">
            @if ($banner1->status == 1)
            <div class="owl-slide cover" style="background-image: url('{{ Storage::url("images/banner/". $banner1->image) }}');">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-end">
                            <div class="col-lg-6 static">
                                <div class="slide-text text-end white">
                                    <h2 class="owl-slide-animated owl-slide-title">{{ $banner1->title }}</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        {{ $banner1->subtitle }}
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                            href="{{ $banner1->url }}" role="button">Kunjungi</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!--/owl-slide-->
            @if ($banner2->status == 1)
            <div class="owl-slide cover" style="background-image: url('{{ Storage::url("images/banner/". $banner2->image) }}');">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-6 static">
                                <div class="slide-text white">
                                    <h2 class="owl-slide-animated owl-slide-title">{{ $banner2->title }}</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        {{ $banner2->subtitle }}
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                            href="{{ $banner2->url }}" role="button">Kunjungi</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!--/owl-slide-->
            @if ($banner3->status == 1)

            <div class="owl-slide cover" style="background-image: url('{{ Storage::url("images/banner/". $banner3->image) }}');">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-12 static">
                                <div class="slide-text text-center black">
                                    <h2 class="owl-slide-animated owl-slide-title">{{ $banner3->title }}</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        {{ $banner3->subtitle }}
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                            href="{{ $banner3->url }}" role="button">Kunjungi</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/owl-slide-->
            </div>
            @endif
        </div>
        <div id="icon_drag_mobile"></div>
    </div>
    <!--/carousel-->


    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Direkomendasikan untuk anda</h2>
            <span>Products</span>
            <p>Kami Persembahkan Produk UMKM Sumatera Barat Yang Kami Rekomendasikan Untuk Anda</p>
        </div>
        <div class="row small-gutters">
            <div class="col-6 col-md-4 col-xl-3">
                <div class="grid_item">
                    <figure>
                        <span class="ribbon off">-30%</span>
                        <a href="product-detail-1.html">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/1.jpg') }}" alt="">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/1_b.jpg') }}" alt="">
                        </a>
                        <div data-countdown="2019/05/15" class="countdown"></div>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="product-detail-1.html">
                        <h3>Armor Air x Fear</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">$48.00</span>
                        <span class="old_price">$60.00</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a>
                        </li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            <!-- /col -->
            <div class="col-6 col-md-4 col-xl-3">
                <div class="grid_item">
                    <span class="ribbon off">-30%</span>
                    <figure>
                        <a href="product-detail-1.html">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/2.jpg') }}" alt="">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/2_b.jpg') }}" alt="">
                        </a>
                        <div data-countdown="2019/05/10" class="countdown"></div>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="product-detail-1.html">
                        <h3>Armor Okwahn II</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">$90.00</span>
                        <span class="old_price">$170.00</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a>
                        </li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            <!-- /col -->
            <div class="col-6 col-md-4 col-xl-3">
                <div class="grid_item">
                    <span class="ribbon off">-50%</span>
                    <figure>
                        <a href="product-detail-1.html">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/3.jpg') }}" alt="">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/3_b.jpg') }}" alt="">
                        </a>
                        <div data-countdown="2019/05/21" class="countdown"></div>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="product-detail-1.html">
                        <h3>Armor Air Wildwood ACG</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">$75.00</span>
                        <span class="old_price">$155.00</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a>
                        </li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            <!-- /col -->
            <div class="col-6 col-md-4 col-xl-3">
                <div class="grid_item">
                    <span class="ribbon new">New</span>
                    <figure>
                        <a href="product-detail-1.html">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/4.jpg') }}" alt="">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/4_b.jpg') }}" alt="">
                        </a>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="product-detail-1.html">
                        <h3>Armor ACG React Terra</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">$110.00</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a>
                        </li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            <!-- /col -->
            <div class="col-6 col-md-4 col-xl-3">
                <div class="grid_item">
                    <span class="ribbon new">New</span>
                    <figure>
                        <a href="product-detail-1.html">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/5.jpg') }}" alt="">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/5_b.jpg') }}" alt="">
                        </a>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="product-detail-1.html">
                        <h3>Armor Air Zoom Alpha</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">$140.00</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a>
                        </li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            <!-- /col -->
            <div class="col-6 col-md-4 col-xl-3">
                <div class="grid_item">
                    <span class="ribbon new">New</span>
                    <figure>
                        <a href="product-detail-1.html">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/6.jpg') }}" alt="">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/6_b.jpg') }}" alt="">
                        </a>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="product-detail-1.html">
                        <h3>Armor Air Alpha</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">$130.00</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a>
                        </li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            <!-- /col -->
            <div class="col-6 col-md-4 col-xl-3">
                <div class="grid_item">
                    <span class="ribbon hot">Hot</span>
                    <figure>
                        <a href="product-detail-1.html">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/7.jpg') }}" alt="">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/7_b.jpg') }}" alt="">
                        </a>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="product-detail-1.html">
                        <h3>Armor Air Max 98</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">$115.00</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a>
                        </li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            <!-- /col -->
            <div class="col-6 col-md-4 col-xl-3">
                <div class="grid_item">
                    <span class="ribbon hot">Hot</span>
                    <figure>
                        <a href="product-detail-1.html">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/8.jpg') }}" alt="">
                            <img class="img-fluid lazy"
                                src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                data-src="{{ asset('front/img/products/shoes/8_b.jpg') }}" alt="">
                        </a>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="product-detail-1.html">
                        <h3>Armor Air Max 720</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">$120.00</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a>
                        </li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <div class="featured lazy" data-bg="url(img/featured_home.jpg)">
        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
            <div class="container margin_60">
                <div class="row justify-content-center justify-content-md-start">
                    <div class="col-lg-6 wow" data-wow-offset="150">
                        <h3>Armor<br>Air Color 720</h3>
                        <p>Lightweight cushioning and durable support with a Phylon midsole</p>
                        <div class="feat_text_block">
                            <div class="price_box">
                                <span class="new_price">$90.00</span>
                                <span class="old_price">$170.00</span>
                            </div>
                            <a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /featured -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Produk Terbaru</h2>
            <span>Products</span>
            <p>Memperkenalkan Produk Terbaru dari UMKM Sumatera Barat</p>
        </div>
        <div class="owl-carousel owl-theme products_carousel">

            @foreach ($latest_products as $product)
                <div class="item">
                    <div class="grid_item">
                        <span class="ribbon new">New</span>
                        <figure>
                            <a href="{{ route('product', $product->slug) }}">
                                <img class="owl-lazy"
                                    src="@if ($product->productImage->isNotEmpty()) {{ Storage::url('images/product/' . $product->productImage[0]->image) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $product->name }} @endif"
                                    data-src="@if ($product->productImage->isNotEmpty()) {{ Storage::url('images/product/' . $product->productImage[0]->image) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $product->name }} @endif"
                                    alt="">
                            </a>
                        </figure>
                        <div class="rating">

                            @for ($i = 0; $i < round($product->productReview->average('rating')); $i++)
                                <i class="icon-star voted"></i>
                            @endfor
                            @for ($i = 0; $i < 5 - round($product->productReview->average('rating')); $i++)
                                <i class="icon-star"></i>
                            @endfor
                        </div>
                        <a href="{{ route('product', $product->slug) }}">
                            <h3>{{ $product->name }}</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">@money($product->price - ($product->price * $product->discount) / 100)</span>
                            @if ($product->discount > 0)
                                <span class="old_price">@money($product->price)</span>
                            @endif
                        </div>
                        <ul>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a>
                            </li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        </ul>
                    </div>
                    <!-- /grid_item -->
                </div>
            @endforeach
        </div>
        <!-- /products_carousel -->
    </div>
    <!-- /container -->

    <div class="bg_gray">
        <div class="container margin_30">
            <div id="brands" class="owl-carousel owl-theme">
                <div class="item mx-3">
                    <a href="#0"><img src="{{ asset('front/img/brands/placeholder_brands.png') }}"
                            data-src="{{ asset('logo/logo-kota-bukittinggi.png') }}" alt=""
                            class="owl-lazy"></a>
                </div><!-- /item -->
                <div class="item mx-3">
                    <a href="#0"><img src="{{ asset('front/img/brands/placeholder_brands.png') }}"
                            data-src="{{ asset('logo/logo-kota-padang.webp') }}" alt="" class="owl-lazy"></a>
                </div><!-- /item -->
                <div class="item mx-3">
                    <a href="#0"><img src="{{ asset('front/img/brands/placeholder_brands.png') }}"
                            data-src="{{ asset('logo/logo-kota-pariaman.webp') }}" alt="" class="owl-lazy"></a>
                </div><!-- /item -->
                <div class="item mx-3">
                    <a href="#0"><img src="{{ asset('front/img/brands/placeholder_brands.png') }}"
                            data-src="{{ asset('logo/logo-kota-payakumbuh.webp') }}" alt=""
                            class="owl-lazy"></a>
                </div><!-- /item -->
                <div class="item mx-3">
                    <a href="#0"><img src="{{ asset('front/img/brands/placeholder_brands.png') }}"
                            data-src="{{ asset('logo/logo-kota-sawahlunto.webp') }}" alt=""
                            class="owl-lazy"></a>
                </div><!-- /item -->
                <div class="item mx-3">
                    <a href="#0"><img src="{{ asset('front/img/brands/placeholder_brands.png') }}"
                            data-src="{{ asset('logo/logo-kota-solok.webp') }}" alt="" class="owl-lazy"></a>
                </div><!-- /item -->
                <div class="item mx-3">
                    <a href="#0"><img src="{{ asset('front/img/brands/placeholder_brands.png') }}"
                            data-src="{{ asset('logo/logo-koto-padangpanjang.webp') }}" alt=""
                            class="owl-lazy"></a>
                </div><!-- /item -->
            </div><!-- /carousel -->
        </div><!-- /container -->
    </div>
    <!-- /bg_gray -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Berita Terbaru</h2>
            <span>Blog</span>
            <p>Berita dan Blog Mengenai UMKM Sumatera barat</p>
        </div>
        <div class="row">
            @foreach ($latest_news as $news)
                <div class="col-lg-6">
                    <a class="box_news" href="{{ route("news-show", $news->slug) }}">
                        <figure>
                            <img src="{{ asset('front/img/blog-thumb-placeholder.jpg') }}"
                                data-src="{{ Storage::url("images/news/". $news->image); }}" alt="" width="400"
                                height="266" class="lazy">
                            <figcaption><strong>{{ $news->created_at->format('d') }}</strong>{{ $news->created_at->format('M') }}</figcaption>
                        </figure>
                        <ul>
                            <li>by {{ $news->user->name }}</li>
                            <li>{{ $news->created_at->diffForHumans() }}</li>
                        </ul>
                        <h4>{{ Str::limit($news->title, 40, '...') }}</h4>
                        <p>{{ Str::limit(strip_tags($news->content), 150, '...') }}</p>
                    </a>
                </div>
            @endforeach
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
@endsection


@section('scripts')
    <!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset('front/js/carousel-home.min.js') }}"></script>
@endsection
