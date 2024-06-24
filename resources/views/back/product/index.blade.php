@extends('back.app')
@section('seo')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-ecommerce-product-filter="search"
                                class="form-control form-control-solid w-250px ps-12" placeholder="Search Product" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <div class="w-100 mw-150px">
                            <!--begin::Select2-->
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Status" data-kt-ecommerce-product-filter="status">
                                <option></option>
                                <option value="all">All</option>
                                <option value="publish">publish</option>
                                <option value="draft">draft</option>
                            </select>
                            <!--end::Select2-->
                        </div>
                        <!--begin::Add product-->
                        <a href="apps/ecommerce/catalog/add-product.html" class="btn btn-primary">Add Product</a>
                        <!--end::Add product-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_ecommerce_products_table .form-check-input"
                                            value="1" />
                                    </div>
                                </th>
                                <th class="min-w-200px">Product</th>
                                <th class="text-end min-w-100px">Toko</th>
                                <th class="text-end min-w-70px">Stock</th>
                                <th class="text-end min-w-100px">Harga</th>
                                <th class="text-end min-w-100px">Rating</th>
                                <th class="text-end min-w-100px">Status</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($product as $item)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a href="#" class="symbol symbol-50px">
                                                <span class="symbol-label"
                                                    style="background-image:url(@if ($product_image->isNotEmpty()) {{ Storage::url('images/product/' . $product_image[0]->image) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $product->name }} @endif);"></span>
                                            </a>
                                            <!--end::Thumbnail-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-5 fw-bold"
                                                    data-kt-ecommerce-product-filter="product_name">{{ $item->name }}</a>
                                                <a class="text-muted text-hover-primary fs-7 fw-bold" href="#">

                                                    <div>
                                                        {{ $item->category_parent_name != null ? $item->category_parent_name . ' > ' : '' }}
                                                        {{ $item->category_name }}
                                                    </div>
                                                </a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0">
                                        <a class="text-muted text-hover-primary fw-bold" href="#">
                                            <span class="fw-bold">{{ $item->shop_name }}</span>
                                        </a>
                                    </td>
                                    <td class="text-end pe-0">
                                        @if ($item->stock == 0)
                                            <span class="badge badge-light-danger">Habis</span>
                                            <span class="fw-bold text-danger ms-3">0</span>
                                        @elseif ($item->stock <= 10)
                                            <span class="badge badge-light-warning">Segera Habis</span>
                                            <span class="fw-bold text-warning ms-3">{{ $item->stock }}</span>
                                        @else
                                            <span class="fw-bold ms-3">{{ $item->stock }}</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-0">@money($item->price)</td>
                                    <td class="text-end pe-0" data-order="rating-5">
                                        <div class="rating justify-content-end">
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>
                                            </div>
                                            <div class="rating-label checked">
                                                <span class="fw-bold ms-3">4.7</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0" data-order="Scheduled">
                                        <!--begin::Badges-->
                                        @if ($item->status == 1)
                                            <div class="badge badge-light-success">publish</div>
                                        @else
                                            <div class="badge badge-light-warning">draft</div>
                                        @endif
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end">
                                        <a href="#"
                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route("admin.product.detail", $item->id) }}"
                                                    class="menu-link px-3">Detail</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="{{ route("admin.product.detail-review", $item->id) }}"
                                                    class="menu-link px-3">penilaian</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="{{ route("admin.product.detail-viewer", $item->id) }}"
                                                    class="menu-link px-3">Pengunjung</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#"
                                                    class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a data-bs-toggle="modal" data-bs-target="#delete{{ $item->id }}"
                                                    class="menu-link px-3">
                                                    delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Products-->
        </div>
        <!--end::Container-->
    </div>
    @foreach ($product as $item)
        <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_user_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Hapus Produk</h2>
                        <!--end::Modal title-->

                    </div>
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <form method="POST" action="{{ route('admin.product.destroy', $item->id) }}" class="form">
                            @csrf
                            @method('delete')
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                                <label class="fw-bold fs-6 mb-2">
                                    Anda Yakinkah Ingin Menghapus produk <b>{{ $item->name }}</b> ?
                                </label>

                            </div>
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Hapus</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('scripts')
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('back/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    {{-- <script src="{{ asset("back/js/custom/apps/ecommerce/catalog/products.js") }}"></script> --}}
    <script>
        var KTAppEcommerceProducts = function() {
            var t, e, n = () => {

            };
            return {
                init: function() {
                    (t = document.querySelector("#kt_ecommerce_products_table")) && ((e = $(t).DataTable({
                        info: !1,
                        order: [],
                        pageLength: 10,
                        columnDefs: [{
                            render: DataTable.render.number(",", ".", 2),
                            targets: 4
                        }, {
                            orderable: !1,
                            targets: 0
                        }, {
                            orderable: !1,
                            targets: 7
                        }]
                    })).on("draw", (function() {
                        n()
                    })), document.querySelector('[data-kt-ecommerce-product-filter="search"]').addEventListener(
                        "keyup", (function(t) {
                            e.search(t.target.value).draw()
                        })), (() => {
                        const t = document.querySelector('[data-kt-ecommerce-product-filter="status"]');
                        $(t).on("change", (t => {
                            let n = t.target.value;
                            "all" === n && (n = ""), e.column(6).search(n).draw()
                        }))
                    })(), n())
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function() {
            KTAppEcommerceProducts.init()
        }));
    </script>
@endsection
