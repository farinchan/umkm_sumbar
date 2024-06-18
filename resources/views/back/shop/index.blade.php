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
                                <option value="Diverifikasi">Diverifikasi</option>
                                <option value="belum diverifikasi">Belum diverifikasi</option>
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
                                <th class="min-w-200px">Toko</th>
                                <th class="text-center min-w-100px">owner</th>
                                <th class="text-center min-w-70px">Kabupaten/Kota</th>
                                <th class="text-center min-w-100px">informasi</th>
                                <th class="text-center min-w-100px">Social Media</th>
                                <th class="text-center min-w-100px">Status</th>
                                <th class="text-center min-w-70px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($shop as $item)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a href="apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                <span class="symbol-label"
                                                    style="background-image:url(assets/media//stock/ecommerce/1.png);"></span>
                                            </a>
                                            <!--end::Thumbnail-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="apps/ecommerce/catalog/edit-product.html"
                                                    class="text-gray-800 text-hover-primary fs-5 fw-bold"
                                                    data-kt-ecommerce-product-filter="product_name">{{ $item->name }}</a>
                                                <div class="text-muted fs-7 fw-bold">
                                                    {!! $item->description !!}
                                                    {{-- {{! $item->description }} --}}
                                                </div>

                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pe-0">
                                        <a class="text-muted text-hover-primary fw-bold" href="#">
                                            <span class="fw-bold">{{ $item->user_name }}</span>
                                        </a>
                                    </td>
                                    <td class="text-center pe-0">
                                        <span class="fw-bold ms-3">{{ $item->city_name }}</span>
                                    </td>
                                    <td class=" pe-0">
                                        <span class="fw-bold ms-3">{{ $item->address }}</span><br>
                                        <span class="fw-bold ms-3">{{ $item->phone }}</span><br>
                                        <span class="fw-bold ms-3">{{ $item->email }}</span><br>
                                        
                                    </td>
                                    <td class="text-end pe-0" data-order="rating-5">
                                        <div class="rating justify-content-end">
                                            <a href="{{ $item->facebook }}" class="btn btn-icon btn-light-facebook me-5 "><i class="fab fa-facebook-f fs-4"></i></a>
                                            <a href="{{ $item->telegram }}" class="btn btn-icon btn-light-twitter me-5 "><i class="fab fa-telegram fs-4"></i></a>
                                            <a href="{{ $item->twiter }}" class="btn btn-icon btn-light-twitter me-5 "><i class="fab fa-twitter fs-4"></i></a>
                                        </div>
                                        <div class="rating justify-content-end mt-4">
                                            <a href="{{ $item->instagram }}" class="btn btn-icon btn-light-instagram me-5 "><i class="fab fa-instagram fs-4"></i></a>
                                            <a href="{{ $item->youtube }}" class="btn btn-icon btn-light-youtube me-5 "><i class="fab fa-youtube fs-4"></i></a>
                                            <a href="{{ $item->linkedin }}" class="btn btn-icon btn-light-linkedin me-5 "><i class="fab fa-linkedin fs-4"></i></a>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0" data-order="Scheduled">
                                        <!--begin::Badges-->
                                        @if ($item->verified == 1)
                                            <div class="badge badge-light-success">Diverifikasi</div>
                                        @else
                                            <div class="badge badge-light-warning">Belum diverifikasi</div>
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
                                                <a href="#" class="menu-link px-3">Edit</a>
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
    @foreach ($shop as $item)
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
                        <form method="POST" action="{{ route('admin.toko.destroy', $item->id) }}" class="form">
                            @csrf
                            @method('delete')
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                                <label class="fw-bold fs-6 mb-2">
                                    Anda Yakinkah Ingin Menghapus Toko <b>{{ $item->name }}</b> ?
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
                            orderable: !1,
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
