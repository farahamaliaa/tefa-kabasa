<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('about-us', function(){
    return view('landing.about-us');
})->name('about-us');

Route::get('news', [LandingController::class, 'news'])->name('news');

Route::get('testimoni', function(){
    return view('landing.testimoni');
})->name('testimoni');

Route::get('contact-us', function(){
    return view('landing.contact-us');
})->name('contact-us');

Route::get('package', function(){
    return view('landing.package');
})->name('package');

Route::get('view-pdf', function(){
    return view('export-pdf.export-lesson-schedule');
})->name('export-pdf');

Route::get('news/{slug}', [NewsController::class, 'index'])->name('news.detail');
Route::get('news/category/{slug}', [NewsController::class, 'index_category'])->name('news.category.detail');
