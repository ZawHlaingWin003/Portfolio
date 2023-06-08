@extends('frontend.layouts.master')

@section('title', '| Blogs')


@section('content')

    <!-- ========== Blog Page ========== -->
    <section class="blogPage" id="blogPage">
        <div class="container">
            <div class="banner">
                <div class="banner-title">
                    <h1 class="display-1"><span class="zaw">Zaw.</span> Blog</h1>
                </div>
                <form action="" autocomplete="off">
                    <div class="input-group">
                        <input class="search" type="text" placeholder="Search Blog Here" name="search" value="{{ request()->search }}">
                        <span class="focus-border">
                            <i></i>
                        </span>
                    </div>
                    <x-main-button type="submit" iconName="fa-magnifying-glass-arrow-right">
                        Search Blog
                    </x-main-button>
                </form>
            </div>
        </div>
    </section>

    <section class="posts">
        <div class="container">
            <nav aria-label="breadcrumb" class="mb-4 breadcrumb-links">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="line-btn">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}" class="line-btn">Blogs</a></li>
                    @if ($request->search)
                        <li class="breadcrumb-item active"><a href="" class="line-btn">Search Keyword = {{ $request->search }}</a>
                        </li>
                    @elseif ($request->category)
                        <li class="breadcrumb-item active"><a href="" class="line-btn">Category = {{ $request->category }}</a></li>
                    @elseif ($request->author)
                        <li class="breadcrumb-item active"><a href="" class="line-btn">Author = {{ $request->author }}</a></li>
                    @endif
                </ol>
            </nav>
            <div class="posts-container">
                <div class="posts-list">
                    @if (count($blogs))
                        <div class="latest-post">
                            <div class="blog-item">
                                <img src="{{ $blogs[0]->image_path }}" alt="">
                                <div class="blog-detail">
                                    <div class="blog-title">
                                        <h1><a href="{{ route('blogs.show', $blogs[0]) }}" class="link">{{ $blogs[0]->title }}</a></h1>
                                    </div>
                                    <div class="blog-info">
                                        <div class="author">
                                            <a href="{{ route('blogs.index', ['author' => $blogs[0]->author->name]) }}">
                                                <i class="fa fa-user-alt"></i>
                                                {{ $blogs[0]->author->name }}
                                            </a>
                                        </div>
                                        <div class="category">
                                            <a
                                                href="{{ route('blogs.index', ['category' => $blogs[0]->category->name]) }}">
                                                <i class="fa fa-folder-open"></i>
                                                {{ $blogs[0]->category->name }}
                                            </a>
                                        </div>
                                        <div class="created">
                                            <i class="fa fa-calendar-alt"></i>
                                            {{ $blogs[0]->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                    <div class="blog-btn">
                                        <a href="{{ route('blogs.show', $blogs[0]) }}" class="line-btn">Read More
                                            &rarr;</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ribbon"><span>Latest</span></div>
                        </div>
                    @else
                        <marquee behavior="" direction="left" scrollamount="12">
                            <div class="no-items">
                                @if ($request->search)
                                    <h1>There's no blog which concerned with word "{{ $request->search }}".</h1>
                                @elseif ($request->category)
                                    <h1>There's no blog which category is "{{ $request->category }}".</h1>
                                @elseif ($request->author)
                                    <h1>There's no blog which "{{ $request->author }}" wrote.</h1>
                                @else
                                    <h1>There's no blog.</h1>
                                @endif
                            </div>
                        </marquee>
                    @endif
                    <div class="all-posts">

                        @foreach ($blogs->skip(1) as $blog)
                            <div class="post-item">
                                <div class="post-img">
                                    <img src="{{ $blog->image_path }}" alt="Blog Image">
                                    <div class="icons">
                                        <a href="#"> <i class="fas fa-calendar"></i>
                                            {{ $blog->created_at->diffForHumans() }}</a>
                                        <a href="{{ route('blogs.index', ['author' => $blog->author->name]) }}"> <i
                                                class="fas fa-user"></i> by {{ $blog->author->name }}</a>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <div class="post-category">
                                        <span><a href="{{ route('blogs.index', ['category' => $blog->category->name]) }}"
                                                class="line-btn"> <i class="fa fa-folder"></i>
                                                {{ $blog->category->name }}</a></span>
                                    </div>
                                    <div class="post-title">
                                        <a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{ $blogs->links() }}
                </div>
                <div class="side-bar">
                    <div class="categories">
                        <div class="title">
                            Categories
                        </div>
                        <ul class="categories-list">
                            <li class="categories-item"><a href="{{ url('/blogs') }}" class="">All Blogs
                                    ({{ count($allBlogs) }}) &rarr;</a></li>
                            @foreach ($categories as $category)
                                <li class="categories-item"><a
                                        href="{{ route('blogs.index', ['category' => $category->name]) }}"
                                        class="">{{ $category->name }} ({{ count($category->blogs) }}) &rarr;</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="about-me">
                        <div class="title">
                            About me
                        </div>
                        <div class="img">
                            <img src="frontend/images/about.png" alt="Profile">
                        </div>
                        <div class="sign">
                            <img src="frontend/images/signature.png" alt="Sign">
                        </div>
                    </div>
                    <div class="follow-me">
                        <div class="title">
                            Follow me
                        </div>
                        <div class="text">
                            Follow on Most Popular social community and receive NEW posts in your social line every day!
                        </div>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram-square"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                    <div class="popular-posts">
                        <div class="title">
                            Popular Posts
                        </div>
                        <div class="popular-posts-list">

                            @foreach ($latestBlog as $blog)
                                <div class="post">
                                    <div class="post-img">
                                        <img src="{{ $blog->image_path }}"
                                            alt="">
                                    </div>
                                    <div class="post-title">
                                        <a href="">{{ $blog->title }}</a>
                                    </div>
                                    <div class="post-date">
                                        {{ $blog->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('custom_js')
@endsection
