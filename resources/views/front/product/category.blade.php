@extends('front.app')

@php
    $website = \App\Models\SettingWebsite::first();
@endphp

@section('seo')
    <title>{{ $website->name }} | {{ $getCategory->name }}</title>
    <meta name="description" content="{{ strip_tags($website->about) }}">
    <meta name="keywords"
        content="smart umkm, umkm sumatera barat, umkm padang, umkm padang panjang, umkm payakumbuh, umkm pariaman, umkm sawahlunto, umkm solok, umkm kota bukittinggi, umkm kota padang, umkm kota padang panjang, umkm kota payakumbuh, umkm kota pariaman, umkm kota sawahlunto, umkm kota solok">
    <meta name="author" content="Smart UMKM">
@endsection

@section('styles')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/listing.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="top_banner">
        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
            <div class="container">
                <div class="breadcrumbs">

                </div>
                <h1>Kategori - {{ $getCategory->name }}</h1>
            </div>
        </div>
        <img src="{{ asset('front/img/bg_cat_shoes.jpg') }}" class="img-fluid" alt="">
    </div>
    <!-- /top_banner -->
    <div id="stick_here"></div>
    <div class="toolbox elemento_stick">
        <div class="container">
            <ul class="clearfix">
                <li>
                    <div class="sort_select">
                        <select name="sort" id="sort">
                            <option value="popularity" selected="selected">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to
                        </select>
                    </div>
                </li>
                <li>
                    <a href="#0"><i class="ti-view-grid"></i></a>
                    <a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
                </li>
                <li>
                    <a href="#0" class="open_filters">
                        <i class="ti-filter"></i><span>Filters</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /toolbox -->

    <div class="container margin_30">

        <div class="row">
            <aside class="col-lg-3" id="sidebar_fixed">
                <div class="filter_col">
                    <form method="get">
                        <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                        <div class="filter_type version_2">
                            <h4><a href="#filter_1" data-bs-toggle="collapse" class="opened">Penilaian</a></h4>
                            <div class="collapse show" id="filter_1">
                                <ul>
                                    <li>
                                        <label class="container_check">⭐⭐⭐⭐⭐
                                            <input type="radio" name="review_filter" value="5"
                                                @if (request('review_filter') == '5') checked @endif>
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">>= ⭐⭐⭐⭐
                                            <input type="radio" name="review_filter" value="4"
                                                @if (request('review_filter') == '4') checked @endif>
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">>= ⭐⭐⭐
                                            <input type="radio" name="review_filter" value="3"
                                                @if (request('review_filter') == '3') checked @endif>
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">>= ⭐⭐
                                            <input type="radio" name="review_filter" value="2"
                                                @if (request('review_filter') == '2') checked @endif>
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">>= ⭐
                                            <input type="radio" name="review_filter" value="1"
                                                @if (request('review_filter') == '1') checked @endif>
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <!-- /filter_type -->
                        </div>
                        <!-- /filter_type -->
                        <div class="filter_type version_2">
                            <h4><a href="#filter_2" data-bs-toggle="collapse" class="opened">Color</a></h4>
                            <div class="collapse show" id="filter_2">
                                <ul>
                                    @foreach ($city_list as $city)
                                        <li>
                                            <label class="container_check">{{ $city->name }}
                                                <input type="radio" name="city_filter" value="{{ $city->id }}"
                                                    @if (request('city_filter') == $city->id) checked @endif>
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="buttons">
                            <button type="submit" class="btn_1">Filter</button>
                            <a href="#0" class="btn_1 gray">Reset</a>
                        </div>
                    </form>
                </div>
            </aside>
            <!-- /col -->
            <div class="col-lg-9">
                <div class="row small-gutters">
                    @foreach ($products as $product)
                        <div class="col-6 col-md-4">
                            <div class="grid_item">
                                @if ($product->discount > 0)
                                    <span class="ribbon off">-{{ $product->discount }}%</span>
                                @elseif ($product->created_at->diffInDays() < 7)
                                    <span class="ribbon new">New</span>
                                @endif
                                <figure>
                                    <a href="{{ route('product', $product->slug) }}">
                                        <img class="img-fluid lazy"
                                            src="img/products/product_placeholder_square_medium.jpg"
                                            data-src="@if ($product->productImage->isNotEmpty()) {{ Storage::url('images/product/' . $product->productImage[0]->image) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $product->name }} @endif"
                                            alt="">
                                    </a>
                                    {{-- <div data-countdown="2019/05/10" class="countdown"></div> --}}
                                </figure>
                                <div class="rating">

                                    @for ($i = 0; $i < round($product->productReview->average('rating')); $i++)
                                        <i class="icon-star voted"></i>
                                    @endfor
                                    @for ($i = 0; $i < 5 - round($product->productReview->average('rating')); $i++)
                                        <i class="icon-star"></i>
                                    @endfor
                                    <br>
                                    {{ round($product->productReview->average('rating')) }} / 5
                                    ({{ $product->productReview->count() }} Penilaian)
                                </div>
                                <a href="{{ route('product', $product->slug) }}">
                                    <h3>{{ $product->name }}</h3>
                                </a>
                                <div class="price_box">
                                    @if ($product->discount > 0)
                                        <span class="new_price">@money($product->price - ($product->price * $product->discount) / 100)</span>
                                        <span class="old_price">@money($product->price) </span>
                                    @else
                                        <span class="new_price">@money($product->price)</span>
                                    @endif
                                </div>
                                <ul>
                                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip"
                                            data-bs-placement="left" title="Add to favorites"><i
                                                class="ti-heart"></i><span>Add to favorites</span></a>
                                    </li>
                                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip"
                                            data-bs-placement="left" title="Add to cart"><i
                                                class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                                </ul>
                            </div>
                            <!-- /grid_item -->
                        </div>
                        <!-- /col -->
                    @endforeach

                </div>
                <!-- /row -->
                <div class="pagination__wrapper">
                    <ul class="pagination">
                        @if ($products->onFirstPage())
                            <li class="page-item previous">
                                <a href="#" class="page-link"><i class="previous"></i></a>
                            </li>
                            <li>
                                <a href="#" class="prev" title="previous page">&#10094;</a>
                            </li>
                        @else
                            <li class="page-item previous">
                                <a href="{{ $product->previousPageUrl() }}" class="page-link bg-light"><i
                                        class="previous"></i></a>
                            </li>
                            <li>
                                <a href="#" class="prev" title="previous page">&#10094;</a>
                            </li>
                        @endif


                        @php
                            // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                            $start = max($products->currentPage() - 2, 1);
                            $end = min($start + 4, $products->lastPage());
                        @endphp

                        @if ($start > 1)
                            <!-- Menampilkan tanda elipsis jika halaman pertama tidak termasuk dalam tampilan -->
                            <li>
                                <a>...</a>
                            </li>
                        @endif

                        @foreach ($products->getUrlRange($start, $end) as $page => $url)
                            <li>
                                <a href="{{ $url }}"
                                    class="{{ $page == $products->currentPage() ? ' active' : '' }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($end < $products->lastPage())
                            <!-- Menampilkan tanda elipsis jika halaman terakhir tidak termasuk dalam tampilan -->
                            <li>
                                <a>...</a>
                            </li>
                        @endif

                        @if ($products->hasMorePages())
                            <li><a href="{{ $product->nextPageUrl() }}" class="next" title="next page">&#10095;</a>
                            </li>
                        @else
                            <li><a href="#" class="next" title="next page">&#10095;</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->

    </div>
    <!-- /container -->
@endsection

@section('script')
    <!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset('front/js/sticky_sidebar.min.js') }}"></script>
    <script src="{{ asset('front/js/specific_listing.js') }}"></script>
@endsection
