<?php

namespace App\Http\Controllers\Web\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            'menu_title' => 'Manajemen Produk',
            'submenu_title' => 'Produk',
            'title' => 'Daftar Produk',
            'product' => Product::all()
        ];
        return view('back.product.index');
    }

    public function create()
    {
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
        // dd($request->all());
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
            return redirect()->route('admin.product.create')->with('error', 'Gagal menambahkan produk baru')->withInput()->withErrors($validator);
        }

        $product = new Product();
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


        $productImage = new ProductImage();
        $productImage->product_id = $product->id;

        $imageProduct = $request->file('image');
        $filename = now() . $imageProduct->getClientOriginalName();
        $path = 'images/product_category/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($imageProduct));

        $productImage->image = $filename;
        $productImage->save();

        return redirect()->route('admin.product.index')->with('success', 'Berhasil menambahkan produk baru');
    }
}
