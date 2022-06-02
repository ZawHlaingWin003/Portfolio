
<!-- ========== Home Section ========== -->
<section class="home" id="home">

    <div class="container">
        <!-- ========== Circles ========== -->
        <div class="circle circle-home-one d-none">
            <img src="frontend/images/circle-small.png" alt="">
        </div>

        <div class="circle circle-home-two d-none">
            <img src="frontend/images/circle-small.png" alt="">
        </div>

        <!-- ========== Quick Links ========== -->
        <nav class="quick-links d-none">
            <ul>
                <li>
                    <a href="#home" class="dot active" data-scroll="home">
                        <span>home</span>
                    </a>
                </li>
                <li>
                    <a href="#about" class="dot" data-scroll="about">
                        <span>about</span>
                    </a>
                </li>
                <li>
                    <a href="#skills" class="dot" data-scroll="skills">
                        <span>skills</span>
                    </a>
                </li>
                <li>
                    <a href="#projects" class="dot" data-scroll="projects">
                        <span>projects</span>
                    </a>
                </li>
                <li>
                    <a href="#blogs" class="dot" data-scroll="blogs">
                        <span>blogs</span>
                    </a>
                </li>
                <li>
                    <a href="#contact" class="dot" data-scroll="contact">
                        <span>contact</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- ========== Profile Text ========== -->
        <div class="profile">
            <div class="profile__text">
                <p class="profile__text-intro">Hello I'm</p>
                <div class="profile__text-name">
                    <h1 class="display-1">Zaw Hlaing Win</h1>
                </div>
                <p class="profile__text-job">Aesthetic Web Developer with primary focus on "Laravel + Vuejs"</p>

                <div class="profile__text-btns">
                    <a href="#" class="main-btn">
                        View Projects
                        <span>
                            <svg>
                                <use xlink:href="#arrow" href="#arrow"></use>
                            </svg>
                        </span>
                    </a>
                    <a href="{{ route('download-cv') }}" class="main-btn">
                        Download CV
                        <span>
                            <svg>
                                <use xlink:href="#arrow" href="#arrow"></use>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="scroll-down">
            <a href="#about" class="scroll-down__link">
                <span class="scroll-down__mouse"></span>
                <span class="scroll-down__text">Scroll Down</span>
            </a>
        </div>
    </div>

</section>
