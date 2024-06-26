@extends('front.app')

@section('seo')
@endsection

@section('styles')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/product_page.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
@endsection

@section('content')
    <div class="bg_white">
        <div class="container margin_60_35">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="prod_info version_2">
                        <img src="{{ Storage::url('images/shop/' . $shop->logo) }}" width="200px" class="img-thumbnail mb-3"
                            alt="...">
                        <h2>{{ $shop->name }}</h2>
                        <p>{{ $shop->description }}</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="prod_options version_2">
                        <div class="row">
                            <label class="col-xl-7 col-lg-5  col-md-6 col-6 pt-0"><strong>Nama Toko</strong></label>
                            <div class="col-xl-5 col-lg-5 col-md-6 col-6 ">
                                <label class="select-label">{{ $shop->name }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-xl-7 col-lg-5  col-md-6 col-6 pt-0"><strong>Status</strong></label>
                            <div class="col-xl-5 col-lg-5 col-md-6 col-6 ">
                                @if ($shop->verified == 1)
                                    <span data-bs-toggle="tooltip" data-bs-placement="right"
                                        data-bs-title="UMKM ini sudah diverfikasi oleh badan"
                                        class="badge rounded-pill bg-success p-2 ">
                                        <i class="ti-check me-2"></i>
                                        Diverifikasi
                                    </span>
                                @else
                                    <span data-bs-toggle="tooltip" data-bs-placement="right"
                                        data-bs-title="UMKM ini belum diverfikasi oleh badan"
                                        class="badge rounded-pill bg-warning p-2 ">
                                        <i class="ti-close me-2"></i>
                                        Belum Diverifikasi
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-xl-7 col-lg-5  col-md-6 col-6 pt-0"><strong>Kabupaten/Kota</strong></label>
                            <div class="col-xl-5 col-lg-5 col-md-6 col-6 ">
                                <label class="select-label">{{ $shop->city->name }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-xl-7 col-lg-5  col-md-6 col-6 pt-0"><strong>Alamat</strong></label>
                            <div class="col-xl-5 col-lg-5 col-md-6 col-6 ">
                                <label class="select-label">{{ $shop->address }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-xl-7 col-lg-5  col-md-6 col-6 pt-0"><strong>Kontak</strong></label>

                            <div class="col-xl-5 col-lg-5 col-md-6 col-6 ">
                                <div class="row">
                                    <label class="select-label">{{ $shop->phone }}</label>
                                </div>
                                <div class="row">
                                    <label class="select-label">{{ $shop->email }}</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-xl-7 col-lg-5  col-md-6 col-6 pt-0"><strong>Social Media</strong></label>

                            <div class="col-xl-5 col-lg-5 col-md-6 col-6 ">

                                <div class="follow_us">
                                    <ul>
                                        <li><a href="{{ $shop->twitter }}"><img
                                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                    data-src="{{ asset('front/img/twitter_icon.svg') }}" alt=""
                                                    class="lazy"></a>
                                        </li>
                                        <li><a href="{{ $shop->facebook }}"><img
                                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                    data-src="{{ asset('front/img/facebook_icon.svg') }}" alt=""
                                                    class="lazy"></a>
                                        </li>
                                        <li><a href="{{ $shop->instagram }}"><img
                                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                    data-src="{{ asset('front/img/instagram_icon.svg') }}" alt=""
                                                    class="lazy"></a>
                                        </li>
                                        <li><a href="{{ $shop->youtube }}"><img
                                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                    data-src="{{ asset('front/img/youtube_icon.svg') }}" alt=""
                                                    class="lazy"></a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li><a href="{{ $shop->linkedin }}"><img
                                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                    data-src="{{ asset('front/img/linkedin_icon.svg') }}" alt=""
                                                    class="lazy"></a>
                                        </li>
                                        <li><a href="{{ $shop->telegram }}"><img
                                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                    data-src="{{ asset('front/img/telegram_icon.svg') }}" alt=""
                                                    class="lazy"></a>
                                        </li>
                                        <li><a href="https://wa.me/{{ $shop->phone }}?text=Halo {{ $shop->name }}"><img
                                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                    data-src="{{ asset('front/img/whatsapp_icon.svg') }}" alt=""
                                                    class="lazy"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12 text-center">
                                <a href="https://wa.me/{{ $shop->phone }}?text=Halo toko {{ $shop->name }}"
                                    class="btn btn-success">Hubungi Via whatsapp</a>
                                <a href="mailto:{{ $shop->email }}?subject=Halo toko {{ $shop->name }}"
                                    class="btn btn-outline-secondary"><i class="ti-email"></i></a>
                                <a href="tel:{{ $shop->phone }}" class="btn btn-outline-secondary"><i
                                        class="ti-headphone-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /bg_white -->

    <div class="tabs_product bg_white version_2">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab"
                        role="tab">Lokasi</a>
                </li>
                <li class="nav-item">
                    <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Reviews</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /tabs_product -->

    <div class="tab_content_wrapper">
        <div class="container">
            <div class="tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header" role="tab" id="heading-A">
                        <h5 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false"
                                aria-controls="collapse-A">
                                Lokasi
                            </a>
                        </h5>
                    </div>

                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-12">
                                    <div id="map" style=" height: 400px;"></div>
                                    <input id="latitude" type="hidden" value="{{ $shop->latitude }}">
                                    <input id="longitude" type="hidden" value="{{ $shop->longitude }}">
                                    <input id="name" type="hidden" value="{{ $shop->name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /TAB A -->
                <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                    <div class="card-header" role="tab" id="heading-B">
                        <h5 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false"
                                aria-controls="collapse-B">
                                Penialaian
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                @foreach ($reviews as $review)
                                    <div class="col-lg-5">
                                        <div class="review_content">
                                            <div class="clearfix add_bottom_10">
                                                <span class="rating">
                                                    <i class="icon-star"></i>
                                                    <em>{{ $review->rating }} / 5</em>
                                                </span>
                                                <em>{{ $review->created_at->diffForHumans() }}</em>
                                            </div>
                                            <h4>{{ $review->user->name }}</h4>
                                            <small><a href="{{ route("product", $review->product->slug) }}">{{ $review->product->name }}</a> </small>
                                            <p>{{ $review->review }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /card-body -->
                    </div>

                </div>
                <!-- /tab B -->
            </div>
            <!-- /tab-content -->
        </div>
        <!-- /container -->
    </div>
    <!-- /tab_content_wrapper -->

    <div class="bg_white">
        <div class="container margin_60_35">
            <div class="main_title">
                <h2>Produk</h2>
                <span>Products</span>
                <p>Produk yang dijual oleh UMKM {{ $shop->name }}</p>
            </div>
            <div class="row small-gutters">

                @foreach ($products as $product)
                    
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="grid_item">
                        @if ($product->discount > 0)
                            <span class="ribbon off">-{{ $product->discount }}%</span>
                        @elseif ($product->created_at->diffInDays() < 10)
                            <span class="ribbon new">New</span>
                        @endif
                        <figure>
                            <a href="product-detail-1.html">
                                <img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg"
                                    data-src="@if ($product->productImage->isNotEmpty()) {{ Storage::url('images/product/' . $product->productImage[0]->image) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $product->name }} @endif" alt="">
                            </a>
                            {{-- <div data-countdown="2019/05/10" class="countdown"></div> --}}
                        </figure>
                        <a href="product-detail-1.html">
                            <h3>{{ $product->name }}</h3>
                        </a>
                        <div class="price_box">
                            @if ($product->discount > 0)
                                <span class="new_price">${{ $product->price - ($product->price * $product->discount / 100) }}</span>
                                <span class="old_price">${{ $product->price }}</span>
                            @else 
                                <span class="new_price">${{ $product->price }}</span>
                            @endif
                        </div>
                        <ul>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>                       
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        </ul>
                    </div>
                    <!-- /grid_item -->
                </div>
                <!-- /col -->
                @endforeach
              
            </div>
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
        <!-- /container -->
    </div>
    <!-- /bg_white -->
@endsection

@section('scripts')
    <script>
        var longitude = document.getElementById('longitude').value;
        var latitude = document.getElementById('latitude').value;
        var name = document.getElementById('name').value;

        // Inisialisasi peta
        var map = L.map('map').setView([latitude, longitude], 13); // Contoh: Koordinat Jakarta, Indonesia

        // Tambahkan tile layer dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; 2024 Smart UMKM Sumatera barat - map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        

        // Tambahkan marker
        L.marker([latitude, longitude]).addTo(map)
            .bindPopup(name)
            .openPopup();
    </script>
@endsection
