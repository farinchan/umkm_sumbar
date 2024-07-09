@extends('back.app')
@section('seo')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            
            <div class="card card-flush mt-6 mt-xl-9">
                <div class="card-header mt-5">
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">Penilaian</h3>
                        <div class="fs-6 text-gray-500">Total {{ $product_review->count() }} Penilaian</div>
                    </div>
                    <div class="card-toolbar my-1">
                        {{-- <div class="me-6 my-1">
                            <select id="kt_filter_year" name="year" data-control="select2" data-hide-search="true"
                                class="w-125px form-select form-select-solid form-select-sm">
                                <option value="All" selected="selected">All time</option>
                                <option value="thisyear">This year</option>
                                <option value="thismonth">This month</option>
                                <option value="lastmonth">Last month</option>
                                <option value="last90days">Last 90 days</option>
                            </select>
                        </div>
                        <div class="me-4 my-1">
                            <select id="kt_filter_orders" name="orders" data-control="select2" data-hide-search="true"
                                class="w-125px form-select form-select-solid form-select-sm">
                                <option value="All" selected="selected">All Orders</option>
                                <option value="Approved">Approved</option>
                                <option value="Declined">Declined</option>
                                <option value="In Progress">In Progress</option>
                                <option value="In Transit">In Transit</option>
                            </select>
                        </div> --}}
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" id="kt_filter_search"
                                class="form-control form-control-solid form-select-sm w-150px ps-9"
                                placeholder="Cari penilai" />
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table id="kt_profile_overview_table"
                            class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
                            <thead class="fs-7 text-gray-500 text-uppercase">
                                <tr>
                                    <th class="min-w-150px">Pennilai</th>
                                    <th class="min-w-200px">Produk</th>
                                    <th class="min-w-80px">rating</th>
                                    <th class="min-w-300px">Komentar</th>
                                </tr>
                            </thead>
                            <tbody class="fs-6">
                                @foreach ($product_review as $review)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-5 position-relative">
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="@if ($review->user->photo) {{ Storage::url("images/user".$review->user->photo) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $review->user->name }} @endif" />
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href=""
                                                        class="fs-6 text-gray-800 text-hover-primary">{{ $review->user->name }}</a>
                                                    <span class="fs-7 text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route("admin.product.detail-review", $review->product->id) }}" class="fs-6 text-gray-800 text-hover-primary">{{ $review->product->name }}</a>
                                            
                                        </td>
                                        <td>
                                            <div class="rating">
                                                @for ($i = 0; $i < $review->rating; $i++)
                                                    <div class="rating-label checked">
                                                        <i class="ki-duotone ki-star fs-6"></i>
                                                    </div>
                                                @endfor
                                                @for ($i = 0; $i < 5 - $review->rating; $i++)
                                                    <div class="rating-label">
                                                        <i class="ki-duotone ki-star fs-6"></i>
                                                    </div>
                                                @endfor
                                            </div>
                                        </td>
                                        <td>{{ $review->review }}
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
