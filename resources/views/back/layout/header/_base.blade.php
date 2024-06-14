<!--begin::Header-->
<div
  id="kt_header"
  class="header "
      data-kt-sticky="true"
    data-kt-sticky-name="header"
    data-kt-sticky-offset="{default: '200px', lg: '300px'}"
    >
  <!--begin::Container-->
  <div class=" container-xxl  d-flex align-items-center justify-content-between" id="kt_header_container">
@include("back/layout/header/__page-title")
    <!--begin::Wrapper-->
    <div class="d-flex d-lg-none align-items-center ms-n4 me-2">
      <!--begin::Aside mobile toggle-->
      <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_mobile_toggle">
        <i class="ki-duotone ki-abstract-14 fs-1"><span class="path1"></span><span class="path2"></span></i>      </div>
      <!--end::Aside mobile toggle-->
      <!--begin::Logo-->
      <a href="?page=index" class="d-flex align-items-center">
        <img alt="Logo" src="assets/media/logos/demo7.svg" class="h-30px"/>
      </a>
      <!--end::Logo-->
    </div>
    <!--end::Wrapper-->
@include("back/layout/header/__topbar")
  </div>
  <!--end::Container-->
</div>
<!--end::Header-->