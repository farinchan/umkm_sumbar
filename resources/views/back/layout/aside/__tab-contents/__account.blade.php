<!--begin::Notifications-->
<div class="mx-5">
    <!--begin::Header-->
    <h3 class="fw-bold text-gray-900 mb-10 mx-0">Notifications</h3>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="mb-12">
        <div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
            <!--begin::Icon-->
            <span class="svg-icon text-success me-5">
                <i class="ki-duotone ki-user fs-1 text-success">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <!--end::Icon-->
            <!--begin::Title-->
            <div class="flex-grow-1 me-2">
                <a href="{{ route('account.profile') }}" class="fw-bold text-gray-800 text-hover-primary fs-6">Profil Saya</a>
                <span class="text-muted fw-semibold d-block">{{ Auth::user()->name }}</span>
            </div>
            <!--end::Title-->
            <!--begin::Lable-->
            <span class="fw-bold text-success py-1"> > </span>
            <!--end::Lable-->
        </div>

        <div class="d-flex align-items-center bg-light-danger rounded p-5 mb-7">
            <!--begin::Icon-->
            <span class="svg-icon text-danger me-5">
                <i class="ki-duotone ki-handcart fs-1 text-danger"> </i>
            </span>
            <!--end::Icon-->
            <!--begin::Title-->
            <div class="flex-grow-1 me-2">
                <a href="?page=widgets/lists" class="fw-bold text-gray-800 text-hover-primary fs-6"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">Keranjang Belanja</a>
                <span class="text-muted fw-semibold d-block">Total (0) Produk Dalam keranjang</span>
            </div>
            <!--end::Title-->
            <!--begin::Lable-->
            <span class="fw-bold text-danger py-1"> > </span>
            <!--end::Lable-->
        </div>

        <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
            <!--begin::Icon-->
            <span class="svg-icon text-danger me-5">
                <i class="ki-duotone ki-medal-star fs-1 text-warning ">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                </i>
            </span>
            <!--end::Icon-->
            <!--begin::Title-->
            <div class="flex-grow-1 me-2">
                <a href="?page=widgets/lists" class="fw-bold text-gray-800 text-hover-primary fs-6"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">Penilaian Produk</a>
                <span class="text-muted fw-semibold d-block">Total ({{ Auth::user()->Review->count() }}) Penilaianku Terhadap Produk</span>
            </div>
            <!--end::Title-->
            <!--begin::Lable-->
            <span class="fw-bold text-danger py-1"> > </span>
            <!--end::Lable-->
        </div>
    </div>
    <!--end::Body-->
</div>
<!--end::Notifications-->
