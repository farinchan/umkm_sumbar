@extends('back.app')
@section('content')
    <div class=" container-xxl " id="kt_content_container">
        <form action="{{ route('admin.news.store') }}" enctype="multipart/form-data" method="post" class="row g-5 g-xl-8">
            @csrf
            <div class="col-xl-3 mb-8">
                <div class="row">
                    <div class="card card-flush">
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <div class="card-title">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold fs-3">Thumbnail</span>
                                </h3>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-empty" data-kt-image-input="true">
                                <div class="image-input-wrapper w-200px h-150px"
                                    style="background-image: url('{{ asset('back/media/svg/files/blank-image.svg') }}')">
                                </div>
                                <label
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Change thumbnail">
                                    <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" required />
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
                            @error('thumbnail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="text-muted fs-7 pt-3">File yang diizinkan: *.png, *.jpg, *.jpeg <br>Maksimal 2mb
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="card card-flush">
                        <div class="card-body pt-0">
                            <div class="mb-3 mt-9">
                                <label for="exampleFormControlInput1"
                                    class="col-form-label required fw-bold fs-6">Penulis</label>
                                <input type="text" class="form-control form-control-solid" disabled
                                    value="{{ Auth::user()->name }}" />
                            </div>

                            <div>
                                <label for="exampleFormControlInput1" class="col-form-label required fw-bold fs-6">Meta
                                    Deskripsi</label>
                                <textarea class="form-control form-control-solid @error('meta_description') is-invalid @enderror" rows="5"
                                    name="meta_description" placeholder="Tulis deskripsi singkat..." required>{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="card card-flush py-5 d-flex">
                        <a href="{{ route('admin.news.index') }}" class="btn btn-light-primary">Batal</a>
                        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 mb-8">
                <div class="row">
                    <div class="card card-flush">
                        <div class="card-body pt-0">
                            <div class="mb-3 mt-9">
                                <label for="exampleFormControlInput1"
                                    class="col-form-label required fw-bold fs-6">Judul</label>
                                <input type="text" name="title"
                                    class="form-control form-control-solid @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}" placeholder="Judul Berita" required />
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="exampleFormControlInput1"
                                    class="col-form-label required fw-bold fs-6">Status Berita</label>
                                <select name="status" class="form-select form-select-solid form-select-lg fw-bold @error('status') is-invalid @enderror"
                                    required>
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Publish</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Draft</option>
                                </select>
                                @error('location')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="exampleFormControlInput1"
                                    class="col-form-label required fw-bold fs-6">kategori</label>
                                    <select class="form-select form-select-solid form-select-lg" name="news_categories_id" id="select2" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('news_categories_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="mb-5">
                                <label for="exampleFormControlInput1" class="col-form-label required fw-bold fs-6">Isi Berita</label>
                                <div id="editor" class="min-h-500px mb-2">{!! old('content') !!}
                                    <p></p>
                                </div>
                                <input type="hidden" id="description_quill" name="content">
                                @error('content')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="exampleFormControlInput1" class="col-form-label fw-bold fs-6">Meta Tag Keywords</label>
                                <input type="text" name="meta_keyword" data-kt-tags="true"
                                    data-kt-placeholder="Enter keywords" data-kt-tagify="true"
                                    class="form-control tagify px-3" placeholder="Enter keywords" value="">
                                <div class="text-muted fs-7">Set a list of keywords that the shop is related to.
                                    Separate the keywords by adding a comma <code>,</code> between each keyword.</div>
                                @error('meta_keyword')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
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

        const input = document.querySelector('input[name=meta_keyword]');
        new Tagify(input);

        $(document).ready(function() {
            $('#select2').select2();
        });
        
    </script>
@endsection
