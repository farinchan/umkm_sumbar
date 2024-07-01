<?php

namespace App\Http\Controllers\Web\Back\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
     public function create()
    {
        if (!shop::where('user_id', auth()->user()->id)->exists()) {
            return redirect()->route('shop.create')->with('error', 'Anda belum memiliki toko');
        }
        $data = [
            'menu_title' => 'Manajemen Produk',
            'submenu_title' => 'Produk',
            'title' => 'Tambah Produk',
            'product_categories' => ProductCategory::where('parent_id', null)->get(),
            'shop' => shop::all(),
        ];
        // dd($data);
        return view('back.product.create', $data);
    }

    public function store(Request $request)
    {
        if (!shop::where('user_id', auth()->user()->id)->exists()) {
            return redirect()->route('shop.create')->with('error', 'Anda belum memiliki toko');
        }
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpg,jpeg,png|max:2048', // 'required|mimes:jpg,jpeg,png|max:2048
            'name' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'price' => 'required',
            'discount' => '',
            'stock' => 'required',
            'product_categories_id' => 'required',
            'shop_id' => 'required',
            'weight' => 'required',
            'size' => '',
            'brand' => 'required',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keyword' => '',

        ]);
        if ($validator->fails()) {
            return redirect()->route('shop.product.create')->with('error', 'Gagal menambahkan produk baru')->withInput()->withErrors($validator);
        }

        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name') . '-' . Str::random(5));
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->stock = $request->input('stock');
        $product->product_categories_id = $request->input('product_categories_id');
        $product->shop_id = $request->input('shop_id');
        $product->weight = $request->input('weight');
        $product->size = $request->input('size');
        $product->color = $request->input('color');
        $product->brand = $request->input('brand');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keyword = $request->input('meta_keyword');
        $product->save();


        $productImage = new ProductImage();
        $productImage->product_id = $product->id;

        $imageProduct = $request->file('image');
        $filename = now() . $imageProduct->getClientOriginalName();
        $path = 'images/product/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($imageProduct));

        $productImage->image = $filename;
        $productImage->save();

        return redirect()->route('shop.detail-product')->with('success', 'Berhasil menambahkan produk baru');
    }

    public function edit($id)
    {
        $data = [
            'menu_title' => 'Manajemen Produk',
            'submenu_title' => 'Produk',
            'title' => 'Edit Produk',
            'product_categories' => ProductCategory::where('parent_id', null)->get(),
            'shop' => shop::all(),
            'product' => Product::find($id)
        ];
        return view('back.product.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpg,jpeg,png|max:2048', // 'required|mimes:jpg,jpeg,png|max:2048
            'name' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'price' => 'required',
            'discount' => '',
            'stock' => 'required',
            'product_categories_id' => 'required',
            'shop_id' => 'required',
            'weight' => 'required',
            'size' => '',
            'brand' => 'required',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keyword' => '',

        ]);
        if ($validator->fails()) {
            return redirect()->route('shop.product.edit', $id)->with('error', 'Gagal mengubah produk')->withInput()->withErrors($validator);
        }

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->slug = $product->id . '-' . str_replace(' ', '-', $product->name);
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->stock = $request->input('stock');
        $product->product_categories_id = $request->input('product_categories_id');
        $product->shop_id = $request->input('shop_id');
        $product->weight = $request->input('weight');
        $product->size = $request->input('size');
        $product->color = $request->input('color');
        $product->brand = $request->input('brand');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keyword = $request->input('meta_keyword');
        $product->save();

        if ($request->hasFile('image')) {
            $productImage = ProductImage::where('product_id', $id)->first();
            $imageProduct = $request->file('image');
            $filename = now() . $imageProduct->getClientOriginalName();
            $path = 'images/product/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($imageProduct));

            $productImage->image = $filename;
            $productImage->save();
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('shop.detail-product')->with('success', 'Berhasil menghapus produk');
    }


    public function detail($id)
    {
        $product = Product::find($id);
        $data = [
            'menu_title' => 'Manajemen Produk',
            'submenu_title' => 'Produk',
            'title' => 'Detail Produk',
            'product' => $product,
            'product_image' => $product->productImage()->get(),
            'product_category' => $product->productCategory()
                ->leftJoin('product_categories as parent', 'product_categories.parent_id', '=', 'parent.id')
                ->select('product_categories.name as category_name', 'parent.name as category_parent_name')
                ->first(),
            'shop' => $product->shop()->first(),
        ];
        // return response()->json($data);
        return view('back.product.detail', $data);
    }

    public function detailReview($id)
    {
        $product = Product::find($id);
        $data = [
            'menu_title' => 'Manajemen Produk',
            'submenu_title' => 'Produk',
            'title' => 'Detail Review Produk',
            'product' => $product,
            'product_image' => $product->productImage()->get(),
            'product_review' => $product->productReview()->get()->load('user'),
        ];
        // return response()->json($data);
        return view('back.product.detail_review', $data);
    }

    public function detailViewer($id)
    {
        $product = Product::with(['shop', 'productViewer'])->find($id);
        $data = [
            'menu_title' => 'Manajemen Produk',
            'submenu_title' => 'Produk',
            'title' => 'Detail Viewer Produk',
            'product' => $product
        ];
        return response()->json($data);
        return view('back.product.detail_viewer', $data);
    }

    public function detailImage($id)
    {
        $product = Product::find($id);
        $data = [
            'menu_title' => 'Manajemen Produk',
            'submenu_title' => 'Produk',
            'title' => 'Detail Image Produk',
            'product' => $product,
            'product_image' => $product->productImage()->get(),
        ];
        // return response()->json($data);
        return view('back.product.detail_image', $data);
    }

    public function detailImageStore(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpg,jpeg,png|max:2048', // 'required|mimes:jpg,jpeg,png|max:2048
        ]);
        if ($validator->fails()) {
            return redirect()->route('shop.product.image', $id)->with('error', 'Gagal menambahkan gambar produk')->withInput()->withErrors($validator);
        }

        $productImage = new ProductImage();
        $productImage->product_id = $id;

        $imageProduct = $request->file('image');
        $fileName = time() . '_' . $imageProduct->getClientOriginalName();
        $filePath = $imageProduct->storeAs('images/product/', $fileName, 'public');

        $productImage->image = $fileName;
        $productImage->save();

        return redirect()->route('shop.product.image', $id)->with('success', 'Berhasil menambahkan gambar produk');
    }

    public function detailImageDestroy($id)
    {
        $productImage = ProductImage::find($id);
        $productImage->delete();
        return redirect()->route('shop.product.image', $productImage->product_id)->with('success', 'Berhasil menghapus gambar produk');
    }
}
