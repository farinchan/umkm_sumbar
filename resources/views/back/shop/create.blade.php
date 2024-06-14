@extends('back.app')
@section('content')

        <div class=" container-xxl " id="kt_content_container">
            <form id="kt_ecommerce_add_category_form"
                class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                action="{{ route('admin.toko.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Logo</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-empty" data-kt-image-input="true">
                                <div class="image-input-wrapper w-200px h-150px"
                                    style="background-image: url('{{ asset('admin-assets/media/svg/files/blank-image.svg') }}')">
                                </div>
                                <label
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Change thumbnail">
                                    <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <input type="file" name="logo" accept=".png, .jpg, .jpeg" required />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                                <span
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Cancel thumbnail">
                                    <i class="ki-outline ki-cross fs-3"></i>
                                </span>
                                <span
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Remove thumbnail">
                                    <i class="ki-outline ki-cross fs-3"></i>
                                </span>
                            </div>
                            @error('logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="text-muted fs-7 pt-3">File yang diizinkan: *.png, *.jpg, *.jpeg <br>Maksimal 2mb
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2 class="">Owner</h2>
                            </div>
                            <div class="card-toolbar">
                            </div>
                        </div>
                        <div class="card-body pt-0">

                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <select class="form-select form-select-solid form-select-lg" name="user_id" id="select2" required>
                                    @foreach ($user as $ui)
                                        <option value="{{ $ui->id }}">{{ $ui->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Informasi umum</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Nama Toko</label>
                                <input type="text" name="name" class="form-control mb-2" placeholder="Toko Saya"
                                    value="{{ old('name') }}" required>
                                <div class="text-muted fs-7">Kami Menyarankan Untuk Membuat nama toko sesuai dengan toko
                                    fisik.
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Email Toko</label>
                                <input type="email" name="email" class="form-control mb-2"
                                    placeholder="tokosaya@email.com" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Nomor Telephone toko</label>
                                <input type="number" name="phone" class="form-control mb-2"
                                    placeholder="08xxxxxxxxxxx" value="{{ old('phone') }}" required>
                                <div class="text-muted fs-7">Kami Menyarankan Nomor telepon toko Diintegrasi dengan
                                    whatsapp.
                                </div>
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label class="form-label required">Deskripsi Toko</label>
                                <div id="editor" class="min-h-150px mb-2">{{ old('description') }}
                                    <p></p>
                                </div>
                                <input type="hidden" id="description_quill" name="description">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Informasi Lokasi</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Alamat</label>
                                <textarea name="address" class="form-control mb-2" placeholder="Alamat Lengkap Toko" required>{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Kota/Kabupaten</label>
                                <select class="form-select mb-2 select2-hidden-accessible" id="select2p2" name="city_id" required>
                                    @foreach ($city as $ci)
                                        <option @if (old('city_id') == $ci->id) selected @endif
                                            value="{{ $ci->id }}">{{ $ci->name }}</option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="form-label">Longitude & Latitude</label>
                                <div class="d-flex gap-3">
                                    <input type="number" name="longitude" class="form-control mb-2"
                                        placeholder="longitude" value="{{ old('longitude') }}">
                                    <input type="number" name="latitude" class="form-control mb-2"
                                        placeholder="latitude" value="{{ old('latitude') }}">
                                </div>
                                <div class="text-muted fs-7">Silahkan Lihat Google Map Jika ingin mengetahui longitude dan
                                    latitude toko anda</div>
                                @error('longitude')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @error('latitude')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Informasi Media Sosial</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-wrap gap-5">
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Link Facebook</label>
                                    <input type="text" name="facebook" class="form-control mb-2"
                                        value="{{ old('facebook') }}">
                                    @error('facebook')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Link Instagram</label>
                                    <input type="text" name="instagram" class="form-control mb-2"
                                        value="{{ old('instagram') }}">
                                    @error('instagram')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-wrap gap-5">
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Link Twitter/X</label>
                                    <input type="text" name="twitter" class="form-control mb-2"
                                        value="{{ old('twitter') }}">
                                    @error('twitter')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Link Youtube</label>
                                    <input type="text" name="youtube" class="form-control mb-2"
                                        value="{{ old('youtube') }}">
                                    @error('youtube')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-wrap gap-5">
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Link Linkedin</label>
                                    <input type="text" name="linkedin" class="form-control mb-2"
                                        value="{{ old('linkedin') }}">
                                    @error('linkedin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Telegram</label>
                                    <input type="text" name="telegram" class="form-control mb-2"
                                        value="{{ old('telegram') }}">
                                    @error('telegram')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Meta Options</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10">
                                <label class="form-label">Meta Tag Description</label>
                                <div id="editor2" class="min-h-150px mb-2">
                                    -
                                    {{ old('meta_description') }}
                                </div>
                                <input type="hidden" id="meta_description_quill" name="meta_description">
                                <div class="text-muted fs-7">Set a meta tag description to the shop for increased
                                    SEO
                                    ranking.</div>

                                @error('meta_description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label class="form-label">Meta Tag Keywords</label>
                                <input type="text" name="meta_keywords" data-kt-tags="true"
                                    data-kt-placeholder="Enter keywords" data-kt-tagify="true"
                                    class="form-control tagify px-3" placeholder="Enter keywords" value="">
                                <div class="text-muted fs-7">Set a list of keywords that the shop is related to.
                                    Separate the keywords by adding a comma <code>,</code> between each keyword.</div>
                                @error('meta_keywords')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">

                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span class="indicator-label">
                                Buat Toko Sekarang
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.26.5/dist/tagify.min.js"></script>
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });

        var quillEditor = document.getElementById('description_quill');
        quill.on('text-change', function() {
            quillEditor.value = quill.root.innerHTML;
        });

        const quill2 = new Quill('#editor2', {
            theme: 'snow'
        });

        var quillEditor2 = document.getElementById('meta_description_quill');
        quill2.on('text-change', function() {
            quillEditor2.value = quill2.root.innerHTML;
        });

        const input = document.querySelector('input[name=meta_keywords]');
        new Tagify(input);
        $(document).ready(function() {
            $('#select2').select2();
            $('#select2p2').select2();
        });
    </script>
@endsection
