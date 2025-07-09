<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $slug)
    {
        $condition = 'null';
        $column = 'null';
        $query = 'null';

        $responseNews = Http::get('https://mischool.mijurnal.com/api/news' . '/' . $condition . '/' . $column . '/' . $query);
        $responseCategories = Http::get('https://mischool.mijurnal.com/api/news-category');
        $newses = $responseNews->json('news');
        $categories = $responseCategories->json();

        $filteredNews = array_filter($newses, function ($news) use ($slug) {
            return $news['slug'] === $slug;
        });

        $news = !empty($filteredNews) ? array_values($filteredNews)[0] : null;
        return view('landing.news.detail', compact('news', 'categories'));
    }

    public function index_category(string $slug)
    {
        $responseCategories = Http::get('https://mischool.mijurnal.com/api/news-category');
        $categories = $responseCategories->json();

        //filter category sesuai slug
        $filteredCategory = array_filter($categories, function ($news) use ($slug) {
            return $news['slug'] === $slug;
        });
        $newsCategory = !empty($filteredCategory) ? array_values($filteredCategory)[0] : null;

        $condition = 'category';
        $column = 'id';
        $query = $newsCategory['id'];

        $responseNews = Http::get('https://mischool.mijurnal.com/api/news' . '/' . $condition . '/' . $column . '/' . $query);
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

        return view('landing.news.news-category', compact('newsCategory','otherNews', 'latest', 'recentPosts', 'categories'));
    }
}
