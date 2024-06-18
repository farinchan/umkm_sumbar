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
                                        {{ $shop->description }}</div>
                                </div>
                                <div class="d-flex mb-4">
                                    <a href="#" class="btn btn-sm btn-primary me-3">Edit Toko</a>
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
                            <a class="nav-link text-active-primary py-5 me-6"
                                href="{{ route('admin.toko.detail', $shop->id) }}">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6 active"
                                href="{{ route('admin.toko.detail-product', $shop->id) }}">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6"
                                href="{{ route('admin.toko.detail-follower', $shop->id) }}">Pengikut</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-flex flex-wrap flex-stack pb-7">
                <!--begin::Title-->
                <div class="d-flex flex-wrap align-items-center my-1">
                    <h3 class="fw-bold me-5 my-1">Users (38)</h3>
                    <!--begin::Search-->

                    <!--end::Search-->
                </div>
                <!--end::Title-->
                <!--begin::Controls-->
                <div class="d-flex flex-wrap my-1">
                    <!--begin::Actions-->
                    <div class="d-flex my-0">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" id="kt_filter_search"
                                class="form-control form-control-sm border-body bg-body w-150px ps-10"
                                placeholder="Search" />
                        </div>
                        <button class="btn btn-primary btn-icon" type="submit" id="button-addon2">
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0">
                                    </path>
                                </svg>
                            </span>
                        </button>
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
                                    <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{ $item->name }}</a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="fw-semibold text-gray-500 mb-6">Art Director at Novica Co.</div>
                                    <!--end::Position-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-center flex-wrap">
                                        <!--begin::Stats-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                            <div class="fs-6 fw-bold text-gray-700">$14,560</div>
                                            <div class="fw-semibold text-gray-500">Earnings</div>
                                        </div>
                                        <!--end::Stats-->
                                        <!--begin::Stats-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                            <div class="fs-6 fw-bold text-gray-700">23</div>
                                            <div class="fw-semibold text-gray-500">Tasks</div>
                                        </div>
                                        <!--end::Stats-->
                                        <!--begin::Stats-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                            <div class="fs-6 fw-bold text-gray-700">$236,400</div>
                                            <div class="fw-semibold text-gray-500">Sales</div>
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
                <!--begin::Tab pane-->
                <div id="kt_project_users_table_pane" class="tab-pane fade">
                    <!--begin::Card-->
                    <div class="card card-flush">
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table id="kt_project_users_table"
                                    class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
                                    <thead class="fs-7 text-gray-500 text-uppercase">
                                        <tr>
                                            <th class="min-w-250px">Manager</th>
                                            <th class="min-w-150px">Date</th>
                                            <th class="min-w-90px">Amount</th>
                                            <th class="min-w-90px">Status</th>
                                            <th class="min-w-50px text-end">Details</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fs-6">
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-6.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Emma Smith</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">smith@kpmg.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Jun 20, 2024</td>
                                            <td>$619.00</td>
                                            <td>
                                                <span class="badge badge-light-info fw-bold px-4 py-3">In progress</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <span
                                                                class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Online-->
                                                        <div
                                                            class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                        </div>
                                                        <!--end::Online-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Melody Macy</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">melody@altbox.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Apr 15, 2024</td>
                                            <td>$661.00</td>
                                            <td>
                                                <span class="badge badge-light-danger fw-bold px-4 py-3">Rejected</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Max Smith</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">max@kt.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Mar 10, 2024</td>
                                            <td>$939.00</td>
                                            <td>
                                                <span class="badge badge-light-info fw-bold px-4 py-3">In progress</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-5.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Sean Bean</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">sean@dellito.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Apr 15, 2024</td>
                                            <td>$757.00</td>
                                            <td>
                                                <span class="badge badge-light-danger fw-bold px-4 py-3">Rejected</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Brian Cox</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">brian@exchange.com
                                                        </div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Aug 19, 2024</td>
                                            <td>$474.00</td>
                                            <td>
                                                <span class="badge badge-light-warning fw-bold px-4 py-3">Pending</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <span
                                                                class="symbol-label bg-light-warning text-warning fw-semibold">C</span>
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Online-->
                                                        <div
                                                            class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                        </div>
                                                        <!--end::Online-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Mikaela
                                                            Collins</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">mik@pex.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Feb 21, 2024</td>
                                            <td>$775.00</td>
                                            <td>
                                                <span class="badge badge-light-info fw-bold px-4 py-3">In progress</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-9.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Francis
                                                            Mitcham</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">f.mit@kpmg.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Mar 10, 2024</td>
                                            <td>$940.00</td>
                                            <td>
                                                <span class="badge badge-light-warning fw-bold px-4 py-3">Pending</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <span
                                                                class="symbol-label bg-light-danger text-danger fw-semibold">O</span>
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Online-->
                                                        <div
                                                            class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                        </div>
                                                        <!--end::Online-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Olivia Wild</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">olivia@corpmail.com
                                                        </div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Apr 15, 2024</td>
                                            <td>$766.00</td>
                                            <td>
                                                <span class="badge badge-light-success fw-bold px-4 py-3">Approved</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <span
                                                                class="symbol-label bg-light-primary text-primary fw-semibold">N</span>
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Online-->
                                                        <div
                                                            class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                        </div>
                                                        <!--end::Online-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Neil Owen</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">owen.neil@gmail.com
                                                        </div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Aug 19, 2024</td>
                                            <td>$990.00</td>
                                            <td>
                                                <span class="badge badge-light-info fw-bold px-4 py-3">In progress</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-23.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Dan Wilson</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">dam@consilting.com
                                                        </div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Dec 20, 2024</td>
                                            <td>$989.00</td>
                                            <td>
                                                <span class="badge badge-light-success fw-bold px-4 py-3">Approved</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <span
                                                                class="symbol-label bg-light-danger text-danger fw-semibold">E</span>
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Online-->
                                                        <div
                                                            class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                        </div>
                                                        <!--end::Online-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Emma Bold</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">emma@intenso.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Aug 19, 2024</td>
                                            <td>$924.00</td>
                                            <td>
                                                <span class="badge badge-light-danger fw-bold px-4 py-3">Rejected</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-12.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Ana Crown</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">ana.cf@limtel.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Nov 10, 2024</td>
                                            <td>$848.00</td>
                                            <td>
                                                <span class="badge badge-light-success fw-bold px-4 py-3">Approved</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <span
                                                                class="symbol-label bg-light-info text-info fw-semibold">A</span>
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Online-->
                                                        <div
                                                            class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                        </div>
                                                        <!--end::Online-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Robert Doe</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">robert@benko.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Jun 20, 2024</td>
                                            <td>$427.00</td>
                                            <td>
                                                <span class="badge badge-light-success fw-bold px-4 py-3">Approved</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-13.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">John Miller</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">miller@mapple.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Apr 15, 2024</td>
                                            <td>$545.00</td>
                                            <td>
                                                <span class="badge badge-light-success fw-bold px-4 py-3">Approved</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <span
                                                                class="symbol-label bg-light-success text-success fw-semibold">L</span>
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Online-->
                                                        <div
                                                            class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                        </div>
                                                        <!--end::Online-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Lucy Kunic</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">lucy.m@fentech.com
                                                        </div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Feb 21, 2024</td>
                                            <td>$477.00</td>
                                            <td>
                                                <span class="badge badge-light-info fw-bold px-4 py-3">In progress</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-21.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Online-->
                                                        <div
                                                            class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                        </div>
                                                        <!--end::Online-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Ethan Wilder</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">ethan@loop.com.au</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Sep 22, 2024</td>
                                            <td>$555.00</td>
                                            <td>
                                                <span class="badge badge-light-info fw-bold px-4 py-3">In progress</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-9.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Francis
                                                            Mitcham</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">f.mit@kpmg.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Mar 10, 2024</td>
                                            <td>$543.00</td>
                                            <td>
                                                <span class="badge badge-light-danger fw-bold px-4 py-3">Rejected</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-6.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Emma Smith</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">smith@kpmg.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Jul 25, 2024</td>
                                            <td>$999.00</td>
                                            <td>
                                                <span class="badge badge-light-warning fw-bold px-4 py-3">Pending</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-13.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">John Miller</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">miller@mapple.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Dec 20, 2024</td>
                                            <td>$527.00</td>
                                            <td>
                                                <span class="badge badge-light-warning fw-bold px-4 py-3">Pending</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-9.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Francis
                                                            Mitcham</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">f.mit@kpmg.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Jun 24, 2024</td>
                                            <td>$826.00</td>
                                            <td>
                                                <span class="badge badge-light-info fw-bold px-4 py-3">In progress</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-21.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Online-->
                                                        <div
                                                            class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                        </div>
                                                        <!--end::Online-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Ethan Wilder</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">ethan@loop.com.au</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Oct 25, 2024</td>
                                            <td>$997.00</td>
                                            <td>
                                                <span class="badge badge-light-warning fw-bold px-4 py-3">Pending</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <span
                                                                class="symbol-label bg-light-danger text-danger fw-semibold">O</span>
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Online-->
                                                        <div
                                                            class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                        </div>
                                                        <!--end::Online-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Olivia Wild</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">olivia@corpmail.com
                                                        </div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Oct 25, 2024</td>
                                            <td>$869.00</td>
                                            <td>
                                                <span class="badge badge-light-danger fw-bold px-4 py-3">Rejected</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-13.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">John Miller</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">miller@mapple.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Jul 25, 2024</td>
                                            <td>$487.00</td>
                                            <td>
                                                <span class="badge badge-light-warning fw-bold px-4 py-3">Pending</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-23.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Dan Wilson</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">dam@consilting.com
                                                        </div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Aug 19, 2024</td>
                                            <td>$471.00</td>
                                            <td>
                                                <span class="badge badge-light-success fw-bold px-4 py-3">Approved</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Max Smith</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">max@kt.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Jun 24, 2024</td>
                                            <td>$671.00</td>
                                            <td>
                                                <span class="badge badge-light-success fw-bold px-4 py-3">Approved</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-12.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Ana Crown</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">ana.cf@limtel.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Sep 22, 2024</td>
                                            <td>$485.00</td>
                                            <td>
                                                <span class="badge badge-light-warning fw-bold px-4 py-3">Pending</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <span
                                                                class="symbol-label bg-light-danger text-danger fw-semibold">O</span>
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Online-->
                                                        <div
                                                            class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                        </div>
                                                        <!--end::Online-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Olivia Wild</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">olivia@corpmail.com
                                                        </div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Apr 15, 2024</td>
                                            <td>$796.00</td>
                                            <td>
                                                <span class="badge badge-light-info fw-bold px-4 py-3">In progress</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Max Smith</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">max@kt.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>May 05, 2024</td>
                                            <td>$976.00</td>
                                            <td>
                                                <span class="badge badge-light-danger fw-bold px-4 py-3">Rejected</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-13.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">John Miller</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">miller@mapple.com</div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Feb 21, 2024</td>
                                            <td>$991.00</td>
                                            <td>
                                                <span class="badge badge-light-danger fw-bold px-4 py-3">Rejected</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href=""
                                                            class="mb-1 text-gray-800 text-hover-primary">Brian Cox</a>
                                                        <div class="fw-semibold fs-6 text-gray-500">brian@exchange.com
                                                        </div>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>Oct 25, 2024</td>
                                            <td>$888.00</td>
                                            <td>
                                                <span class="badge badge-light-success fw-bold px-4 py-3">Approved</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Tab pane-->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    </script>
@endsection
