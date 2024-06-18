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
    public function index(Request $request)
    {
        $product = Product::leftJoin('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
        ->leftJoin('product_categories as parent', 'product_categories.parent_id', '=', 'parent.id')
            ->leftJoin('shops', 'products.shop_id', '=', 'shops.id')
            ->select('products.*', 'product_categories.name as category_name', 'parent.name as category_parent_name', 'shops.name as shop_name');
        $data = [
            'menu_title' => 'Manajemen Produk',
            'submenu_title' => 'Produk',
            'title' => 'Daftar Produk',
            'product' => $product->get()
        ];
        // return response()->json($data);
        return view('back.product.index', $data);
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
        $path = 'images/product/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($imageProduct));

        $productImage->image = $filename;
        $productImage->save();

        return redirect()->route('admin.product.index')->with('success', 'Berhasil menambahkan produk baru');
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
            return redirect()->route('admin.product.edit', $id)->with('error', 'Gagal mengubah produk')->withInput()->withErrors($validator);
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
        return redirect()->route('admin.product.index')->with('success', 'Berhasil menghapus produk');
    }



}
