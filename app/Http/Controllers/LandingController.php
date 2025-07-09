<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class LandingController extends Controller
{
    public function index()
    {
        try {
            $condition = 'null';
            $column = 'null';
            $query = 'null';

            $responseSchool = Http::get('https://mischool.mijurnal.com/api/schools');
            $responseNews = Http::get('https://mischool.mijurnal.com/api/news' . '/' . $condition . '/' . $column . '/' . $query);
            $responseFaq = Http::get('https://mischool.mijurnal.com/api/faq');
            $schools = $responseSchool->json();
            $newses = $responseNews->json('news');
            $faqs = $responseFaq->json();

            return view('welcome', compact('schools', 'newses', 'faqs'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan pada server');
        }
    }

    public function news()
    {
        $condition = 'null';
        $column = 'null';
        $query = 'null';

        $responseNews = Http::get('https://mischool.mijurnal.com/api/news' . '/' . $condition . '/' . $column . '/' . $query);
        $responseCategories = Http::get('https://mischool.mijurnal.com/api/news-category');
        $latest = $responseNews->json('news_latest');
        $recentPosts = $responseNews->json('news_recent_post');
        $categories = $responseCategories->json();

        $data = collect($responseNews->json('news_other'));

        $perPage = 3;
        $page = request()->get('page', 1);

        $otherNews = new LengthAwarePaginator(
            $data->forPage($page, $perPage),
            $data->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('landing.news.news', compact('latest', 'recentPosts', 'otherNews', 'categories'));
    }
}
