@extends('back.app')

@section('styles')
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
                        <h3 class="fw-bold m-0">Detail Profile</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" class="form" method="POST" action="{{ route("account.profile.update") }}">
                        @method('PUT')
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('{{ asset('back/media/svg/avatars/blank.svg') }}')">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url('@if ($user->photo) {{ Storage::url( "images/user". $user->photo) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $user->name }} @endif')">
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
                                            <input type="file" name="photo" accept=".png, .jpg, .jpeg" />
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
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Lengkap</label>
                                <!--end::Label-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="name"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Nama Lengkap" value="{{ $user->name }}" required />
                                </div>
                                <!--end::Row-->

                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jenis Kelamin</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select name="gender" id="" required
                                        class="form-select form-select-solid form-select-lg fw-semibold">
                                        <option value="laki-laki" @if ($user->gender == 'laki-laki') selected @endif>
                                            Laki-laki</option>
                                        <option value="perempuan" @if ($user->gender == 'perempuan') selected @endif>
                                            Perempuan</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    <span class="required">Nomor Telepon</span>
                                    <span class="ms-1" data-bs-toggle="tooltip"
                                        title="Nomor Telepon Disarankan Terintegrasi Dengan Whatsapp">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="tel" name="phone"
                                        class="form-control form-control-lg form-control-solid" placeholder="Nomor Telepon"
                                        value="{{ $user->phone }}" name="phone" required />
                                </div>
                                <!--end::Col-->
                            </div>

                        </div>
                        <!--end::Card body-->
                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Batal</button>
                            <button type="submit" class="btn btn-primary" >Simpan Perubahan</button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->
            <!--begin::Sign-in Method-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_signin_method">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Metode Masuk</h3>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_signin_method" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Email Address-->
                        <div class="d-flex flex-wrap align-items-center">
                            <!--begin::Label-->
                            <div id="kt_signin_email">
                                <div class="fs-6 fw-bold mb-1">Email Address</div>
                                <div class="fw-semibold text-gray-600">{{ $user->email }}</div>
                            </div>
                            <!--end::Label-->
                            <!--begin::Edit-->
                            <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                <!--begin::Form-->
                                <form id="kt_signin_change_email" class="form" novalidate="novalidate" method="POST" action="{{ route("account.profile.changeEmail") }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="row mb-6">
                                        <div class="col-lg-6 mb-4 mb-lg-0">
                                            <div class="fv-row mb-0">
                                                <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Masukkan Email Baru</label>
                                                <input type="email"
                                                    class="form-control form-control-lg form-control-solid"
                                                    id="emailaddress" placeholder="Email Address" name="email"
                                                    value="{{ $user->email }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="fv-row mb-0">
                                                <label for="confirmemailpassword"
                                                    class="form-label fs-6 fw-bold mb-3">Konfirmasi Password</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="password" id="confirmemailpassword" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button  type="submit"
                                            class="btn btn-primary me-2 px-6">Update Email</button>
                                        <button id="kt_signin_cancel" type="button"
                                            class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Edit-->
                            <!--begin::Action-->
                            <div id="kt_signin_email_button" class="ms-auto">
                                <button class="btn btn-light btn-active-light-primary">Change Email</button>
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Email Address-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-6"></div>
                        <!--end::Separator-->
                        <!--begin::Password-->
                        <div class="d-flex flex-wrap align-items-center mb-10">
                            <!--begin::Label-->
                            <div id="kt_signin_password">
                                <div class="fs-6 fw-bold mb-1">Password</div>
                                <div class="fw-semibold text-gray-600">************</div>
                            </div>
                            <!--end::Label-->
                            <!--begin::Edit-->
                            <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                <!--begin::Form-->
                                <form id="kt_signin_change_password" class="form" novalidate="novalidate" method="POST" action="{{ route("account.profile.changePassword") }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="row mb-1">
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Password Sekarang</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="old_password" id="currentpassword" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="newpassword" class="form-label fs-6 fw-bold mb-3">Password Baru</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="password" id="newpassword" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Konfirmasi Password Baru</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="confirmpassword" id="confirmpassword" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-text mb-5">Password must be at least 8 character and contain symbols
                                    </div>
                                    <div class="d-flex">
                                        <button id="kt_password_submit" type="submit"
                                            class="btn btn-primary me-2 px-6">Update Password</button>
                                        <button id="kt_password_cancel" type="button"
                                            class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Edit-->
                            <!--begin::Action-->
                            <div id="kt_signin_password_button" class="ms-auto">
                                <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Password-->
                        <!--begin::Notice-->
                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-shield-tick fs-2tx text-primary me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <!--begin::Content-->
                                <div class="mb-3 mb-md-0 fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">Amankan Akun Anda</h4>
                                    <div class="fs-6 text-gray-700 pe-7">Autentikasi dua faktor menambahkan lapisan
                                        keamanan ekstra pada akun Anda. Untuk masuk, sebagai tambahan, Anda harus memberikan
                                        kode 6 digit</div>
                                </div>
                                <!--end::Content-->
                                <!--begin::Action-->
                                <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap"
                                    data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">Enable</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Sign-in Method-->
            <!--begin::Deactivate Account-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Menonaktifkan Akun</h3>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_deactivate" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_deactivate_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Notice-->
                            <div
                                class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                                <!--begin::Icon-->
                                <i class="ki-duotone ki-information fs-2tx text-warning me-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">Anda Menonaktifkan Akun Anda</h4>
                                        <div class="fs-6 text-gray-700">Untuk keamanan ekstra, ini mengharuskan Anda
                                            mengonfirmasi email atau nomor telepon saat Anda mengatur ulang kata sandi Anda
                                            <br />
                                            <a class="fw-bold" href="#">Pelajari lebih lanjut</a>
                                        </div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Notice-->
                            <!--begin::Form input row-->
                            <div class="form-check form-check-solid fv-row">
                                <input name="deactivate" class="form-check-input" type="checkbox" value=""
                                    id="deactivate" />
                                <label class="form-check-label fw-semibold ps-2 fs-6" for="deactivate">Saya mengonfirmasi
                                    penonaktifan akun saya</label>
                            </div>
                            <!--end::Form input row-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button id="kt_account_deactivate_account_submit" type="submit"
                                class="btn btn-danger fw-semibold">Nonaktifkan Akun</button>
                        </div>
                        <!--end::Card footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Deactivate Account-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('back/js/custom/account/settings/signin-methods.js') }}"></script>
    <script src="{{ asset('back/js/custom/account/settings/deactivate-account.js') }}"></script>
    <script src="{{ asset('back/js/custom/account/settings/profile-details.js') }}"></script>
    <script src="{{ asset('back/js/custom/pages/user-profile/general.js') }}"></script>
@endsection
