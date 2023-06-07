<!-- ========== Home Section ========== -->
<section class="home" id="home">
    
    <!-- ========== Circles ========== -->
    <x-circle class="circle-home-small" />

    <!-- ========== Quick Links ========== -->
    @include('frontend.partials.quick-links')

    <div class="container">
        <!-- ========== Profile Text ========== -->
        <div class="profile">
            <div class="profile__text">
                <p class="profile__text-intro">Hello I'm</p>
                <div class="profile__text-name">
                    <h1 class="display-1">Zaw Hlaing Win</h1>
                </div>
                <p class="profile__text-job">Aesthetic Web Developer with primary focus on "Laravel + Vuejs"</p>

                <div class="profile__text-btns">
                    <x-link-button href="#projects" iconName="fa-suitcase">
                        View Projects
                    </x-link-button>
                    <x-link-button iconName="fa-download">
                        Download CV
                    </x-link-button>
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
