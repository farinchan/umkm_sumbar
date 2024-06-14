<div class="d-flex h-100 flex-column">
    <!--begin::Wrapper-->
    <div class="flex-column-fluid hover-scroll-y" data-kt-scroll="true" data-kt-scroll-activate="true"
        data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_wordspace"
        data-kt-scroll-dependencies="#kt_aside_secondary_footer" data-kt-scroll-offset="0px">
        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab pane-->
            <div class="tab-pane fade active show" id="kt_aside_nav_tab_projects" role="tabpanel">
                @include('back/layout/aside/__tab-contents/__projects')
            </div>
            <!--end::Tab pane-->
            <!--begin::Tab pane-->
            <div class="tab-pane fade " id="kt_aside_nav_tab_menu" role="tabpanel">
                @include('back/layout/aside/__tab-contents/__menu_admin')
            </div>
            <!--end::Tab pane-->
            <!--begin::Tab pane-->
            <div class="tab-pane fade" id="kt_aside_nav_tab_subscription" role="tabpanel">
                @include('back/layout/aside/__tab-contents/__subscription')
            </div>
            <!--end::Tab pane-->
        </div>
        <!--end::Tab content-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Footer-->
    <div class="flex-column-auto pt-10 px-5" id="kt_aside_secondary_footer">
        <a href="https://preview.keenthemes.com/html/metronic/docs"
            class="btn btn-bg-light btn-color-gray-600 btn-flex btn-active-color-primary flex-center w-100"
            data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-trigger="hover" data-bs-offset="0,5"
            data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins">
            <span class="btn-label">
                Ke Web Utama
            </span>
            <i class="ki-duotone ki-document btn-icon fs-4 ms-2"><span class="path1"></span><span
                    class="path2"></span></i> </a>
    </div>
    <!--end::Footer-->
</div>
