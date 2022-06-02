<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coder ZawGyi @yield('title')</title>

    <!-- FontAwesome Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- Image Click & Show -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css" />

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/app.css') }}" />

    <!-- Custom Styles -->
    @yield('custom_css')

</head>
<body>

    <!-- ========== Scroll Top Btn ========== -->
    <div class="scroll-top-btn" title="Scroll To Top">
        <i class="fa fa-chevron-up"></i>
    </div>


    <!-- ========== Github Icon ========== -->
    <a href="https://github.com/ZawHlaingWin003" class="github-corner" title="check my github">
        <svg width="50" height="50" viewBox="0 0 250 250"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="#e7e7e7" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="#e7e7e7" class="octo-body"></path></svg>
    </a>


    <!-- ========== Main Button's SVG ========== -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <defs>
            <symbol id="arrow" viewBox="0 0 100 100">
                <path d="M12.5 45.83h64.58v8.33H12.5z" />
                <path d="M59.17 77.92l-5.84-5.84L75.43 50l-22.1-22.08 5.84-5.84L87.07 50z" />
            </symbol>
        </defs>
    </svg>


    <!-- ========== Loading ========== -->
    <div class="load-wrap">
        <div class="loading">
            <div class="letter-holder">
                <div class="l-1 letter">l</div>
                <div class="l-2 letter">o</div>
                <div class="l-3 letter">a</div>
                <div class="l-4 letter">d</div>
                <div class="l-5 letter">i</div>
                <div class="l-6 letter">n</div>
                <div class="l-7 letter">g</div>
                <div class="l-8 letter">.</div>
                <div class="l-9 letter">.</div>
                <div class="l-10 letter">.</div>
            </div>
        </div>
    </div>



    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')




    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- TweenMax and Gsap -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TimelineMax.min.js"></script>

    <!-- Image Click & Show -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>

    <!-- Main Script -->
    <script src="{{ asset('frontend/js/app.js') }}"></script>

    <!-- Custom Script -->
    @yield('custom_js')

</body>
</html>
