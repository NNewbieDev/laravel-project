<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="header row g-0">
            <div class="header-left col-lg-6">
                <div class="header-logo">
                    <img src="/images/logo.png" alt="logo" class="logo">
                </div>
            </div>
            <div class="header-right col-lg-6 align-self-center ">
                <div class="header-right-block row g-0 align-items-center ">
                    <div class="header-search col-lg-6 justify-content-end ">
                        <input type="text" placeholder="Tìm kiếm bài báo..." class="search-input">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    </div>
                    <div class="header-account col-lg-6">
                        <div class="account-block">
                            <i class="fa-solid fa-user account-icon"></i>
                            <div class="dropdown">
                                @guest
                                    @if (Route::has('login'))
                                        <div><a href="{{ route('login') }}" class="login">Đăng nhập</a></div>
                                    @endif
                                    @if (Route::has('register'))
                                        <div><a href="{{ route('register') }}" class="register">Đăng ký</a></div>
                                    @endif
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav">
            <ul class="nav-bar">
                <li class="nav-bar-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                <li class="nav-bar-item"><a href="{{ route('index') }}">Công nghệ</a></li>
                <li class="nav-bar-item"><a href="{{ route('index') }}">Kinh tế</a></li>
                <li class="nav-bar-item"><a href="{{ route('index') }}">Chính trị</a></li>
                <li class="nav-bar-item"><a href="{{ route('index') }}">Sức khỏe</a></li>
                <li class="nav-bar-item"><a href="{{ route('index') }}">Giải trí</a></li>
            </ul>
        </div>

        <main class="py-4">
            @yield('content')
        </main>

    </div>
</body>

</html>
