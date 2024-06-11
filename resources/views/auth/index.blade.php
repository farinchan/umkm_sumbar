@extends('front.app')

@section('seo')
@endsection

@section('content')
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Auth</li>
                </ul>
            </div>
            <h1>Masuk Atau Daftar Akun</h1>
        </div>
        <!-- /page_header -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8">
                <div class="box_account">
                    <h3 class="client">Sudah Punya Akun</h3>
                    <div class="form_container">
                        <form action="{{ route('login.post') }}" method="post">
                            @csrf

                            @if (session()->has('warning'))
                                <div
                                    class="alert alert-dismissible bg-accent-1-05 d-flex align-items-center flex-column flex-sm-row p-4 rounded mb-4">
                                    <div class="d-flex flex-column text-light pe-0">
                                        <h6 class="mb-2 text-danger d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-exclamation-triangle-fill me-2"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                            </svg>
                                            Failed
                                        </h6>
                                        <span class="fw-bold">{{ session('warning') }}</span>
                                    </div>
                                </div>
                            @elseif (session()->has('error'))
                                <div
                                    class="alert alert-dismissible bg-accent-1-05 d-flex align-items-center flex-column flex-sm-row p-4 rounded mb-4">
                                    <div class="d-flex flex-column text-light pe-0">
                                        <h6 class="mb-2 text-light  d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-exclamation-triangle-fill me-2"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                            </svg>
                                            Failed
                                        </h6>
                                        <span class="fw-bold">{{ session('error') }}</span>
                                    </div>
                                </div>
                            @elseif (session()->has('success'))
                                <div
                                    class="alert alert-dismissible bg-accent-1-05 d-flex align-items-center flex-column flex-sm-row p-4 rounded mb-4">
                                    <div class="d-flex flex-column text-light pe-0">
                                        <h6 class="mb-2 text-light  d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-check2-circle me-2" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                                                <path
                                                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                            </svg>
                                            Success
                                        </h6>
                                        <span class="fw-bold">{{ session('success') }}</span>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" value="{{ old('email') }}" placeholder="Email*">
                            </div>
                            @error('email')
                                <div class="invalid-feedback text-red-1 mb-3">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password_in" placeholder="Password*">
                            </div>
                            @error('password')
                                <div class="invalid-feedback text-red-1 mb-3">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="clearfix add_bottom_15">
                                <div class="checkboxes float-start">
                                    <label class="container_check">Remember me
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="float-end"><a id="forgot" href="javascript:void(0);">Lost Password?</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Log In" class="btn_1 full-width">
                            </div>
                        </form>

                        <div id="forgot_pw">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email_forgot" id="email_forgot"
                                    placeholder="Type your email">
                            </div>
                            <p>A new password will be sent shortly.</p>
                            <div class="text-center"><input type="submit" value="Reset Password" class="btn_1">
                            </div>
                        </div>
                    </div>
                    <!-- /form_container -->
                </div>
                <!-- /box_account -->
            </div>
            <div class="col-xl-6 col-lg-6 col-md-8">
                <div class="box_account">
                    <h3 class="new_client">New Client</h3> <small class="float-right pt-2">* Required
                        Fields</small>

                    <div class="form_container">
                        <form action="{{ route('register.post') }}" method="post">
                            @csrf


                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Nama*" value="{{ old("name") }}">
                            </div>
                            @error('name')
                                <div class="invalid-feedback text-red-1 mb-3">
                                    {{ $message }}
                                </div>
                            @enderror

                            <hr>
                            <div class="form-group">
                                <label class="container_radio" style="display: inline-block; margin-right: 15px;">Laki-Laki
                                    <input type="radio" name="gender" checked value="laki-laki">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_radio" style="display: inline-block;">Perempuan
                                    <input type="radio" name="gender" value="perempuan">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @error('gender')
                                <div class="invalid-feedback text-red-1 mb-3">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <input type="number" class="form-control" name="phone" placeholder="nomor Telepon*" value="{{ old("phone") }}">
                            </div>
                            @error('phone')
                                <div class="invalid-feedback text-red-1 mb-3">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email_2"
                                    placeholder="Email*" value="{{ old("email") }}">
                            </div>
                            @error('email')
                                <div class="invalid-feedback text-red-1 mb-3">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password_in_2"
                                    value="" placeholder="Password*">
                            </div>
                            @error('password')
                                <div class="invalid-feedback text-red-1 mb-3">
                                    {{ $message }}
                                </div>
                            @enderror

                            <hr>
                            <div class="form-group">
                                <label class="container_check">Dengan Mendaftar Akun Saya Menerima <a href="#0">
                                        Syarat &
                                        Ketentuan </a>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="text-center"><input type="submit" value="Register" class="btn_1 full-width">
                            </div>
                        </form>
                    </div>
                    <!-- /form_container -->
                </div>
                <!-- /box_account -->
            </div>
        </div>
        <!-- /row -->
    </div>
@endsection
