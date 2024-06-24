@extends('front.app')

@section('seo')
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
                    <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                    <div class="filter_type version_2">
                        <h4><a href="#filter_1" data-bs-toggle="collapse" class="opened">Categories</a></h4>
                        <div class="collapse show" id="filter_1">
                            <ul>
                                <li>
                                    <label class="container_check">Men <small>12</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Women <small>24</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Running <small>23</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Training <small>11</small>
                                        <input type="checkbox">
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
                                <li>
                                    <label class="container_check">Blue <small>06</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Red <small>12</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Orange <small>17</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Black <small>43</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /filter_type -->
                    <div class="filter_type version_2">
                        <h4><a href="#filter_3" data-bs-toggle="collapse" class="closed">Brands</a></h4>
                        <div class="collapse" id="filter_3">
                            <ul>
                                <li>
                                    <label class="container_check">Adidas <small>11</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Nike <small>08</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Vans <small>05</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Puma <small>18</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /filter_type -->
                    <div class="filter_type version_2">
                        <h4><a href="#filter_4" data-bs-toggle="collapse" class="closed">Price</a></h4>
                        <div class="collapse" id="filter_4">
                            <ul>
                                <li>
                                    <label class="container_check">$0 — $50<small>11</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">$50 — $100<small>08</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">$100 — $150<small>05</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">$150 — $200<small>18</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /filter_type -->
                    <div class="buttons">
                        <a href="#0" class="btn_1">Filter</a> <a href="#0" class="btn_1 gray">Reset</a>
                    </div>
                </div>
            </aside>
            <!-- /col -->
            <div class="col-lg-9">
                <div class="row small-gutters">
                    @foreach ($products as $product)
                        <div class="col-6 col-md-4">
                            <div class="grid_item">
                                @if ($product->discount > 0)
                                    <span class="ribbon off">{{ $product->discount }}</span>
                                @endif
                                <figure>
                                    <a href="{{ route('product', $product->slug) }}">
                                        <img class="img-fluid lazy"
                                            src="{{ asset('img/products/product_placeholder_square_medium.jpg') }}"
                                            data-src="@if ($product->productImage->isNotEmpty()) {{ Storage::url('images/product/' . $product->productImage[0]->image) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $product->name }} @endif"
                                            alt="">
                                    </a>
                                    {{-- <div data-countdown="2025/05/15" class="countdown"></div> --}}
                                </figure>
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
                                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip"
                                            data-bs-placement="left" title="Add to favorites"><i
                                                class="ti-heart"></i><span>Add to favorites</span></a></li>
                                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip"
                                            data-bs-placement="left" title="Add to compare"><i
                                                class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
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
