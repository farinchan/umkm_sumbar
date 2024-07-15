@extends('front.app')

@php
    $website = \App\Models\SettingWebsite::first();
@endphp

@section('seo')
    <title>{{ $website->name }} | Login & Register</title>
    <meta name="description" content="{{ strip_tags($website->about) }}">
    <meta name="keywords"
        content="smart umkm, umkm sumatera barat, umkm padang, umkm padang panjang, umkm payakumbuh, umkm pariaman, umkm sawahlunto, umkm solok, umkm kota bukittinggi, umkm kota padang, umkm kota padang panjang, umkm kota payakumbuh, umkm kota pariaman, umkm kota sawahlunto, umkm kota solok">
    <meta name="author" content="Smart UMKM">
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
                                <input type="text" class="form-control" name="name" placeholder="Nama*"
                                    value="{{ old('name') }}">
                            </div>
                            @error('name')
                                <div class="invalid-feedback text-red-1 mb-3">
                                    {{ $message }}
                                </div>
                            @enderror

                            <hr>
                            <div class="form-group">
                                <label class="container_radio"
                                    style="display: inline-block; margin-right: 15px;">Laki-Laki
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
                                <input type="number" class="form-control" name="phone" placeholder="nomor Telepon*"
                                    value="{{ old('phone') }}">
                            </div>
                            @error('phone')
                                <div class="invalid-feedback text-red-1 mb-3">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email_2"
                                    placeholder="Email*" value="{{ old('email') }}">
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

@section('scripts')
<style>
    function showAlert(icon) {
       if (icon == 'warning') {
           Swal.fire({
               title: 'Warning',
               text: '{{ session('warning') }}',
               icon: 'warning',
               confirmButtonText: 'OK',
           });
       } else if (icon == 'error') {
           Swal.fire({
               title: 'Failed',
               text: '{{ session('error') }}',
               icon: 'error',
               confirmButtonText: 'OK',
           });
       } else if (icon == 'success') {
           Swal.fire({
               title: 'Success',
               text: '{{ session('success') }}',
               icon: 'success',
               confirmButtonText: 'OK',
           });
       }
    }
</style>
<script>
    
@endsection
