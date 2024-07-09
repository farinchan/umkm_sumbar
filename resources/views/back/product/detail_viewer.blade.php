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
                            <img class="mw-150px mw-lg-180px"
                                src="@if ($product_image->isNotEmpty()) {{ Storage::url('images/product/' . $product_image[0]->image) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $product->name }} @endif"
                                alt="image" />
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-1">
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">{{ $product->name }}</a>
                                        @if ($product->status == 1)
                                            <span class="badge badge-light-success me-auto">Publish</span>
                                        @else
                                            <span class="badge badge-light-danger me-auto">draft</span>
                                        @endif
                                    </div>
                                    <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-500">
                                        {{ $product->short_description }}</div>
                                </div>
                                <div class="d-flex mb-4">
                                    <a href="{{ route("admin.product.edit", $product->id) }}" class="btn btn-sm btn-primary me-3">Edit Produk</a>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-start">
                                <div class="d-flex flex-wrap">
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bold">@money($product->price)</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-500">Harga</div>
                                    </div>
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bold" data-kt-countup="true"
                                                data-kt-countup-value="{{ $product->stock }}">0
                                            </div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-500">Stok</div>
                                    </div>
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bold" data-kt-countup="true"
                                                data-kt-countup-value="{{ $product->discount }}"
                                                data-kt-countup-prefix="% "> 0</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-500">Diskon</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator"></div>
                    @role('superadmin|admin')
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6"
                                href="{{ route('admin.product.detail', $product->id) }}">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6"
                                href="{{ route('admin.product.detail-image', $product->id) }}">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6"
                                href="{{ route('admin.product.detail-review', $product->id) }}">Penilaian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6 active"
                                href="{{ route('admin.product.detail-viewer', $product->id) }}">Pengunjung</a>
                        </li>
                    </ul>
                @else
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6"
                                href="{{ route('shop.product.detail', $product->id) }}">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6"
                                href="{{ route('shop.product.image', $product->id) }}">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6"
                                href="{{ route('shop.product.review', $product->id) }}">Penilaian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6 active"
                                href="{{ route('shop.product.viewer', $product->id) }}">Pengunjung</a>
                        </li>
                    </ul>
                @endrole
                </div>
            </div>
            <div class="card card-flush mt-6 mt-xl-9">
                <div class="card-header mt-5">
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">Pengunjung </h3>
                        <div class="fs-6 text-gray-500">Total {{ $product_viewer->count() }} Pengunjung</div>
                    </div>
                    <div class="card-toolbar my-1">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" id="kt_filter_search"
                                class="form-control form-control-solid form-select-sm w-150px ps-9"
                                placeholder="Cari Pengunjung" />
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table id="kt_profile_overview_table"
                            class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
                            <thead class="fs-7 text-gray-500 text-uppercase">
                                <tr>
                                    <th class="min-w-150px">IP Address</th>
                                    <th class="">address</th>
                                    <th class="">Platform</th>
                                    <th class="">Device</th>
                                    <th class="">Waktu</th>

                                </tr>
                            </thead>
                            <tbody class="fs-6">
                                @foreach ($product_viewer as $viewer)
                                    <tr>
                                        <td>
                                            {{ $viewer->ip }}
                                        </td>
                                        <td>
                                            @if ($viewer->latitude && $viewer->longitude)
                                                <a target="_blank" href="https://www.google.com/maps/search/{{ $viewer->latitude }},{{ $viewer->longitude }}" target="_blank" class="text-gray-800 text-hover-primary">
                                                    {{ $viewer->city }},
                                                    {{ $viewer->region }},
                                                    {{ $viewer->country }}
                                                </a>    
                                                
                                            @endif
                                        </td>
                                        <td>
                                            {{ $viewer->platform }} - {{ $viewer->browser }}
                                        </td>
                                        <td>
                                            {{ $viewer->device }}
                                        </td>
                                        <td>
                                            {{ $viewer->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
   
@endsection
@section('scripts')
<script src="{{ asset('back/plugins/custom/datatables/datatables.bundle.js') }}"></script>
{{-- <script src="{{ asset("back/js/custom/apps/ecommerce/catalog/products.js") }}"></script> --}}
<script>
    "use strict";
    // Class definition
    var KTProjectOverview = function() {
        var initTable = function() {
            var table = document.querySelector('#kt_profile_overview_table');
            if (!table) {
                return;
            }
            // Set date data order
            const tableRows = table.querySelectorAll('tbody tr');
            tableRows.forEach(row => {
                const dateRow = row.querySelectorAll('td');
                const realDate = moment(dateRow[1].innerHTML, "MMM D, YYYY").format();
                dateRow[1].setAttribute('data-order', realDate);
            });
            // Init datatable --- more info on datatables: https://datatables.net/manual/
            const datatable = $(table).DataTable({
                "info": false,
                'order': []
            });
            // Filter dropdown elements
            const filterOrders = document.getElementById('kt_filter_orders');
            const filterYear = document.getElementById('kt_filter_year');
            // Filter by order status --- official docs reference: https://datatables.net/reference/api/search()
            filterOrders.addEventListener('change', function(e) {
                datatable.column(3).search(e.target.value).draw();
            });
            // Filter by date --- official docs reference: https://momentjs.com/docs/
            var minDate;
            var maxDate;
            filterYear.addEventListener('change', function(e) {
                const value = e.target.value;
                switch (value) {
                    case 'thisyear': {
                        minDate = moment().startOf('year').format();
                        maxDate = moment().endOf('year').format();
                        datatable.draw();
                        break;
                    }
                    case 'thismonth': {
                        minDate = moment().startOf('month').format();
                        maxDate = moment().endOf('month').format();
                        datatable.draw();
                        break;
                    }
                    case 'lastmonth': {
                        minDate = moment().subtract(1, 'months').startOf('month').format();
                        maxDate = moment().subtract(1, 'months').endOf('month').format();
                        datatable.draw();
                        break;
                    }
                    case 'last90days': {
                        minDate = moment().subtract(30, 'days').format();
                        maxDate = moment().format();
                        datatable.draw();
                        break;
                    }
                    default: {
                        minDate = moment().subtract(100, 'years').startOf('month').format();
                        maxDate = moment().add(1, 'months').endOf('month').format();
                        datatable.draw();
                        break;
                    }
                }
            });
            // Date range filter --- offical docs reference: https://datatables.net/examples/plug-ins/range_filtering.html
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = minDate;
                    var max = maxDate;
                    var date = parseFloat(moment(data[1]).format()) || 0; // use data for the age column
                    if ((isNaN(min) && isNaN(max)) ||
                        (isNaN(min) && date <= max) ||
                        (min <= date && isNaN(max)) ||
                        (min <= date && date <= max)) {
                        return true;
                    }
                    return false;
                }
            );
            // Search --- official docs reference: https://datatables.net/reference/api/search()
            var filterSearch = document.getElementById('kt_filter_search');
            filterSearch.addEventListener('keyup', function(e) {
                datatable.search(e.target.value).draw();
            });
        }
        // Public methods
        return {
            init: function() {
                initTable();
            }
        }
    }();
    // On document ready
    KTUtil.onDOMContentLoaded(function() {
        KTProjectOverview.init();
    });
</script>
@endsection
