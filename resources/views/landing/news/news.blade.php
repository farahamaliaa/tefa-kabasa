@extends('layouts.landing.layouts.app')
@section('style')
<style>
    .custom_recent_post_block .custom_img img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    @media (min-width: 768px) {
        .custom_recent_post_block .custom_d-flex {
            flex-direction: row;
        }

        .custom_recent_post_block .custom_text {
            margin-left: 20px;
        }

        .custom_recent_post_block .custom_img img {
            width: 350px;
            height: 145px;
            object-fit: cover;
        }
    }

</style>
@endsection
@section('banner')
<!-- Bread Crumb -->
<div class="bread_crumb" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">


    <!-- vertical line animation -->
    <div class="anim_line dark_bg">
        <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
        <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
        <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
        <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
        <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
        <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
        <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
        <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
        <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
    </div>

    <div class="container">
        <div class="bred_text">
            <h1 class="text-primary">Berita</h1>
            <ul>
                <li><a href="/">Beranda</a></li>
                <li><span>»</span></li>
                <li><a href="news">Berita</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection


@section('content')
<!-- Main Blog List Section Start-->
<section class="blog_list_section" style="padding-bottom: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row mb-4">
                    <div class="col-lg-4">
                        <h2>Berita Trending</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="border-bottom" style="margin-top: 30px"></div>
                    </div>
                </div>
                <!-- Blog Left Side -->
                <div class="blog_left_side">
                    <div class="blog_panel" data-aos="fade-up" data-aos-duration="1500">
                        <div class="main_img">
                            <a href="{{ route('news.detail', $latest['slug']) }}"><img src="{{ $latest ? $latest['image'] : '' }}" class="w-100" style="height: 405px; object-fit:cover;" alt="image"></a>
                        </div>
                        <div class="blog_info">
                            <span class="date">{{ $latest ? $latest['date'] : '' }}</span>
                            <h2><a href="{{ route('news.detail', $latest['slug']) }}">{{ $latest ? Str::limit($latest['title'], 200) : '' }}</a></h2>
                            <p>{!! $latest ? Str::limit(strip_tags($latest['description']), 500) : ''!!}</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4">
                        <h2>Berita Lainnya</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="border-bottom" style="margin-top: 30px"></div>
                    </div>
                </div>

                @if ($otherNews)
                    @foreach ($otherNews as $otherNew)
                    <div class="custom_recent_post_block bg_box mb-3" data-aos="fade-up" data-aos-duration="1500">
                        <ul class="recent_blog_list">
                            <li>
                                <a href="{{ route('news.detail', ['slug' => $otherNew['slug']]) }}">
                                    <div class="custom_d-flex flex-column flex-md-row d-flex">
                                        <div class="custom_img">
                                            <img src="{{ $otherNew['image'] }}" style="width:155px; height:145px; object-fit: cover;" alt="image" class="img-fluid" />
                                        </div>
                                        <div class="custom_text mt-3 mt-md-0 ms-md-3">
                                            <span class="text-muted" style="font-size: 12px;">{{ $otherNew['date'] }}</span>
                                            <h4 style="font-size: 18px;">{{ Str::limit($otherNew['title'], 100) }}</h4>
                                            <p style="font-size: 13px;">{!! Str::limit(strip_tags($otherNew['description']), 150) !!}</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                @endif

            </div>
            <div class="col-lg-4">
                <!-- blog Right Side -->
                <div class="blog_right_side">
                    <!-- Search Blog -->
                    {{-- <div class="blog_search_block bg_box" data-aos="fade-up" data-aos-duration="1500">
                        <form action="https://kalanidhithemes.com/live-preview/landing-page/codely/all-demo/06-codely-landing-page-get-started-hero/submit">
                            <div class="form-group">
                                <h3>Search post</h3>
                                <div class="form_inner">
                                    <input type="text" class="form-control">
                                    <button><i class="icofont-search-1"></i></button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                    <!-- Recent Post -->
                    <div class="recent_post_block bg_box" data-aos="fade-up" data-aos-duration="1500">
                        <h3>Berita Terbaru</h3>
                        <ul class="recent_blog_list">
                            @if ($recentPosts)
                                @forelse ($recentPosts as $recentPost)
                                    <li>
                                        <a href="{{ route('news.detail', ['slug' => $recentPost['slug']]) }}">
                                            <div class="img">
                                                <img src="{{ $recentPost['image'] }}" style="width: 75px; height: 75px; object-fit:cover;" alt="image">
                                            </div>
                                            <div class="text">
                                                <h4>{{ Str::limit($recentPost['title'], 45) }}</h4>
                                                <span>{{ $recentPost['date'] }}</span>
                                            </div>
                                        </a>
                                    </li>
                                @empty
                                @endforelse
                            @endif
                            {{-- <li>
                                <a href="blog-detail.html">
                                    <div class="img">
                                        <img src="{{ asset('landing_assets/images/new/blog-side_02.png') }}" alt="image">
                                    </div>
                                    <div class="text">
                                        <h4>How is Technology Working With New Things?</h4>
                                        <span>2 days ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="blog-detail.html">
                                    <div class="img">
                                        <img src="{{ asset('landing_assets/images/new/blog-side_03.png') }}" alt="image">
                                    </div>
                                    <div class="text">
                                        <h4>Two tried and true frameworks for achieving..</h4>
                                        <span>3 days ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="blog-detail.html">
                                    <div class="img">
                                        <img src="{{ asset('landing_assets/images/new/blog-side_04.png') }}" alt="image">
                                    </div>
                                    <div class="text">
                                        <h4>Why communities help you build better...</h4>
                                        <span>4 days ago</span>
                                    </div>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                    <!-- Categories List -->
                    <div class="categories_block bg_box" data-aos="fade-up" data-aos-duration="1500">
                        <h3>Kategori</h3>
                        <ul>
                            @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('news.category.detail', ['slug' => $category['slug']]) }}" class="cat"><i class="icofont-folder-open"></i>{{ $category['name'] }}</a>
                                <span>{{ $category['news_count'] }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination Block Start -->
        @if ($otherNews)
            <x-paginate-landing :paginator="$otherNews" />
        @endif
        <!-- Pagination Block End -->
    </div>
</section>
<!-- Main Service Section End-->
@endsection
