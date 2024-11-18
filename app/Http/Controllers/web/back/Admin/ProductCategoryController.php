<?php

namespace App\Http\Controllers\Web\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('q');
        $data = ProductCategory::leftJoin('product_categories as parent', 'product_categories.parent_id', '=', 'parent.id')
            ->select('product_categories.*', 'parent.name as parent_name')
            ->where(function ($query) use ($search) {
                $query->where('product_categories.name', 'LIKE', '%' . $search . '%');
            })

            ->paginate(10);
        $data->appends(['q' => $search]);
        $data = [
            'menu_title' => 'Kategori Produk',
            'title' => 'Daftar Kategori Produk',
            'productCategories' => $data
        ];
        // return response()->json($data);
        return view('back.product_category.index', $data);
    }

    public function create()
    {
        $data = [
            'menu_title' => 'Kategori Produk',
            'title' => 'Tambah Kategori Produk',
            'productCategories' => ProductCategory::all()
        ];

        return view('back.product_category.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_id' => 'nullable|integer', // 'nullable|exists:product_categories,id
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            Alert::error('Failed', 'Gagal menambahkan Kategori Produk');
            return redirect()->route('admin.product.category.create')->with('error', 'Failed to create Product Category')->withInput()->withErrors($validator);
        }

        $productCategory = new ProductCategory();
        $productCategory->name = $request->name;
        $productCategory->slug = Str::slug($request->name);
        $productCategory->description = $request->description;
        $productCategory->parent_id = $request->parent_id;
        $productCategory->meta_title = $request->meta_title;
        $productCategory->meta_description = $request->meta_description;
        $productCategory->meta_keywords = $request->meta_keywords;

        if ($request->hasFile('image')) {
            $logo = $request->file('image');
            $filename = now() . $logo->getClientOriginalName();
            $path = 'images/product_category/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($logo));

            $productCategory->image = $filename;
        }
        $productCategory->save();

        return redirect()->route('admin.product.category.index')->with('success', 'Product Category created successfully');
    }
}
