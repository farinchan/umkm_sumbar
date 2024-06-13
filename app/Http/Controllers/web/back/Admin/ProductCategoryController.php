<?php

namespace App\Http\Controllers\Web\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public function index()
    {
        return view('back.product.category.index');
    }

    public function create()
    {
        $data = [
            'productCategories' => ProductCategory::all()
        ];

        return view('back.product_category.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_id' => 'nullable|integer', // 'nullable|exists:product_categories,id
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);



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
