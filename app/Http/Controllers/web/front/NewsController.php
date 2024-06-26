<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsViewer;
use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;
use Stevebauman\Location\Facades\Location;

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

        $currentUserInfo = Location::get(request()->ip());

        $news_viewers = new NewsViewer();
        $news_viewers->news_id = $news->id;
        $news_viewers->ip = request()->ip();
        if ($currentUserInfo) {
            $news_viewers->country = $currentUserInfo->countryName;
            $news_viewers->city = $currentUserInfo->cityName;
            $news_viewers->region = $currentUserInfo->regionName;
            $news_viewers->postal_code = $currentUserInfo->postalCode;
            $news_viewers->latitude = $currentUserInfo->latitude;
            $news_viewers->longitude = $currentUserInfo->longitude;
            $news_viewers->timezone = $currentUserInfo->timezone;
        }
        $news_viewers->user_agent = Agent::getUserAgent();
        $news_viewers->platform = Agent::platform();
        $news_viewers->browser = Agent::browser();
        $news_viewers->device = Agent::device();
        $news_viewers->save();
        
        return view('front.news.show', $data);
    }
}
