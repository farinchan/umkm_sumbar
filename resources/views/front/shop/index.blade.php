@extends('front.app')

@php
    $website = \App\Models\SettingWebsite::first();
@endphp

@section('seo')
    <title>{{ $website->name }} | UMKM</title>
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
                        <div class="col-md-6">
                            <div class="card shadow-sm mb-3 px-2" id="card">
                                <div class="row g-0">
                                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                                        <figure class="text-center m-0">
                                            <a href="">
                                                <img class="img-fluid lazy"
                                                    src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}"
                                                    data-src=" 
                                                @if ($item->logo) {{ Storage::url('images/shop/' . $item->logo) }}
                                                @else
                                                    {{ Storage::url('images/setting/logo.png') }} @endif
                                                "
                                                    alt="">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{ route('shop-detail', $item->slug) }}">
                                                    {{ $item->name }}

                                                </a>
                                                @if ($item->verified == 1)
                                                    <small>
                                                        <i class="fa-solid fa-badge-check text-success ps-1"
                                                            data-bs-toggle="tooltip" data-bs-placement="right"
                                                            data-bs-title="UMKM ini telah diverifikasi"></i>
                                                    </small>
                                                @endif
                                            </h5>


                                            {{-- <p>{{ Str::limit($item->description, 100, '...') }}</p> --}}
                                            <table>
                                                <tr>
                                                    <td width="25px">
                                                        <i class="ti-location-pin"></i>
                                                    </td>
                                                    <td>
                                                        {{ $item->city->name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="ti-location-arrow"></i>
                                                    </td>
                                                    <td>
                                                        {{ $item->address }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="ti-email"></i>
                                                    </td>
                                                    <td>
                                                        {{ $item->email }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fa-regular fa-phone"></i>                                                 </td>
                                                    <td>
                                                        {{ $item->phone }}
                                                    </td>
                                                </tr>
                                            </table>

                                            {{-- <ul>
                                            <li><a href="{{ route('shop-detail', $item->slug) }}"
                                                    class="btn_1">Kunjungi</a>
                                            </li>
                                        </ul> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- /col -->
                </div>

                <div class="pagination__wrapper no_border add_bottom_30">
                    <ul class="pagination">
                        @if ($shop->onFirstPage())
                            <li class="page-item previous">
                                <a class="prev" title="previous page" href="#" class="page-link"><i class="previous"></i>
                                    &#10094;
                                </a>
                            </li>
                        @else
                            <li class="page-item previous">
                                <a class="prev" title="previous page" href="{{ route('shop', ['city' => request()->city, 'page' => $shop->currentPage() - 1]) }}"
                                    class="page-link bg-light"><i class="previous"></i>
                                    &#10094;
                                </a>
                            </li>
                        @endif


                        @php
                            // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                            $start = max($shop->currentPage() - 2, 1);
                            $end = min($start + 4, $shop->lastPage());
                        @endphp

                        @if ($start > 1)
                            <!-- Menampilkan tanda elipsis jika halaman pertama tidak termasuk dalam tampilan -->
                            <li>
                                <a>...</a>
                            </li>
                        @endif

                        @foreach ($shop->getUrlRange($start, $end) as $page => $url)
                            @if ($page == $shop->currentPage())
                                <li>
                                    <a
                                        class="{{ $page == $shop->currentPage() ? ' active' : '' }}">{{ $page }}</a>
                                </li>
                            @else
                                <li>
                                    <a href="
                                {{ route('shop', ['city' => request()->city, 'page' => $page]) }}
                                "
                                        class="{{ $page == $shop->currentPage() ? ' active' : '' }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        @if ($end < $shop->lastPage())
                            <!-- Menampilkan tanda elipsis jika halaman terakhir tidak termasuk dalam tampilan -->
                            <li>
                                <a>...</a>
                            </li>
                        @endif

                        @if ($shop->hasMorePages())
                            <li><a href="{{ route('shop', ['city' => request()->city, 'page' => $shop->currentPage() + 1]) }}"
                                    class="next" title="next page">&#10095;</a>
                            </li>
                        @else
                            <li><a href="#" class="next" title="next page">&#10095;</a></li>
                        @endif
                    </ul>
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
