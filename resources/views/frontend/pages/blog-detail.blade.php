@extends('frontend.layouts.master')

@section('title', '| Detail')


@section('custom_css')
<style>

/* Heart Btn */
.heart-btn{
    display: inline-block;
}
.content{
    padding: 10px 15px;
    border: 2px solid #fff;
    border-radius: 5px;
    cursor: pointer;
    position: relative;
}
.likeBtn.heart-active{
    border-color: #E2264D;
}
.heart{
    position: absolute;
    background: url('{{ asset('frontend/images/heart-btn.png') }}') no-repeat;
    background-position: left;
    background-size: 2900%;
    height: 90px;
    width: 90px;
    top: 50%;
    left: 10%;
    transform: translate(-50%,-50%);
}
.text{
    color: #fff;
    margin-left: 1.5rem;
}
.likeCount{
    margin-left: .2rem;
    color: #fff;
    font-size: var(--sm-font);
}
.likeCount.heart-active, .text.heart-active{
    color: var(--clr-accent);
}
.heart.heart-active{
    animation: animate .8s steps(28) 1;
    background-position: right;
}
@keyframes animate {
    0%{
        background-position: left;
    }
    100%{
        background-position: right;
    }
}

</style>
@endsection

@section('content')
    <section class="blogDetail" id="blogDetail">

        <!-- ========== Circles ========== -->
        <div class="circle circle-home-one d-none">
            <img src="frontend/images/circle-small.png" alt="">
        </div>


        <div class="container">
            <div class="blog">
                <div class="go-to-back">
                    <a href="{{ route('blogs.index') }}" class="line-btn">&larr; Go to Blog List</a>
                </div>
                <div class="blog-heading">
                    <div class="blog-title">
                        {{ $blog->title }}
                    </div>
                    <div class="blog-info">
                        <div class="date">
                            <i class="fas fa-calendar"></i> {{ $blog->created_at->diffForHumans() }}
                        </div>
                        <div class="category">
                            <a href="{{ route('blogs.index', ['category' => $blog->category->name]) }}" class="line-btn"><i class="fa fa-folder"></i> {{ $blog->category->name }}</a>
                        </div>
                        <div class="author">
                            <a href="{{ route('blogs.index', ['author' => $blog->author->name]) }}" class="line-btn"><i class="fas fa-user"></i> {{ $blog->author->name }}</a>
                        </div>
                    </div>
                </div>
                <div class="blog-img">
                    <img src="{{ $blog->image_path }}" alt="">
                </div>

                <div class="blog-content">
                    {!! $blog->content !!}
                </div>

                <hr>
                <div class="blog-loveBtn">
                    <h1>Thanks for reading our blog post.</h1>
                    <div class="heart-btn">
                        <div class="likeBtn content">
                            <span class="heart"></span>
                            <span class="text">Love This Post</span>
                            <span class="likeCount">13</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="related-posts">
                <div class="title">
                    <h1>Related Posts</h1>
                    <p>You may also like these blogs</p>
                </div>

                <div class="posts-container">
                    <div class="row">
                        @foreach ($relatedBlogs as $blog)

                            <div class="@if(count($relatedBlogs) == 1 || count($relatedBlogs) > 2) col-lg-4 col-md-6 @else col-md-6 @endif post-item">
                                <div class="post-img">
                                    <img src="{{ $blog->image_path }}" alt="">
                                    <div class="icons">
                                        <a href="#"> <i class="fas fa-calendar"></i> {{ $blog->created_at->diffForHumans() }}</a>
                                        <a href="{{ route('blogs.index', ['author' => $blog->author->name]) }}" class="line-btn"> <i class="fas fa-user"></i> by {{ $blog->author->name }}</a>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <div class="post-category">
                                        <span><a href="{{ route('blogs.index', ['category' => $blog->category->name]) }}" class="line-btn"> <i class="fa fa-folder"></i> {{ $blog->category->name }}</a></span>
                                    </div>
                                    <div class="post-title">
                                        <a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('custom_js')

<script>
    const likeBtn = document.querySelector(".likeBtn");
    const likeCount = document.querySelector(".likeCount");
    const text = document.querySelector(".text");
    const heart = document.querySelector(".heart");

    let clicked = false;

    likeBtn.addEventListener("click", function () {
        if (!clicked) {
            clicked = true;
            likeCount.textContent++;
            this.classList.add("heart-active");
            text.classList.add("heart-active");
            heart.classList.add("heart-active");
            likeCount.classList.add("heart-active");
        } else {
            clicked = false;
            this.classList.remove("heart-active");
            text.classList.remove("heart-active");
            heart.classList.remove("heart-active");
            likeCount.classList.remove("heart-active");
            likeCount.textContent--;
        }
    });
</script>
@endsection
