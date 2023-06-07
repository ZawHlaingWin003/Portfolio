<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard @yield('title')</title>

    <!-- FontAwesome Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">

    <style>
        .create-btn{
            font-size: 16px;
            border-radius: 5px;
        }
        .line-btn::after{
            height: 1px;
        }
    </style>

    @yield('custom_css')

</head>
<body>

    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="/" class="">Zaw</a>
            </div>
            <h1>
                Welcome To Admin Dashboard, User -
                <span class="username"><i class="fa fa-user-alt"></i> {{ auth()->user()->name }}</span>
            </h1>
            <div class="logout">
                <a href="{{ route('logout') }}" class="main-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout <i class="fa fa-sign-out-alt"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>

        @if (!Request::routeIs('admin'))
            <div class="home">
                <a href="{{ route('admin') }}" class="line-btn my-3">&larr; Go Back Dashboard</a>
            </div>
        @endif

        {{-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav> --}}

        @yield('content')

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('dashboard/js/other/custom-file-input.js') }}"></script>
    <script src="{{ asset('dashboard/js/other/tag-input.js') }}"></script>
    <script src="{{ asset('dashboard/js/other/ckeditor/ckeditor.js') }}"></script>
    <!-- tilt -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.4.1/vanilla-tilt.min.js"></script> --}}

    <script src="{{ asset('dashboard/js/script.js') }}"></script>

    @yield('custom_js')
</body>
</html>
