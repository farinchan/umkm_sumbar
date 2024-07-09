<?php

namespace App\Http\Controllers\Web\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductReview;
use App\Models\ProductViewer;
use App\Models\shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::leftJoin('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
            ->leftJoin('product_categories as parent', 'product_categories.parent_id', '=', 'parent.id')
            ->with(['productCategory', 'shop', 'productImage', 'productReview', 'productViewer'])
            ->select('products.*', 'product_categories.name as category_name', 'parent.name as category_parent_name');

        $data = [
            'menu_title' => 'Manajemen Produk',
            'submenu_title' => 'Produk',
            'title' => 'Daftar Produk',
            'product' => $product->get(),
        ];
        // dd($data);
        // return response()->json($data);
        return view('back.product.index', $data);
    }

    public function create()
    {
        $data = [
            'menu_title' => 'Manajemen Produk',
            'submenu_title' => 'Produk',
            'title' => 'Tambah Produk',
            'product_categories' => ProductCategory::where('parent_id', '!=', null)->get(),
            'shop' => shop::all(),
        ];
        // dd($data);
        return view('back.product.create', $data);
    }

    public function store(Request $request)
    {
        dd($request->all());
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

        // Asumsikan nama input dari Tagify adalah 'tags'
        $tagsArray = json_decode($request->input('tags'), true);

        // Ubah array objek menjadi array string
        $tags = array_map(function ($tag) {
            return $tag['value'];
        }, $tagsArray);
        $tagsString = implode(', ', $tags);

        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name') . '-' . Str::random(5));
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->stock = $request->input('stock');
        $product->status = (int)$request->input('status');
        $product->product_categories_id = $request->input('product_categories_id');
        $product->shop_id = $request->input('shop_id');
        $product->weight = $request->input('weight');
        $product->size = $request->input('size');
        $product->color = $request->input('color');
        $product->brand = $request->input('brand');
        $product->tags = $tagsString;
        $product->meta_title = $request->input('name');
        $product->meta_description = $request->input('short_description');
        $product->meta_keyword = $tagsString;
        $product->save();


        $productImage = new ProductImage();
        $productImage->product_id = $product->id;

        $image = $request->file('image');
        $fileName = time() . '_' . $image->getClientOriginalName();
        $filePath = $image->storeAs('images/product/', $fileName, 'public');

        $productImage->image = $fileName;
        $productImage->save();

        return redirect()->route('admin.product.index')->with('success', 'Berhasil menambahkan produk baru');
    }

    public function edit($id)
    {
        $data = [
            'menu_title' => 'Manajemen Produk',
            'submenu_title' => 'Produk',
            'title' => 'Edit Produk',
            'product_categories' => ProductCategory::where('parent_id', '!=', null)->get(),
            'shop' => shop::all(),
            'product' => Product::with(['productCategory', 'shop', 'productImage'])->find($id),
        ];
        return view('back.product.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
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

         // Asumsikan nama input dari Tagify adalah 'tags'
         $tagsArray = json_decode($request->input('tags'), true);

         // Ubah array objek menjadi array string
         $tags = array_map(function ($tag) {
             return $tag['value'];
         }, $tagsArray);
         $tagsString = implode(', ', $tags);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name') . '-' . Str::random(5));
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->stock = $request->input('stock');
        $product->status = (int)$request->input('status');
        $product->product_categories_id = $request->input('product_categories_id');
        $product->shop_id = $request->input('shop_id');
        $product->weight = $request->input('weight');
        $product->size = $request->input('size');
        $product->color = $request->input('color');
        $product->brand = $request->input('brand');
        $product->tags = $tagsString;
        $product->meta_title = $request->input('name');
        $product->meta_description = $request->input('short_description');
        $product->meta_keyword = $tagsString;
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Berhasil mengubah produk');

    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Berhasil menghapus produk');
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
            'title' => 'Detail pengunjung Produk',
            'product' => $product,
            'product_image' => $product->productImage()->get(),
            'product_viewer' => $product->productViewer()->latest()->get(),
        ];
        // return response()->json($data);
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
            return redirect()->route('admin.product.detail-image', $id)->with('error', 'Gagal menambahkan gambar produk')->withInput()->withErrors($validator);
        }

        $productImage = new ProductImage();
        $productImage->product_id = $id;

        $imageProduct = $request->file('image');
        $fileName = time() . '_' . $imageProduct->getClientOriginalName();
        $filePath = $imageProduct->storeAs('images/product/', $fileName, 'public');

        $productImage->image = $fileName;
        $productImage->save();

        return redirect()->route('admin.product.detail-image', $id)->with('success', 'Berhasil menambahkan gambar produk');
    }

    public function detailImageDestroy($id)
    {
        $productImage = ProductImage::find($id);
        $productImage->delete();
        return redirect()->route('admin.product.detail-image', $productImage->product_id)->with('success', 'Berhasil menghapus gambar produk');
    }

    public function review(){
        $data = [
            'menu_title' => 'Manajemen Produk',
            'submenu_title' => 'Produk',
            'title' => 'Review Produk',
            'product_review' => ProductReview::with('product', 'user')->latest()->get(),
        ];
        return view('back.product.review', $data);
    }

    public function viewer(){
        $data = [ 
            'menu_title' => 'Manajemen Produk',
            'submenu_title' => 'Produk',
            'title' => 'Pengunjung Produk',
            'product_viewer' => ProductViewer::with('product')->latest()->get(),
        ];
        return view('back.product.viewer', $data);

    }
}
