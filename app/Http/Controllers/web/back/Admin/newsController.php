<?php

namespace App\Http\Controllers\web\back\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function category()
    {
        $categories = NewsCategory::all();
        $data = [
            'menu_title' => 'Berita',
            'submenu_title' => 'Kategori',
            'title' => 'Daftar Kategori Berita',
            'categories' => $categories
        ];
        return view('back.news.category', $data);
    }

    public function categoryStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = new NewsCategory();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('admin.news.category.index')->with('success', 'Kategori Berita berhasil ditambahkan');
    }

    public function categoryUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = NewsCategory::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('admin.news.category.index')->with('success', 'Kategori Berita berhasil diubah');
    }

    public function categoryDestroy($id)
    {
        $category = NewsCategory::find($id);
        $category->delete();

        return redirect()->route('admin.news.category.index')->with('success', 'Kategori Berita berhasil dihapus');
    }

    public function index()
    {
        $news = News::with([ 'category', 'comments', 'viewers', 'user' ])->get();
        $data = [
            'menu_title' => 'Berita',
            'title' => 'Daftar Berita',
            'news' => $news
        ];
        return view('back.news.index', $data);
    }

    public function create()
    {
        $categories = NewsCategory::all();
        $data = [
            'menu_title' => 'Berita',
            'title' => 'Tambah Berita',
            'categories' => $categories
        ];
        return view('back.news.add', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'nullable|boolean',
            'news_categories_id' => 'required|exists:news_categories,id',
            'meta_description' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
        ]);

        $news = new News();

        $image = $request->file('image');
        $fileName = time() . '_' . $image->getClientOriginalName();
        $filePath = $image->storeAs('images/news/', $fileName, 'public');

        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->content = $request->content;
        $news->image = $fileName;
        $news->news_categories_id = $request->news_categories_id;
        $news->user_id = auth()->user()->id;
        $news->meta_title = $request->title;
        $news->meta_description = $request->meta_description;
        $news->meta_keyword = $request->meta_keyword;
        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $news = News::find($id);
        $categories = NewsCategory::all();
        $data = [
            'menu_title' => 'Berita',
            'title' => 'Edit Berita',
            'news' => $news,
            'categories' => $categories
        ];
        return view('back.news.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean',
            'news_categories_id' => 'required|exists:news_categories,id',
            'meta_description' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
        ]);

        $news = News::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $filePath = $image->storeAs('images/news/', $fileName, 'public');
            $news->image = $fileName;
        }

        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->content = $request->content;
        $news->news_categories_id = $request->news_categories_id;
        $news->meta_title = $request->title;
        $news->meta_description = $request->meta_description;
        $news->meta_keyword = $request->meta_keyword;
        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diubah');
    }

    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus');
    }
}
