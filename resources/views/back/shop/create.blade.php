@extends('back.app')
@section('content')
    <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
        data-kt-sticky-offset="{default: '200px', lg: '300px'}">
        <div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
            <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0"
                data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
                <h1 class="text-dark fw-bolder my-0 fs-2">Buat Toko</h1>
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo7/dist/index.html" class="text-muted">Toko</a>
                    </li>
                    <li class="breadcrumb-item text-dark">Buat Toko</li>
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
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class=" container-xxl " id="kt_content_container">
            <form id="kt_ecommerce_add_category_form"
                class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework"
                data-kt-redirect="/metronic8/demo7/apps/ecommerce/catalog/categories.html">
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Logo</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <style>
                                .image-input-placeholder {
                                    background-image: url('/metronic8/demo7/assets/media/svg/files/blank-image.svg');
                                }
                                [data-bs-theme="dark"] .image-input-placeholder {
                                    background-image: url('/metronic8/demo7/assets/media/svg/files/blank-image-dark.svg');
                                }
                            </style>
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                    aria-label="Change avatar" data-bs-original-title="Change avatar"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="avatar_remove">
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                    aria-label="Cancel avatar" data-bs-original-title="Cancel avatar"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                            class="path2"></span></i> </span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                    aria-label="Remove avatar" data-bs-original-title="Remove avatar"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                            class="path2"></span></i> </span>
                            </div>
                            <div class="text-muted fs-7">Atur gambar logo toko. Hanya file gambar *.png, *.jpg, dan *.jpeg yang diterima</div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Owner</h2>
                            </div>
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px"
                                    id="kt_ecommerce_add_category_status">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            
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
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Nama Toko</label>
                                <input type="text" name="category_name" class="form-control mb-2"
                                    placeholder="Toko Saya" value="">
                                <div class="text-muted fs-7">Nama Toko disarankan untuk diberi sama dengan toko fisik.
                                </div>
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Email Toko</label>
                                <input type="text" name="category_name" class="form-control mb-2"
                                    placeholder="tokosaya@email.com" value="">
                                </div>
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Nomor Telephone Toko</label>
                                <input type="text" name="category_name" class="form-control mb-2"
                                    placeholder="08xxxxxxxxx" value="">
                                </div>
                                <div class="text-muted fs-7">Nomor telepon disarankan terintegrasi dengan whatsapp.
                                </div>
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div>
                                <label class="form-label">Deksripsi toko</label>
                                <div id="editor" name="description" class="min-h-100px mb-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Informasi Lokasi</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Nama Toko</label>
                                <input type="text" name="category_name" class="form-control mb-2"
                                    placeholder="Toko Saya" value="">
                                <div class="text-muted fs-7">Nama Toko disarankan untuk diberi sama dengan toko fisik.
                                </div>
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Email Toko</label>
                                <input type="text" name="category_name" class="form-control mb-2"
                                    placeholder="tokosaya@email.com" value="">
                                </div>
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Nomor Telephone Toko</label>
                                <input type="text" name="category_name" class="form-control mb-2"
                                    placeholder="08xxxxxxxxx" value="">
                                </div>
                                <div class="text-muted fs-7">Nomor telepon disarankan terintegrasi dengan whatsapp.
                                </div>
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div>
                                <label class="form-label">Deksripsi toko</label>
                                <div id="editor" name="description" class="min-h-100px mb-2"></div>
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
                                <input type="text" class="form-control mb-2" name="meta_title"
                                    placeholder="Meta tag name">
                                <div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise
                                    keywords.</div>
                            </div>
                            <div class="mb-10">
                                <label class="form-label">Meta Tag Description</label>
                                <div id="editor2" name="meta_description" class="min-h-100px mb-2"></div>
                                <div class="text-muted fs-7">Set a meta tag description to the category for increased SEO
                                    ranking.</div>
                            </div>
                            <div>
                                <label class="form-label">Meta Tag Keywords</label>
                                <input type="text" name="meta_keywords" data-kt-tags="true"
                                    data-kt-placeholder="Enter keywords" data-kt-tagify="true"
                                    class="form-control tagify px-3" placeholder="Enter keywords" value="">
                                <div class="text-muted fs-7">Set a list of keywords that the category is related to.
                                    Separate the keywords by adding a comma <code>,</code> between each keyword.</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="/metronic8/demo7/apps/ecommerce/catalog/products.html"
                            id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">
                            Cancel
                        </a>
                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span class="indicator-label">
                                Save Changes
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.26.5/dist/tagify.min.js"></script>
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });
        const quill2 = new Quill('#editor2', {
            theme: 'snow'
        });
        const input = document.querySelector('input[name=meta_keywords]');
        new Tagify(input);
    </script>
@endsection
