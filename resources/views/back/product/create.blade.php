@extends('back.app')
@section('content')
    <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
        data-kt-sticky-offset="{default: '200px', lg: '300px'}">
        <div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
            <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0"
                data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
                <h1 class="text-dark fw-bolder my-0 fs-2">Tambah Produk</h1>
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo7/dist/index.html" class="text-muted">product</a>
                    </li>
                    <li class="breadcrumb-item text-dark">Tambah Produk</li>
                </ul>
            </div>
            <div class="d-flex d-lg-none align-items-center ms-n2 me-2">
                <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
                    <span class="svg-icon svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                fill="black" />
                            <path opacity="0.3"
                                d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                fill="black" />
                        </svg>
                    </span>
                </div>
                <a href="../../demo7/dist/index.html" class="d-flex align-items-center">
                    <img alt="Logo" src="assets/media/logos/logo-demo7.svg" class="h-30px" />
                </a>
            </div>
        </div>
    </div>
        <div class=" container-xxl " id="kt_content_container">
            <form id="kt_ecommerce_add_category_form"
                class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Foto Produk</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-empty" data-kt-image-input="true">
                                <div class="image-input-wrapper w-200px h-150px"
                                    style="background-image: url('{{ asset('back/media/svg/files/blank-image.svg') }}')">
                                </div>
                                <label
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Change thumbnail">
                                    <i class="bi bi-pencil"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" required />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                                <span
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Cancel thumbnail">
                                    <i class="bi bi-x fs-3"></i>
                                </span>
                                <span
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Remove thumbnail">
                                    <i class="bi bi-x fs-3"></i>
                                </span>
                            </div>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="text-muted fs-7 pt-3">File yang diizinkan: *.png, *.jpg, *.jpeg <br>Maksimal 2mb
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2 class="">Toko</h2>
                            </div>
                            <div class="card-toolbar">
                            </div>
                        </div>
                        <div class="card-body py-0">

                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <select class="form-select mb-2" name="shop_id" id="select2" required>
                                    @foreach ($shop as $itemShop)
                                        <option @if (old('shop_id') == $itemShop->id) selected @endif
                                            value="{{ $itemShop->id }}">
                                            {{ $itemShop->name }}</option>
                                    @endforeach

                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-body py-0">

                            <div class="card card-flush py-4">
                                <a href="https://demo.gariskode.com/menu/hotel" class="btn btn-light-primary">Batal</a>
                                <button type="submit" class="btn btn-primary mt-4">Publish</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Informasi umum</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="fv-row fv-plugins-icon-container">
                                <label class="required form-label">Nama Produk</label>
                                <input type="text" name="name" class="form-control mb-2" placeholder="produk Saya"
                                    value="{{ old('name') }}" required>

                            </div>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-body pt-0">
                            <div class="fv-row fv-plugins-icon-container">

                                <label class="form-label required">Deskripsi Singkat Produk</label>
                                <textarea name="short_description" class="form-control mb-2" placeholder="Deskripsi produk" required>{{ old('short_description') }}</textarea>
                            </div>
                            @error('short_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-body pt-0">
                            <div class="fv-row fv-plugins-icon-container">

                                <label class="form-label required">Deskripsi Produk</label>
                                <div id="editor" class="min-h-200px mb-2">{{ old('description') }}
                                    <p></p>
                                </div>
                                <input type="hidden" id="description_quill" name="description">
                            </div>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Informasi Produk</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-wrap gap-5">
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="required form-label">Harga (RP.)</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        <input type="number" name="price" class="form-control mb-2" value="{{ old('price') }}" required>
                                    </div>
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Diskon (%)</label>
                                    <div class="input-group mb-3">
                                        <input type="number" name="discount" class="form-control mb-2" value="{{ old('discount') }}">
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                    </div>
                                    @error('discount')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label required">stok</label>
                                    <input type="number" name="stock" class="form-control mb-2"
                                        value="{{ old('stock') }}" required>
                                    @error('stock')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Kategori Produk</label>
                                <select class="form-select mb-2 select2-hidden-accessible" id="select2p2"
                                    name="product_categories_id" required>

                                    @foreach ($product_categories as $cat)
                                        <option @if (old('product_categories_id') == $cat->id) selected @endif
                                            value="{{ $cat->id }}">
                                            {{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_categories_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Berat</label>
                                <input type="number" name="weight" class="form-control mb-2"
                                    placeholder="Berat Produk" value="{{ old('weight') }}" required>
                                @error('weight')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="form-label">ukuran</label>
                                <div class="mb-5 mt-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="size[]" value="S"
                                            id="sizeS">
                                        <label class="form-check-label" for="sizeS">S</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="size[]" value="M"
                                            id="sizeM">
                                        <label class="form-check-label" for="sizeM">M</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="size[]" value="L"
                                            id="sizeL">
                                        <label class="form-check-label" for="sizeL">L</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="size[]" value="XL"
                                            id="sizeXL">
                                        <label class="form-check-label" for="sizeXL">XL</label>
                                    </div>
                                </div>
                                <div class="">
                                    @for ($i = 32; $i <= 45; $i++)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="size[]" value="{{ $i }}"
                                                id="size{{ $i }}">
                                            <label class="form-check-label" for="size{{ $i }}">{{ $i }}</label>
                                        </div>
                                    @endfor


                                </div>

                            </div>

                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Nama Merk</label>
                                <input type="text" name="brand" class="form-control mb-2"
                                    placeholder="Brand Produk" value="{{ old('brand') }}" required>
                                @error('brand')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Meta Options</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10">
                                <label class="form-label">Meta Tag Title</label>
                                <input type="text" name="meta_title" class="form-control mb-2"
                                    placeholder="Meta Tag Title" value="{{ old('meta_title') }}">
                                <div class="text-muted fs-7">Set a meta tag title to the shop for increased SEO ranking.
                                </div>
                                @error('meta_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-10">
                                <label class="form-label">Meta Tag Description</label>
                                <div id="editor2" class="min-h-150px mb-2">
                                    -
                                    {{ old('meta_description') }}
                                </div>
                                <input type="hidden" id="meta_description_quill" name="meta_description">
                                <div class="text-muted fs-7">Set a meta tag description to the shop for increased
                                    SEO
                                    ranking.</div>

                                @error('meta_description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label class="form-label">Meta Tag Keywords</label>
                                <input type="text" name="meta_keywords" data-kt-tags="true"
                                    data-kt-placeholder="Enter keywords" data-kt-tagify="true"
                                    class="form-control tagify px-3" placeholder="Enter keywords" value="">
                                <div class="text-muted fs-7">Set a list of keywords that the shop is related to.
                                    Separate the keywords by adding a comma <code>,</code> between each keyword.</div>
                                @error('meta_keywords')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.26.5/dist/tagify.min.js"></script>
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });

        var quillEditor = document.getElementById('description_quill');
        quill.on('text-change', function() {
            quillEditor.value = quill.root.innerHTML;
        });

        const quill2 = new Quill('#editor2', {
            theme: 'snow'
        });

        var quillEditor2 = document.getElementById('meta_description_quill');
        quill2.on('text-change', function() {
            quillEditor2.value = quill2.root.innerHTML;
        });

        const input = document.querySelector('input[name=meta_keywords]');
        new Tagify(input);

        $(document).ready(function() {
            $('#select2').select2();
            $('#select2p2').select2();
        });
    </script>
@endsection
