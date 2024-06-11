@extends('back.app')

@section('content')
    <!--begin::Header-->
    <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
        data-kt-sticky-offset="{default: '200px', lg: '300px'}">
        <!--begin::Container-->
        <div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0"
                data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
                <!--begin::Heading-->
                <h1 class="text-dark fw-bolder my-0 fs-2">Tambah Kategori</h1>
                <!--end::Heading-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo7/dist/index.html" class="text-muted">Produk</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Kategori</li>
                    <li class="breadcrumb-item text-dark">tambah kategori</li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Wrapper-->
            <div class="d-flex d-lg-none align-items-center ms-n2 me-2">
                <!--begin::Aside mobile toggle-->
                <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
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
                    <!--end::Svg Icon-->
                </div>
                <!--end::Aside mobile toggle-->
                <!--begin::Logo-->
                <a href="../../demo7/dist/index.html" class="d-flex align-items-center">
                    <img alt="Logo" src="assets/media/logos/logo-demo7.svg" class="h-30px" />
                </a>
                <!--end::Logo-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Toolbar wrapper-->
            <div class="d-flex flex-shrink-0">
                <!--begin::Invite user-->
                <div class="d-flex ms-3">
                    <a href="#"
                        class="btn btn-flex flex-center bg-body btn-color-gray-700 btn-active-color-primary w-40px w-md-auto h-40px px-0 px-md-6"
                        tooltip="New Member" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2 svg-icon-primary me-0 me-md-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                    transform="rotate(-90 11.364 20.364)" fill="black" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <span class="d-none d-md-inline">New Member</span>
                    </a>
                </div>
                <!--end::Invite user-->
                <!--begin::Create app-->
                <div class="d-flex ms-3">
                    <a href="#"
                        class="btn btn-flex flex-center bg-body btn-color-gray-700 btn-active-color-primary w-40px w-md-auto h-40px px-0 px-md-6"
                        tooltip="New App" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app"
                        id="kt_toolbar_primary_button">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
                        <span class="svg-icon svg-icon-2 svg-icon-primary me-0 me-md-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path opacity="0.3"
                                    d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z"
                                    fill="black" />
                                <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <span class="d-none d-md-inline">New App</span>
                    </a>
                </div>
                <!--end::Create app-->
                <!--begin::Chat-->
                <div class="d-flex align-items-center ms-3">
                    <!--begin::Menu wrapper-->
                    <div class="btn btn-icon btn-primary w-40px h-40px pulse pulse-white" id="kt_drawer_chat_toggle">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path opacity="0.3"
                                    d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z"
                                    fill="black" />
                                <rect x="6" y="12" width="7" height="2" rx="1" fill="black" />
                                <rect x="6" y="7" width="12" height="2" rx="1" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <span class="pulse-ring"></span>
                    </div>
                    <!--end::Menu wrapper-->
                </div>
                <!--end::Chat-->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Header-->

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class=" container-xxl " id="kt_content_container">
            <form id="kt_ecommerce_add_category_form"
                class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework"
                data-kt-redirect="/metronic8/demo7/apps/ecommerce/catalog/categories.html">
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Thumbnail</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <!--begin::Image input placeholder-->
                            <style>
                                .image-input-placeholder {
                                    background-image: url('/metronic8/demo7/assets/media/svg/files/blank-image.svg');
                                }

                                [data-bs-theme="dark"] .image-input-placeholder {
                                    background-image: url('/metronic8/demo7/assets/media/svg/files/blank-image-dark.svg');
                                }
                            </style>
                            <!--end::Image input placeholder-->

                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->

                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                    aria-label="Change avatar" data-bs-original-title="Change avatar"
                                    data-kt-initialized="1">
                                    <!--begin::Icon-->
                                    <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                            class="path2"></span></i> <!--end::Icon-->

                                    <!--begin::Inputs-->
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="avatar_remove">
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->

                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                    aria-label="Cancel avatar" data-bs-original-title="Cancel avatar"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                            class="path2"></span></i> </span>
                                <!--end::Cancel-->

                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                    aria-label="Remove avatar" data-bs-original-title="Remove avatar"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                            class="path2"></span></i> </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->

                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg and *.jpeg
                                image files are accepted</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Thumbnail settings-->
                    <!--begin::Status-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Status</h2>
                            </div>
                            <!--end::Card title-->

                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px"
                                    id="kt_ecommerce_add_category_status">
                                </div>
                            </div>
                            <!--begin::Card toolbar-->
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <select class="form-select mb-2 select2-hidden-accessible" data-control="select2"
                                data-hide-search="true" data-placeholder="Select an option"
                                id="kt_ecommerce_add_category_status_select"
                                data-select2-id="select2-data-kt_ecommerce_add_category_status_select" tabindex="-1"
                                aria-hidden="true" data-kt-initialized="1">
                                <option></option>
                                <option value="published" selected="" data-select2-id="select2-data-10-koue">Published
                                </option>
                                <option value="unpublished">Unpublished</option>
                            </select>
                            <!--end::Select2-->

                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the category status.</div>
                            <!--end::Description-->

                            <!--begin::Datepicker-->
                            <div class="d-none mt-10">
                                <label for="kt_ecommerce_add_category_status_datepicker" class="form-label">Select
                                    publishing date and time</label>
                                <input class="form-control flatpickr-input"
                                    id="kt_ecommerce_add_category_status_datepicker" placeholder="Pick date &amp; time"
                                    type="text" readonly="readonly">
                            </div>
                            <!--end::Datepicker-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Status-->
                </div>
                <!--end::Aside column-->

                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="required form-label">Category Name</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" name="category_name" class="form-control mb-2"
                                    placeholder="Product name" value="">
                                <!--end::Input-->

                                <!--begin::Description-->
                                <div class="text-muted fs-7">A category name is required and recommended to be unique.
                                </div>
                                <!--end::Description-->
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label">Description</label>
                                <!--end::Label-->

                                <!--begin::Editor-->
                                <div id="editor" name="description" class="min-h-100px mb-2"></div>
                                <!--end::Editor-->

                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a description to the category for better visibility.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                    <!--begin::Meta options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Meta Options</h2>
                            </div>
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label">Meta Tag Title</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" class="form-control mb-2" name="meta_title"
                                    placeholder="Meta tag name">
                                <!--end::Input-->

                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise
                                    keywords.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label">Meta Tag Description</label>
                                <!--end::Label-->

                                <!--begin::Editor-->
                                <div id="editor2" name="meta_description" class="min-h-100px mb-2"></div>
                                <!--end::Editor-->

                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a meta tag description to the category for increased SEO
                                    ranking.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label">Meta Tag Keywords</label>
                                <!--end::Label-->

                                <!--begin::Editor-->
                                <input type="text" name="meta_keywords" data-kt-tags="true"
                                    data-kt-placeholder="Enter keywords" data-kt-tagify="true"
                                    class="form-control tagify px-3" placeholder="Enter keywords" value="">
                                <!--end::Editor-->

                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a list of keywords that the category is related to.
                                    Separate the keywords by adding a comma <code>,</code> between each keyword.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Meta options-->

                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="/metronic8/demo7/apps/ecommerce/catalog/products.html"
                            id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">
                            Cancel
                        </a>
                        <!--end::Button-->

                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span class="indicator-label">
                                Save Changes
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('scripts')
    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <!-- Include the Tagify library -->
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
