<!-- ========== BLogs Section ========== -->
<section class="blogs" id="blogs">
    <div class="container">
        <div class="main-title title-left blogs__title" data-content="Blogs">
            <div class="main-title__number">
                <p>03</p>
            </div>
            <div class="main-title__text">
                <p class="main-title__text-short">Read the Articles</p>
                <p class="main-title__text-long">Knowledge sharing for Web Dev</p>
            </div>
        </div>

        <div class="blogs-container">
            <div class="latest-blogs">
                @forelse ($latestBlogs as $blog)
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="{{ $blog->image_path }}" alt="">
                        </div>
                        <div class="blog-content">
                            <div class="blog-title">
                                <a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }}</a>
                            </div>
                            <div class="blog-box">
                                <div class="line"></div>
                                <div class="blog-info">
                                    <div class="blog-date">
                                        {{ $blog->created_at->diffForHumans() }}
                                    </div>
                                    <div class="blog-category">
                                        <a href="{{ route('blogs.index', ['category' => $blog->category->name]) }}"
                                            class="line-btn">{{ $blog->category->name }}</a>
                                    </div>
                                </div>
                                <div class="blog-excerpt">
                                    {{ $blog->excerpt }}
                                </div>
                            </div>
                            <div class="blog-btn">
                                <a href="{{ route('blogs.show', $blog) }}" class="line-btn">Read more &rarr;</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <marquee behavior="" direction="right" scrollamount="12">
                        <div class="no-items">
                            <h1>No Blog Here!</h1>
                        </div>
                    </marquee>
                @endforelse
            </div>
            <div class="more-blogs-btn d-flex justify-content-center">
                <x-link-button href="{{ url('/blogs') }}" iconName="fa-blog">
                    View All Blogs
                </x-link-button>
            </div>
        </div>
    </div>

</section>
