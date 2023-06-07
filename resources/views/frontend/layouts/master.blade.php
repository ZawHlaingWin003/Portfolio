<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coder ZawGyi @yield('title')</title>

    <!-- ========== Styles ========== -->
    @include('frontend.partials.styles')

    <!-- ========== Custom Styles ========== -->
    @yield('custom_css')

</head>

<body>
    <!-- ========== Main Button's SVG (that link with main button) ========== -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <defs>
            <symbol id="arrow" viewBox="0 0 100 100">
                <path d="M12.5 45.83h64.58v8.33H12.5z" />
                <path d="M59.17 77.92l-5.84-5.84L75.43 50l-22.1-22.08 5.84-5.84L87.07 50z" />
            </symbol>
        </defs>
    </svg>

    <!-- ========== Scroll Top Btn ========== -->
    @include('frontend.partials.scroll-top-button')

    <!-- ========== Github Icon ========== -->
    @include('frontend.partials.github-icon')

    <!-- ========== Top Circle ========== -->
    <x-circle class="circle-small" />


    <!-- ========== Loader ========== -->
    @include('frontend.partials.loader')


    <!-- ========== Header ========== -->
    @include('frontend.partials.header')


    @yield('content')


    <!-- ========== Footer ========== -->
    @include('frontend.partials.footer')



    <!-- ========== Scripts ========== -->
    @include('frontend.partials.scripts')

    <!-- ========== Custom Scripts ========== -->
    @yield('custom_js')

</body>

</html>
