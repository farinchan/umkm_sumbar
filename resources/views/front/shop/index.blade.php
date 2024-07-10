@extends('front.app')

@section('seo')
@endsection

@section('styles')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/listing.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container margin_30">
        <div class="row mt-5">

            <aside class="col-lg-3" id="sidebar_fixed">
                <div class="filter_col">
                    <form action="{{ route('shop') }}" method="GET">

                        <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                        <div class="filter_type version_2">
                            <h4><a href="#filter_1" data-bs-toggle="collapse" class="opened">Kabupaten/Kota</a></h4>
                            <div class="collapse show" id="filter_1">
                                <ul>
                                    @foreach ($list_city as $city)
                                        <li>
                                            <label class="container_check">{{ $city->name }}
                                                <small>{{ $city->count }}</small>
                                                <input type="radio" name="city"
                                                    @if ($city->slug == request()->city) checked @endif
                                                    value="{{ $city->slug }}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /filter_type -->
                        </div>
                        <!-- /filter_type -->
                        <div class="buttons">
                            <button type="submit" class="btn_1">Filter</button>
                            <a href="#0" class="btn_1 gray">Reset</a>
                        </div>
                    </form>
                </div>
            </aside>
            <!-- /col -->
            <div class="col-lg-9">

                <div class="row">
    
                    @foreach ($shop as $item)
                        <div class="col-lg-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6">
                                            <figure>
                                                <a href="product-detail-1.html">
                                                    <img class="img-fluid lazy"
                                                        src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                                        data-src="{{ Storage::url('images/shop/' . $item->logo) }}" alt="">
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="col-sm-3"></div>
        
                                    </div>
                                    <div class="row row_item">
                                        <div class="col-sm-12 text-center">
                                            @if ($item->verified == 1)
                                                <span data-bs-toggle="tooltip" data-bs-placement="right"
                                                    data-bs-title="UMKM ini sudah diverfikasi oleh badan"
                                                    class="badge rounded-pill bg-success p-2 m-3">
                                                    <i class="ti-check me-2"></i>
                                                    diverifikasi
                                                </span>
                                            @else
                                                <span data-bs-toggle="tooltip" data-bs-placement="right"
                                                    data-bs-title="UMKM ini belum diverfikasi oleh badan"
                                                    class="badge rounded-pill bg-warning p-2 m-3">
                                                    <i class="ti-close me-2"></i>
                                                    belum diverifikasi
                                                </span>
                                            @endif
                                            <a href="product-detail-1.html">
                                                <h3>{{ $item->name }}</h3>
                                            </a>
                                            <p>{{ Str::limit($item->description, 100, '...') }}</p>
                                            <div>
                                                <i class="ti-location-pin"></i>
                                                {{ $item->city->name }}
                                            </div>
                                            <div>
                                                <i class="ti-location-arrow"></i>
                                                {{ $item->address }}
                                            </div>
                                            <div>
                                                <i class="ti-email"></i>
                                                {{ $item->email }}
                                            </div>
                                            <div>
                                                <i class="ti-headphone-alt"></i>
                                                {{ $item->phone }}
                                            </div>
                                            <ul>
                                                <li><a href="{{ route('shop-detail', $item->slug) }}" class="btn_1">Kunjungi</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    @endforeach
                    <!-- /col -->
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
@endsection

@section('script')
    <!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset('front/js/sticky_sidebar.min.js') }}"></script>
    <script src="{{ asset('front/js/specific_listing.js') }}"></script>
@endsection
