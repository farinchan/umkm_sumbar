<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('q');
        $news = News::latest()
            ->with(['user', 'comments', 'viewers', 'category'])
            ->where('status', 1);

        $categories = NewsCategory::all();
        $data = [
            'news' => $news->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('content', 'LIKE', '%' . $search . '%');
            })->paginate(10),
            'latest_news' => $news->latest()->limit(4)->get(),
            'categories' => $categories,
            'q' => $search,
        ];
        // dd($data);
        return view('front.news.index', $data);
    }

    public function show($slug)
    {
        $news = News::with(['user', 'comments', 'viewers', 'category'])
            ->where('slug', $slug)
            ->first();
        $latest_news = News::latest()->limit(4)->get();
        $categories = NewsCategory::all();
        $data = [
            'news' => $news,
            'latest_news' => $latest_news,
            'categories' => $categories,
        ];
        return view('front.news.show', $data);
    }
}
