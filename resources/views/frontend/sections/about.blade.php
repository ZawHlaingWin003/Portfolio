<!-- ========== About Section ========== -->
<section class="about" id="about">

    <div class="container">
        <div class="main-title title-left about__title" data-content="About">
            <div class="main-title__number">
                <p>01</p>
            </div>
            <div class="main-title__text">
                <p class="main-title__text-short">About Me</p>
                <p class="main-title__text-long">Who I Am</p>
            </div>
        </div>
        <div class="about__container">
            <div class="tabs-wrap">

                <input type="radio" id="tab1" name="about" class="tab-btn" checked>
                <label for="tab1" class=""><i class="fa fa-people-carry"></i> Biography</label>

                <input type="radio" id="tab2" name="about" class="tab-btn">
                <label for="tab2" class=""><i class="fa fa-book"></i> Gallery</label>

                <input type="radio" id="tab3" name="about" class="tab-btn">
                <label for="tab3" class=""><i class="fa fa-code"></i> Skills</label>

                <div class="articles-wrap">
                    <div class="tab-content biography">
                        <div class="biography__container">
                            <div class="biography__img">
                                <a href="{{ asset('frontend/images/mine/pf-3.jpg') }}" data-caption="My Photo" class="lightbox" style="width: 80%"><span><img src="frontend/images/mine/pf-3.jpg" alt="" /></span></a>
                            </div>
                            <div class="biography__text-container">
                                <div class="biography__text notebook">
                                    <p>
                                        Zaw Hlaing Win is an experienced web developer specializing in Laravel and Vue.js. He has worked on a variety of projects, from small personal websites to large-scale enterprise applications.

                                        His passion for web development began when he was in college, where he studied computer science. Even before graduating, he worked as a software engineer for a few years, where he gained valuable experience in programming languages such as Java, C++, PHP. However, he soon realized that his true passion was web development, particularly working with Laravel and Vue.js.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-content gallery">
                        <div class="intro gallery__intro">
                            <h1>These are my favourite pics which through my life with my family and friends. <img src="frontend/images/gif/Ball.gif" width="30" height="30"></h1>
                        </div>
                        <div class="gallery-container">
                            <div class="row">
                                <div class="column">
                                    <a href="{{ asset('frontend/images/mine/zaw-1.jpg') }}" class="lightbox" data-caption="Photo 1">
                                        <img src="{{ asset('frontend/images/mine/zaw-1.jpg') }}" class="img-fluid" alt="First image">
                                    </a>
                                    <a href="{{ asset('frontend/images/mine/zaw-2.jpg') }}" class="lightbox" data-caption="Photo 2">
                                        <img src="{{ asset('frontend/images/mine/zaw-2.jpg') }}" class="img-fluid" alt="First image">
                                    </a>
                                </div>
                                <div class="column">
                                    <a href="{{ asset('frontend/images/mine/zaw-3.jpg') }}" class="lightbox" data-caption="Photo 3">
                                        <img src="{{ asset('frontend/images/mine/zaw-3.jpg') }}" class="img-fluid" alt="First image">
                                    </a>
                                    <a href="{{ asset('frontend/images/mine/zaw-4.jpeg') }}" class="lightbox" data-caption="Photo 4">
                                        <img src="{{ asset('frontend/images/mine/zaw-4.jpeg') }}" class="img-fluid" alt="First image">
                                    </a>
                                    <a href="{{ asset('frontend/images/mine/zaw-5.jpeg') }}" class="lightbox" data-caption="Photo 5">
                                        <img src="{{ asset('frontend/images/mine/zaw-5.jpeg') }}" class="img-fluid" alt="First image">
                                    </a>
                                </div>
                                <div class="column last">
                                    <a href="{{ asset('frontend/images/mine/zaw-6.jpeg') }}" class="lightbox" data-caption="Photo 6">
                                        <img src="{{ asset('frontend/images/mine/zaw-6.jpeg') }}" class="img-fluid" alt="First image">
                                    </a>
                                    <a href="{{ asset('frontend/images/mine/zaw-7.jpeg') }}" class="lightbox" data-caption="Photo 7">
                                        <img src="{{ asset('frontend/images/mine/zaw-7.jpeg') }}" class="img-fluid" alt="First image">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content skills">
                        <div class="intro skills__intro">
                            <h1>I'm fullstack web developer and currently working with these skills. <img src="frontend/images/gif/Trophy.gif" width="30" height="30"></h1>
                        </div>
                        <div class="skills-container">
                            <div class="row">
                                <div class="col-md-6 skill">
                                    <div class="skill-logo">
                                        <img src="{{ asset('frontend/images/logos/bootstrap-4.svg') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="skill-detail">
                                        <h3>Frontend Development</h3>
                                        <div class="skill-list d-flex gap-3">
                                            <p>HTML</p>
                                            <p>CSS</p>
                                            <p>Javascript</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 skill">
                                    <div class="skill-logo">
                                        <img src="{{ asset('frontend/images/logos/tailwindcss-icon.svg') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="skill-detail">
                                        <h3>Frontend Frameworks</h3>
                                        <div class="skill-list d-flex gap-3">
                                            <p>Bootstrap</p>
                                            <p>Tailwind</p>
                                            <p>Vuejs</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 skill">
                                    <div class="skill-logo">
                                        <img src="{{ asset('frontend/images/logos/jquery-icon.svg') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="skill-detail">
                                        <h3>Frontend Libraries</h3>
                                        <div class="skill-list d-flex gap-3">
                                            <p>JQuery</p>
                                            <p>Three.js</p>
                                            <p>GSAP</p>
                                            <p>Chart.js</p>
                                            <p>Swiper.js</p>
                                            <p>Anime.css</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 skill">
                                    <div class="skill-logo">
                                        <img src="{{ asset('frontend/images/logos/mysql-icon.svg') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="skill-detail">
                                        <h3>Backend Development</h3>
                                        <div class="skill-list d-flex gap-3">
                                            <p>PHP</p>
                                            <p>Mysql</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 skill">
                                    <div class="skill-logo">
                                        <img src="{{ asset('frontend/images/logos/laravel-icon.svg') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="skill-detail">
                                        <h3>Backend Framework</h3>
                                        <div class="skill-list d-flex gap-3">
                                            <p>Laravel</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 skill">
                                    <div class="skill-logo">
                                        <img src="{{ asset('frontend/images/logos/github.svg') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="skill-detail">
                                        <h3>Others</h3>
                                        <div class="skill-list d-flex gap-3">
                                            <p>Git & Github</p>
                                            <p>Linux</p>
                                            <p>Microsoft Word</p>
                                            <p>Excel</p>
                                            <p>Powerpoint</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>