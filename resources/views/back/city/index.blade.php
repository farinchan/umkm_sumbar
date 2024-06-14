@extends('back.app')

@section('seo')
@endsection

@section('content')



        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Kota/Kabupaten</span>
                            <span class="text-muted fw-semibold fs-7">Data Kota/Kabupaten</span>
                        </h3>
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <form method="GET" class="card-title">
                            <input type="hidden" name="page" value="{{ request('page', 1) }}">
                            <div class="input-group d-flex align-items-center position-relative my-1">
                                <input type="text" class="form-control form-control-solid  ps-5 rounded-0"
                                    name="q" value="{{ request('q') }}" placeholder="Cari Kota/Kabupaten" />
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
                            <!--end::Search-->
                        </form>
                        <button data-bs-toggle="modal" data-bs-target="#add"
                            class="btn btn-primary d-flex align-items-center"><i class="ki-duotone ki-plus fs-2"></i>
                            Tambah
                        </button>
                        <div class="modal fade" id="add" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header" id="kt_modal_add_user_header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bolder">Tambah Kota/kabupaten</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                            data-kt-users-modal-action="close">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                        rx="1" transform="rotate(-45 6 17.3137)"
                                                        fill="black" />
                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                        transform="rotate(45 7.41422 6)" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                        <form method="POST" action="{{ route('admin.kota.store') }}" class="form"
                                            action="#">
                                            @csrf
                                            <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                data-kt-scroll-activate="{default: false, lg: true}"
                                                data-kt-scroll-max-height="auto"
                                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                data-kt-scroll-offset="300px">

                                                <div class="fv-row mb-7">
                                                    <label class="required fw-bold fs-6 mb-2">Nama</label>
                                                    <input type="text" name="name"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Nama city" value="{{ old('name') }}" />
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <label class="required fw-bold fs-6 mb-2">Kode Pos</label>
                                                    <input type="number" name="postal_code"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="" value="{{ old('postal_code') }}" />
                                                    @error('postal_code')
                                                        <div class="invalid-feedback mb-3">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3"
                                                    data-kt-users-modal-action="cancel">Batal</button>
                                                <button type="submit" class="btn btn-primary"
                                                    data-kt-users-modal-action="submit">
                                                    <span class="indicator-label">Tambah</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <th class="min-w-125px">Kota/Kabupaten</th>
                                <th class="min-w-125px">slug</th>
                                <th class="min-w-125px">Kode Pos</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            @if ($city->total() == 0)
                                <tr class="max-w-10px">
                                    <td colspan="6" class="text-center">
                                        No data available in table
                                    </td>
                                </tr>
                            @else
                                @foreach ($city as $item)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1" />
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#"
                                                class="text-gray-800 text-hover-primary mb-1">{{ $item->name }}</a>
                                        </td>
                                        <td>
                                            {{ $item->slug }}
                                        </td>
                                        <td>
                                            <div class="badge badge-light fw-bolder">{{ $item->postal_code }}</div>
                                        </td>

                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <div class="menu-item px-3">

                                                    <a data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}"
                                                        class="menu-link px-3">
                                                        edit
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a data-bs-toggle="modal" data-bs-target="#delete{{ $item->id }}"
                                                        class="menu-link px-3">
                                                        delete
                                                    </a>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                    <div class="d-flex flex-stack flex-wrap my-3">
                        <div class="fs-6 fw-semibold text-gray-700">
                            Showing {{ $city->firstItem() }} to {{ $city->lastItem() }} of {{ $city->total() }}
                            records
                        </div>
                        <ul class="pagination">
                            @if ($city->onFirstPage())
                                <li class="page-item previous">
                                    <a href="#" class="page-link"><i class="previous"></i></a>
                                </li>
                            @else
                                <li class="page-item previous">
                                    <a href="{{ $city->previousPageUrl() }}" class="page-link bg-light"><i
                                            class="previous"></i></a>
                                </li>
                            @endif

                            @php
                                // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                                $start = max($city->currentPage() - 2, 1);
                                $end = min($start + 4, $city->lastPage());
                            @endphp

                            @if ($start > 1)
                                <!-- Menampilkan tanda elipsis jika halaman pertama tidak termasuk dalam tampilan -->
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                            @endif

                            @foreach ($city->getUrlRange($start, $end) as $page => $url)
                                <li class="page-item{{ $page == $city->currentPage() ? ' active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if ($end < $city->lastPage())
                                <!-- Menampilkan tanda elipsis jika halaman terakhir tidak termasuk dalam tampilan -->
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                            @endif

                            @if ($city->hasMorePages())
                                <li class="page-item next">
                                    <a href="{{ $city->nextPageUrl() }}" class="page-link bg-light"><i
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

    @foreach ($city as $item)
        <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_user_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Edit city</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <form method="POST" action="{{ route('admin.kota.update', $item->id) }}" class="form">
                            @csrf
                            @method('PUT')
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                                <div class="fv-row mb-7">
                                    <label class="required fw-bold fs-6 mb-2">Nama</label>
                                    <input type="text" name="name"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nama city"
                                        value="{{ $item->name }}" />
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-bold fs-6 mb-2">Kode Pos</label>
                                    <input type="number" name="postal_code"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="" value="{{ $item->postal_code }}" />
                                    @error('postal_code')
                                        <div class="invalid-feedback mb-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3"
                                    data-kt-users-modal-action="cancel">Batal</button>
                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Update</span>
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

    @foreach ($city as $item)
        <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_user_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Hapus city</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <form method="POST" action="{{ route('admin.kota.destroy', $item->id) }}" class="form">
                            @csrf
                            @method('delete')
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                                <label class="fw-bold fs-6 mb-2">
                                    Anda Yakinkah Ingin Menghapus kota <b>{{ $item->name }}</b> ?
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
