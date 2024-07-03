@extends('back.app')
@section('seo')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details" aria-expanded="true"
                    aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Banner 1</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" class="form" method="POST" enctype="multipart/form-data"
                        action="{{ route('admin.setting.banner-update', 1) }}">
                        @method('PUT')
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="mb-6">
                                <!--begin::Label-->
                                <label class="form-label">Judul</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div>
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('{{ asset('back/media/svg/avatars/blank.svg') }}')">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px "
                                            style="background-image: url('{{ Storage::url("images/banner/".$banner1->image) }}')">
                                        </div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">Menerima File Tipe: png, jpg, jpeg.</div>
                                    <div class="form-text">Disarankan banner ukuran 1450px x 750px.</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>

                            <div class="mb-6">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control form-control-solid" name="title"
                                  value="{{ $banner1->title }}"   placeholder="Judul Banner" required>
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Sub Judul</label>
                                <input type="text" class="form-control form-control-solid" name="subtitle"
                                value="{{ $banner1->subtitle }}"  placeholder="Sub Judul Banner" required>
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Remote URL</label>
                                <input type="url" class="form-control form-control-solid" name="url"
                                value="{{ $banner1->url }}"   placeholder="URL Tujuan" required>
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Status Aktif Banner</label>
                                <div class="form-check form-switch form-check-custom form-check-solid"> 
                                    <input class="form-check-input" type="checkbox" value="1" id="flexSwitchChecked" name="status"
                                     @if ($banner1->status == 1)
                                          checked
                                     @endif    />
                                </div>
                            </div>

                        </div>
                        <!--end::Card body-->
                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details" aria-expanded="true"
                    aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Banner 2</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" class="form" method="POST" enctype="multipart/form-data"
                        action="{{ route('admin.setting.banner-update', 2) }}">
                        @method('PUT')
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="mb-6">
                                <!--begin::Label-->
                                <label class="form-label">Judul</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div>
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('{{ asset('back/media/svg/avatars/blank.svg') }}')">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px "
                                            style="background-image: url('{{ Storage::url("images/banner/".$banner2->image) }}')">
                                        </div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">Menerima File Tipe: png, jpg, jpeg.</div>
                                    <div class="form-text">Disarankan banner ukuran 1450px x 750px.</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>

                            <div class="mb-6">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control form-control-solid" name="title"
                                  value="{{ $banner2->title }}"   placeholder="Judul Banner" required>
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Sub Judul</label>
                                <input type="text" class="form-control form-control-solid" name="subtitle"
                                value="{{ $banner2->subtitle }}"  placeholder="Sub Judul Banner" required>
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Remote URL</label>
                                <input type="url" class="form-control form-control-solid" name="url"
                                value="{{ $banner2->url }}"   placeholder="URL Tujuan" required>
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Status Aktif Banner</label>
                                <div class="form-check form-switch form-check-custom form-check-solid"> 
                                    <input class="form-check-input" type="checkbox" value="1" id="flexSwitchChecked" name="status"
                                     @if ($banner2->status == 1)
                                          checked
                                     @endif    />
                                </div>
                            </div>

                        </div>
                        <!--end::Card body-->
                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details" aria-expanded="true"
                    aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Banner 3</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" class="form" method="POST" enctype="multipart/form-data"
                        action="{{ route('admin.setting.banner-update', 3) }}">
                        @method('PUT')
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="mb-6">
                                <!--begin::Label-->
                                <label class="form-label">Judul</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div>
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('{{ asset('back/media/svg/avatars/blank.svg') }}')">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px "
                                            style="background-image: url('{{ Storage::url("images/banner/".$banner3->image) }}')">
                                        </div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">Menerima File Tipe: png, jpg, jpeg.</div>
                                    <div class="form-text">Disarankan banner ukuran 1450px x 750px.</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>

                            <div class="mb-6">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control form-control-solid" name="title"
                                  value="{{ $banner3->title }}"   placeholder="Judul Banner" required>
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Sub Judul</label>
                                <input type="text" class="form-control form-control-solid" name="subtitle"
                                value="{{ $banner3->subtitle }}"  placeholder="Sub Judul Banner" required>
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Remote URL</label>
                                <input type="url" class="form-control form-control-solid" name="url"
                                value="{{ $banner3->url }}"   placeholder="URL Tujuan" required>
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Status Aktif Banner</label>
                                <div class="form-check form-switch form-check-custom form-check-solid"> 
                                    <input class="form-check-input" type="checkbox" value="1" id="flexSwitchChecked" name="status"
                                     @if ($banner3->status == 1)
                                          checked
                                     @endif    />
                                </div>
                            </div>

                        </div>
                        <!--end::Card body-->
                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('scripts')
    </script>
@endsection
