@extends('back.app')
@section('seo')
@endsection
@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="card mb-6 mb-xl-9">
                <div class="card-body pt-9 pb-0">
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                        <div
                            class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                            <img class="mw-150px mw-lg-175px" src="{{ Storage::url('images/shop/' . $shop->logo) }}"
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
                                        {{ strip_tags(Str::limit($shop->description, 300, '...')) }}</div>
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
                            <a class="nav-link text-active-primary py-5 me-6 active" href="
                            @if (request()->segment(2) == 'admin')
                                {{ route('admin.toko.detail', $shop->id) }}
                            @else
                                {{ route('shop.detail') }}
                            @endif
                            ">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6" href="
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
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title fs-3 fw-bold">Detail Toko</div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Form-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <!--begin::Row-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Logo Toko</div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <div
                                class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                                <img class="mw-150px mw-lg-175px" src="{{ Storage::url('images/shop/' . $shop->logo) }}"
                                    alt="image" />
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row mb-8">
                        <!--begin::Col-->
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Nama Toko</div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-9 fv-row">
                            <div class="fs-6 fw-semibold mt-2 mb-3">{{ $shop->name }}</div>

                        </div>
                    </div>
                    <div class="row mb-8">
                        <!--begin::Col-->
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Deskripsi Toko</div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-9 fv-row">
                            <div class="fs-6 fw-semibold mt-2 mb-3">{!! $shop->description !!}</div>

                        </div>
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row mb-8">
                        <!--begin::Col-->
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Informasi</div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-9 fv-row">
                            <div class="fs-6 fw-semibold mt-2 mb-3">{{ $shop->email }}</div>
                            <div class="fs-6 fw-semibold mt-2 mb-3">{{ $shop->phone }}</div>
                            <div class="fs-6 fw-semibold mt-2 mb-3">{{ $shop->address }}</div>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <!--begin::Col-->
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">kabupaten/Kota</div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-9 fv-row">
                            <div class="fs-6 fw-semibold mt-2 mb-3">{{ $shop->city->name }}</div>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <!--begin::Col-->
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Lokasi</div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-9 fv-row">
                            <div id="map" style=" height: 400px;"></div>
                            <input id="latitude" type="hidden" value="{{ $shop->latitude }}">
                            <input id="longitude" type="hidden" value="{{ $shop->longitude }}">
                            <input id="name" type="hidden" value="{{ $shop->name }}">
                        </div>
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row mb-8">
                        <!--begin::Col-->
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">social Media</div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-9 fv-row">
                            <div class="">
                                <a href="{{ $shop->facebook }}" class="btn btn-icon btn-light-facebook me-5 "><i
                                        class="fab fa-facebook-f fs-4"></i></a>
                                <a href="{{ $shop->telegram }}" class="btn btn-icon btn-light-twitter me-5 "><i
                                        class="fab fa-telegram fs-4"></i></a>
                                <a href="{{ $shop->twiter }}" class="btn btn-icon btn-light-twitter me-5 "><i
                                        class="fab fa-twitter fs-4"></i></a>
                            </div>
                            <div class=" mt-4">
                                <a href="{{ $shop->instagram }}" class="btn btn-icon btn-light-instagram me-5 "><i
                                        class="fab fa-instagram fs-4"></i></a>
                                <a href="{{ $shop->youtube }}" class="btn btn-icon btn-light-youtube me-5 "><i
                                        class="fab fa-youtube fs-4"></i></a>
                                <a href="{{ $shop->linkedin }}" class="btn btn-icon btn-light-linkedin me-5 "><i
                                        class="fab fa-linkedin fs-4"></i></a>
                            </div>
                        </div>
                        <!--begin::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row mb-8">
                        <!--begin::Col-->
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Link Toko</div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-9 fv-row">
                            <div class="d-flex">
                                <input id="kt_share_earn_link_input" type="text"
                                    class="form-control form-control-solid me-3 flex-grow-1" name="search"
                                    value="{{ url('/') . '/' . 'shop/' . $shop->slug }}" readonly />

                                <button id="kt_share_earn_link_copy_button" class="btn btn-light fw-bold flex-shrink-0"
                                    data-clipboard-target="#kt_share_earn_link_input">Copy Link</button>
                            </div>
                        </div>
                        <!--begin::Col-->
                    </div>
                    <!--end::Row-->

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

    <script>
        var button = document.querySelector('#kt_share_earn_link_copy_button');
        var input = document.querySelector('#kt_share_earn_link_input');
        var clipboard = new ClipboardJS(button);

        if (!clipboard) {
            return;
        }

        //  Copy text to clipboard. For more info check the plugin's documentation: https://clipboardjs.com/
        clipboard.on('success', function(e) {
            var buttonCaption = button.innerHTML;
            //Add bgcolor
            input.classList.add('bg-success');
            input.classList.add('text-inverse-success');

            button.innerHTML = 'Copied!';

            setTimeout(function() {
                button.innerHTML = buttonCaption;

                // Remove bgcolor
                input.classList.remove('bg-success');
                input.classList.remove('text-inverse-success');
            }, 3000); // 3seconds

            e.clearSelection();
        });
    </script>

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
