@extends('back.app')
@section('seo')
@endsection
@section('content')

        <div class="container-xxl" id="kt_content_container">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Kategori Produk</span>
                            <span class="text-muted fw-semibold fs-7">Data Kategori Produk</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <form method="GET" class="card-title">
                            <input type="hidden" name="page" value="{{ request('page', 1) }}">
                            <div class="input-group d-flex align-items-center position-relative my-1">
                                <input type="text" class="form-control form-control-solid  ps-5 rounded-0" name="q"
                                    value="{{ request('q') }}" placeholder="Cari Kategori" />
                                <button class="btn btn-primary btn-icon" type="submit" id="button-addon2">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0">
                                            </path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </form>
                        <a href="{{ route('admin.product.category.create') }}"
                            class="btn btn-primary d-flex align-items-center"><i class="ki-duotone ki-plus fs-2"></i>
                            Tambah
                    </a>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th class="min-w-125px">Kategori</th>
                                <th class="min-w-125px">Slug</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            @if ($productCategories->total() == 0)
                                <tr class="max-w-10px">
                                    <td colspan="6" class="text-center">
                                        No data available in table
                                    </td>
                                </tr>
                            @else
                                @foreach ($productCategories as $item)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#"
                                                    class="symbol symbol-50px">
                                                    <span class="symbol-label"
                                                        style="background-image:url(https://preview.keenthemes.com/metronic8/demo7/assets/media//stock/ecommerce/68.png);"></span>
                                                </a>
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                                                        data-kt-ecommerce-category-filter="category_name">{{ $item->parent_name != null ?  $item->parent_name . " > "  : ""}} {{ $item->name }}</a>
                                                    <div class="text-muted fs-7 fw-bold">{{ $item->description }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="badge badge-light">{{ $item->slug }}</div>
                                        </td>
                                        <td class="text-end">
                                            <a href="#"
                                                class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                Actions
                                                <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="/metronic8/demo7/apps/ecommerce/catalog/add-category.html"
                                                        class="menu-link px-3">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <form action="{{ route("admin.product.category.destroy", $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="menu-link px-3">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="d-flex flex-stack flex-wrap my-3">
                        <div class="fs-6 fw-semibold text-gray-700">
                            Showing {{ $productCategories->firstItem() }} to {{ $productCategories->lastItem() }} of
                            {{ $productCategories->total() }}
                            records
                        </div>
                        <ul class="pagination">
                            @if ($productCategories->onFirstPage())
                                <li class="page-item previous">
                                    <a href="#" class="page-link"><i class="previous"></i></a>
                                </li>
                            @else
                                <li class="page-item previous">
                                    <a href="{{ $productCategories->previousPageUrl() }}" class="page-link bg-light"><i
                                            class="previous"></i></a>
                                </li>
                            @endif
                            @php
                                // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                                $start = max($productCategories->currentPage() - 2, 1);
                                $end = min($start + 4, $productCategories->lastPage());
                            @endphp
                            @if ($start > 1)
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                            @endif
                            @foreach ($productCategories->getUrlRange($start, $end) as $page => $url)
                                <li class="page-item{{ $page == $productCategories->currentPage() ? ' active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                            @if ($end < $productCategories->lastPage())
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                            @endif
                            @if ($productCategories->hasMorePages())
                                <li class="page-item next">
                                    <a href="{{ $productCategories->nextPageUrl() }}" class="page-link bg-light"><i
                                            class="next"></i></a>
                                </li>
                            @else
                                <li class="page-item next">
                                    <a href="#" class="page-link"><i class="next"></i></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @foreach ($productCategories as $item)
        <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header" id="kt_modal_add_user_header">
                        <h2 class="fw-bolder">Hapus Kategori</h2>
                    </div>
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <form method="POST" action="{{ route('admin.product.category.destroy', $item->id) }}" class="form">
                            @csrf
                            @method('delete')
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                <label class="fw-bold fs-6 mb-2">
                                    Anda Yakinkah Ingin Menghapus category <b>{{ $item->name }}</b> ?
                                </label>
                            </div>
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3"
                                    data-kt-users-modal-action="cancel">Batal</button>
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
