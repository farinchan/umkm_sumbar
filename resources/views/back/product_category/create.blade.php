@extends('back.app')
@section('content')

        <div class=" container-xxl " id="kt_content_container">
            <form action="{{ route("admin.product.category.store") }}" method="POST" enctype="multipart/form-data" id="kt_ecommerce_add_category_form"
                class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework">
                @csrf
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Banner Kategori Produk</h2>
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
                                    <i class="bi bi-pencil"><span class="path1"></span><span class="path2"></span></i>
                                    <input type="file" name="image" value="{{ old("image") }}" accept=".png, .jpg, .jpeg" required />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                                <span
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Cancel thumbnail">
                                    <i class="bi bi-x fs-3"></i>
                                </span>
                                <span
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Remove thumbnail">
                                    <i class="bi bi-x fs-3"></i>
                                </span>
                            </div>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="text-muted fs-7 pt-3">File yang diizinkan: *.png, *.jpg, *.jpeg <br>Maksimal 2mb
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-body py-0">

                            <div class="card card-flush py-4">
                                <a href="https://demo.gariskode.com/menu/hotel" class="btn btn-light-primary">Batal</a>
                                <button type="submit" class="btn btn-primary mt-4">Publish</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Informasi Umum</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class=" form-label">Nama Kategori</label>
                                <input type="text" name="name" class="form-control mb-2"
                                    placeholder="Product name" value="{{ old("name") }}" required>
                                <div class="text-muted fs-7">Nama Kategori harus unik.
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Deskripsi Kategori</label>
                                <div id="editor" name="description" class="min-h-100px mb-2">-{!! old("description") !!}</div>
                                <input type="hidden" id="description_quill" name="description" value="-">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class=" form-label">Kategori Parent</label>
                                <select class="form-select mb-2 select2-hidden-accessible" id="select2"
                                    name="parent_id">
                                    <option value="0">Tidak ada</option>
                                    @foreach ($productCategories as $cat)
                                        <option @if (old('parent_id') == $cat->id) selected @endif
                                            value="{{ $cat->id }}">
                                            {{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
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
                                <h2>Meta Options</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10">
                                <label class="form-label">Meta Tag Title</label>
                                <input type="text" name="meta_title" class="form-control mb-2"
                                    placeholder="Meta Tag Title" value="{{ old('meta_title') }}">
                                <div class="text-muted fs-7">Set a meta tag title to the shop for increased SEO ranking.
                                </div>
                                @error('meta_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
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
