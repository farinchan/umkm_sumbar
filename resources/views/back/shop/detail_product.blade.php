@extends('back.app')
@section('seo')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="card mb-6 mb-xl-9">
                <div class="card-body pt-9 pb-0">
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                        <div
                            class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                            <img class="mw-50px mw-lg-75px" src="assets/media/svg/brand-logos/volicity-9.svg"
                                alt="image" />
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-1">
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">{{ $shop->name }}</a>
                                        @if ($shop->verified == 1)
                                            <span class="badge badge-light-success me-auto">Diverifikasi</span>
                                        @else
                                            <span class="badge badge-light-danger me-auto">Belum Diverifikasi</span>
                                        @endif
                                    </div>
                                    <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-500">
                                        {{ strip_tags(Str::limit($shop->description, 300, '...')) }}
                                    </div>
                                </div>
                                <div class="d-flex mb-4">
                                    <a href="@if (request()->segment(3) == 'toko')
                                        {{ route('admin.toko.edit', $shop->id) }}
                                         @else
                                        {{ route('shop.edit') }}
                                        
                                    @endif" class="btn btn-sm btn-primary me-3">Edit Toko</a>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-start">
                                <div class="d-flex flex-wrap">
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bold">{{ $shop->created_at->diffForHumans() }}</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-500">Waktu Join</div>
                                    </div>
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bold" data-kt-countup="true" data-kt-countup-value="75">0
                                            </div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-500">Produk Dijual</div>
                                    </div>
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bold" data-kt-countup="true" data-kt-countup-value="15000"
                                                data-kt-countup-prefix="$">0</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-500">Total Pendapatan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6" href="
                            @if (request()->segment(2) == 'admin')
                                {{ route('admin.toko.detail', $shop->id) }}
                            @else
                                {{ route('shop.detail') }}
                            @endif
                            ">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6 active" href="
                            @if (request()->segment(2) == 'admin')
                                {{ route('admin.toko.detail-product', $shop->id) }}
                            @else
                                {{ route('shop.detail-product') }}
                            @endif
                            ">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6"
                                href="
                            @if (request()->segment(2) == 'admin')
                                {{ route('admin.toko.detail-follower', $shop->id) }}
                            @else
                                {{ route('shop.detail-follower') }}
                            @endif
                                ">Pengikut</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-flex flex-wrap flex-stack pb-7">
                <!--begin::Title-->
                <div class="d-flex flex-wrap align-items-center my-1">
                    <h3 class="fw-bold me-5 my-1">produk ({{ $product->total() }})</h3>
                    <!--begin::Search-->

                    <!--end::Search-->
                </div>
                <!--end::Title-->
                <!--begin::Controls-->
                <div class="d-flex flex-wrap my-1">
                    <!--begin::Actions-->
                    <div class="d-flex my-0">
                        <form method="GET" class="card-title">
                            <input type="hidden" name="page" value="{{ request('page', 1) }}">
                            <div class="input-group d-flex align-items-center position-relative my-1">
                                <input type="text" class="form-control form-control-solid  ps-5 rounded-0" name="q"
                                    value="{{ request('q') }}" placeholder="Cari Produk" />
                                <button class="btn btn-primary btn-icon" type="submit" id="button-addon2">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            <!--end::Search-->
                        </form>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Controls-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Tab Content-->
            <div class="tab-content">
                <!--begin::Tab pane-->
                <div id="kt_project_users_card_pane" class="tab-pane fade show active">
                    <!--begin::Row-->

                    <div class="row g-6 g-xl-9">
                        <!--begin::Col-->
                        @if ($product->isEmpty())
                            <div class="col-12">
                                <div class="d-flex flex-center flex-column flex-column-fluid">
                                    <div class="text-center">
                                        <h1 class="fw-bolder fs-2qx text-dark mb-5">Produk tidak ditemukan</h1>
                                        <img src="{{ asset('assets/media/illustrations/empty.svg') }}"
                                            class="mw-100 mh-300px" alt="" />
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach ($product as $item)
                                <div class="col-md-6 col-xxl-4">
                                    <!--begin::Card-->
                                    <div class="card">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-65px symbol-circle mb-5">
                                                <img src="assets/media//avatars/300-2.jpg" alt="image" />
                                                <div
                                                    class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3">
                                                </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{ $item->name }}</a>
                                            <!--end::Name-->
                                            <!--begin::Position-->
                                            <div class="fw-semibold text-gray-500 mb-6">
                                                {{ $item->category_parent_name !== null ? $item->category_parent_name . ' > ' : '' }}
                                                {{ $item->category_name }}
                                            </div>
                                            <!--end::Position-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-center flex-wrap">
                                                <!--begin::Stats-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                                    <div class="fs-6 fw-bold text-gray-700">@money($item->price)</div>
                                                    <div class="fw-semibold text-gray-500">Harga</div>
                                                </div>
                                                <!--end::Stats-->
                                                <!--begin::Stats-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                                    <div class="fs-6 fw-bold text-gray-700">{{ $item->stock }}</div>
                                                    <div class="fw-semibold text-gray-500">Stok</div>
                                                </div>
                                                <!--end::Stats-->
                                                <!--begin::Stats-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                                    <div class="fs-6 fw-bold text-gray-700">{{ $item->discount }} %</div>
                                                    <div class="fw-semibold text-gray-500">Diskon</div>
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!--end::Row-->
                    <!--begin::Pagination-->
                    <div class="d-flex flex-stack flex-wrap my-3">
                        <div class="fs-6 fw-semibold text-gray-700">
                            Showing {{ $product->firstItem() }} to {{ $product->lastItem() }} of {{ $product->total() }}
                            records
                        </div>
                        <ul class="pagination">
                            @if ($product->onFirstPage())
                                <li class="page-item previous">
                                    <a href="#" class="page-link"><i class="previous"></i></a>
                                </li>
                            @else
                                <li class="page-item previous">
                                    <a href="{{ $product->previousPageUrl() }}" class="page-link bg-light"><i
                                            class="previous"></i></a>
                                </li>
                            @endif

                            @php
                                // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                                $start = max($product->currentPage() - 2, 1);
                                $end = min($start + 4, $product->lastPage());
                            @endphp

                            @if ($start > 1)
                                <!-- Menampilkan tanda elipsis jika halaman pertama tidak termasuk dalam tampilan -->
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                            @endif

                            @foreach ($product->getUrlRange($start, $end) as $page => $url)
                                <li class="page-item{{ $page == $product->currentPage() ? ' active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if ($end < $product->lastPage())
                                <!-- Menampilkan tanda elipsis jika halaman terakhir tidak termasuk dalam tampilan -->
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                            @endif

                            @if ($product->hasMorePages())
                                <li class="page-item next">
                                    <a href="{{ $product->nextPageUrl() }}" class="page-link bg-light"><i
                                            class="next"></i></a>
                                </li>
                            @else
                                <li class="page-item next">
                                    <a href="#" class="page-link"><i class="next"></i></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <!--end::Pagination-->
                </div>
                <!--end::Tab pane-->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    </script>
@endsection
