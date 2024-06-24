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
                                    <a href="#" class="btn btn-sm btn-primary me-3">Edit Toko</a>
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
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6"
                                href="{{ route('admin.product.detail', $product->id) }}">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6 active"
                                href="{{ route('admin.product.detail-image', $product->id) }}">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6"
                                href="{{ route('admin.product.detail-review', $product->id) }}">Penilaian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6"
                                href="{{ route('admin.product.detail-viewer', $product->id) }}">Pengunjung</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-6 mt-10">

                <div class="row">

                    @foreach ($product_image as $image)
                        <div class="col-auto">
                            <div class="image-input image-input-outline">
                                <div class="image-input-wrapper w-125px h-125px"
                                    style="background-image: url('{{ Storage::url('images/product/' . $image->image) }}')">
                                </div>
                                <form action="{{ route('admin.product.detail-image-destroy', $image->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        aria-label="Hapus Gambar" data-bs-original-title="Hapus Gambar"
                                        data-kt-initialized="1">
                                        <span class="svg-icon svg-icon-primary svg-icon-1x">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <button data-bs-toggle="modal" data-bs-target="#upload" class="btn btn-primary btn-icon btn-lg rounded-pill"
        style="position:absolute;bottom:10%;right:10%;">
        <i class="ki-duotone ki-file-up fs-1">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </button>
    <div class="modal fade" tabindex="-1" id="upload">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ route('admin.product.detail-image-store', $product->id) }}"
                enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title">Upload Gambar</h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body">
                    <input type="file" name="image" class="form-control form-control-solid">
                    <small class="text-muted ms-2 pt-2">File yang diizinkan: *.png, *.jpg, *.jpeg. Maksimal 2mb</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
