@extends('back.app')
@section('content')
    <div class=" container-xxl " id="kt_content_container">
        <form id="kt_ecommerce_add_category_form"
            class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
            action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Foto Produk</h2>
                        </div>
                    </div>
                    <div class="card-body text-center pt-0">
                        <div class="image-input image-input-empty" data-kt-image-input="true">
                            <div class="image-input-wrapper w-200px h-150px"
                                style="background-image: url('{{ Storage::url('images/product/' . $product->productImage[0]->image) }}')">
                            </div>

                        </div>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="text-muted fs-7 pt-3"> Untuk Mengganti Foto Produk <a
                                href="{{ route('admin.product.detail-image', $product->id) }}">Klik disini</a>
                        </div>
                    </div>
                </div>

                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2 class="">Toko</h2>
                        </div>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <div class="mb-10 fv-row fv-plugins-icon-container">
                            <select class="form-select mb-2" name="shop_id" id="select2" required>
                                @foreach ($shop as $itemShop)
                                    <option @if ($product->id == $itemShop->id) selected @endif value="{{ $itemShop->id }}">
                                        {{ $itemShop->name }}</option>
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
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Status</h2>
                        </div>
                        <div class="card-toolbar">
                            <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <select name="status" class="form-select mb-2" data-control="select2" data-hide-search="true"
                            data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select" required>
                            <option></option>
                            <option value="1" @if ($product->status == 1) selected @endif>Publish</option>
                            <option value="0" @if($product->status == 0) selected @endif>Draft</option>
                        </select>
                        <div class="text-muted fs-7">Atur status produk anda.</div>
                    </div>
                </div>
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Product Details</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <label class="form-label required">kategori</label>
                        <select class="form-select mb-2" name="product_categories_id" data-control="select2" required>
                            @foreach ($product_categories as $cat)
                                <option @if ($product->product_categories_id == $cat->id) selected @endif value="{{ $cat->id }}">
                                    {{ $cat->name }}</option>
                            @endforeach
                        </select>
                        <div class="text-muted fs-7 mb-7">Tambah produk ke Kategori</div>
                        @role('superadmin|admin')
                            <a href="{{ route('admin.product.category.create') }}" class="btn btn-light-primary btn-sm mb-10">
                                <i class="ki-duotone ki-plus fs-2"></i>buat kategori baru
                            </a>
                        @endrole
                        <label class="form-label d-block required">Tags</label>
                        <input id="kt_ecommerce_add_product_tags" name="tags"
                            class="form-control mb-2 @error('tags') is-invalid @enderror" value="{{ $product->tags }}" required />
                        <div class="text-muted fs-7">Tambahkan tags yang merepresentasikan produk anda <br>(,) Koma untuk
                            mengakhiri tag</div>
                    </div>
                </div>
                <div class="card card-flush py-4">
                    <div class="card-body py-0">
                        <div class="card card-flush py-4">
                            <a href="https://demo.gariskode.com/menu/hotel" class="btn btn-light-primary">Batal</a>
                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
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
                        <div class="fv-row fv-plugins-icon-container">
                            <label class="required form-label">Nama Produk</label>
                            <input type="text" name="name"
                                class="form-control mb-2 @error('name') is-invalid @enderror" placeholder="produk Saya"
                                value="{{ $product->name }}" required>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="card-body pt-0">
                        <div class="fv-row fv-plugins-icon-container">
                            <label class="form-label required">Deskripsi Singkat Produk</label>
                            <textarea name="short_description" rows="4"
                                class="form-control mb-2 @error('short_description') is-invalid @enderror" placeholder="Deskripsi produk" required>{{ $product->short_description }}</textarea>
                        </div>
                        @error('short_description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="card-body pt-0">
                        <div class="fv-row fv-plugins-icon-container">
                            <label class="form-label required">Deskripsi Produk</label>
                            <div id="editor" class="min-h-250px mb-2">{!! $product->description !!}
                                <p></p>
                            </div>
                            <input class="@error('description') is-invalid @enderror" type="hidden"
                                id="description_quill" name="description">
                        </div>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Informasi Produk</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="d-flex flex-wrap gap-5">
                            <div class="fv-row w-100 flex-md-root">
                                <label class="required form-label">Harga (RP.)</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="number" name="price"
                                        class="form-control mb-2 @error('price') is-invalid @enderror"
                                        value="{{ $product->price }}" required>
                                </div>
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="fv-row w-100 flex-md-root">
                                <label class="form-label">Diskon (%)</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="discount"
                                        class="form-control mb-2 @error('discount') is-invalid @enderror"
                                        value="{{ $product->discount }}">
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                </div>
                                @error('discount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="fv-row w-100 flex-md-root">
                                <label class="form-label required">stok</label>
                                <input type="number" name="stock"
                                    class="form-control mb-2 @error('stock') is-invalid @enderror"
                                    value="{{ $product->stock }}" required>
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-10 fv-row fv-plugins-icon-container">
                            <label class="required form-label">Berat</label>
                            <input type="number" name="weight"
                                class="form-control mb-2 @error('weight') is-invalid @enderror"
                                placeholder="Berat Produk" value="{{ $product->weight }}" required>
                            @error('weight')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-10 fv-row fv-plugins-icon-container">
                            <label class="form-label">ukuran</label>
                            <div class="mb-5 mt-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="size[]" value="S"
                                        id="sizeS">
                                    <label class="form-check-label" for="sizeS">S</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="size[]" value="M"
                                        id="sizeM">
                                    <label class="form-check-label" for="sizeM">M</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="size[]" value="L"
                                        id="sizeL">
                                    <label class="form-check-label" for="sizeL">L</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="size[]" value="XL"
                                        id="sizeXL">
                                    <label class="form-check-label" for="sizeXL">XL</label>
                                </div>
                            </div>
                            <div class="">
                                @for ($i = 32; $i <= 45; $i++)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="size[]"
                                            value="{{ $i }}" id="size{{ $i }}">
                                        <label class="form-check-label"
                                            for="size{{ $i }}">{{ $i }}</label>
                                    </div>
                                @endfor
                            </div>
                        </div>
                        <div class="mb-10 fv-row fv-plugins-icon-container">
                            <label class="required form-label">Nama Merk</label>
                            <input type="text" name="brand"
                                class="form-control mb-2 @error('brand') is-invalid @enderror" placeholder="Brand Produk"
                                value="{{ $product->brand }}" required>
                            @error('brand')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- <div class="card card-flush py-4">
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
                    </div> --}}
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.26.5/dist/tagify.min.js"></script>
    <script src="{{ asset('back/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('back/js/custom/apps/ecommerce/catalog/save-product.js') }}"></script>
    <script src="{{ asset('back/js/widgets.bundle.js') }}"></script>
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });
        var quillEditor = document.getElementById('description_quill');
        quillEditor.value = quill.root.innerHTML;
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
