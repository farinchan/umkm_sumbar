<!--begin::Page title-->
<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap mt-n5 mt-lg-0 me-lg-2 pb-2 pb-lg-0"
    data-kt-swapper="true" data-kt-swapper-mode="prepend"
    data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
    <!--begin::Heading-->
    <h1 class="text-gray-900 fw-bold my-0 fs-2">
        {{ $title ?? '' }} </h1>
    <!--end::Heading-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb fw-semibold fs-base my-1">
        <li class="breadcrumb-item text-muted">
            <a href="?page=index" class="text-muted text-hover-primary">
                {{ $menu_title ?? "-" }} </a>
        </li>
        @if (isset($submenu_title))
            <li class="breadcrumb-item text-muted">
                <a href="?page=index" class="text-muted text-hover-primary">
                    {{ $submenu_title }} </a>
            </li>
        @endif
        <li class="breadcrumb-item text-gray-900">
            {{ $title ?? "-" }} </li>
    </ul>
    <!--end::Breadcrumb-->
</div>
<!--end::Page title--->
