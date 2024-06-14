<!--begin::Toolbar wrapper-->
<div class="d-flex flex-shrink-0">
    <!--begin::Invite user-->
    <div class="d-flex ms-3">
        <a href="#" class="btn btn-flex flex-center btn-light btn-color-gray-600 btn-active-primary w-40px w-md-auto h-40px px-0 px-md-6"  data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends" >
            <i class="ki-duotone ki-plus fs-2 me-0 me-md-2"></i>            <span class="d-none d-md-inline">New Member</span>
        </a>
    </div>
    <!--end::Invite user-->
    <!--begin::Create app-->
    <div class="d-flex ms-3">
        <a href="#" class="btn btn-flex btn-light flex-center btn-color-gray-600 btn-active-primary w-40px w-md-auto h-40px px-0 px-md-6"  data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">
            <i class="ki-duotone ki-document fs-2 me-0 me-md-2"><span class="path1"></span><span class="path2"></span></i>            <span class="d-none d-md-inline">New App</span>
        </a>
    </div>
    <!--end::Create app-->
    <!--begin::Theme mode-->
    <div class="d-flex align-items-center ms-3">
@include("back/partials/theme-mode/_main")
    </div>
    <!--end::Theme mode-->
    <!--begin::Chat-->
    <div class="d-flex align-items-center ms-3">
        <!--begin::Menu wrapper-->
        <div class="btn btn-icon btn-primary w-40px h-40px pulse pulse-white"  id="kt_drawer_chat_toggle">
            <i class="ki-duotone ki-message-text-2 fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>            <span class="pulse-ring"></span>
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::Chat-->
</div>
<!--end::Toolbar wrapper-->