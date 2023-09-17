<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/logo-symbol.png" type="image/x-icon">
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
                    <a href="{{ route('index') }}">
                        <img src="/images/logo.png" alt="logo" class="logo">
                    </a>
                </div>
            </div>
            <div class="header-right col-lg-6 align-self-center ">
                <div class="header-right-block row g-0 align-items-center ">
                    <div class="header-search col-lg-6 justify-content-end ">
                        <form method="POST" action="{{ route('index') }}" class="header-form d-flex">
                            @csrf
                            <input type="text" placeholder="Tìm kiếm bài báo..." class="search-input" name="search">
                            <button type="submit" class="search-btn">
                                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                            </button>
                        </form>
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
                                @else
                                    <div>
                                        <a href="{{ route('author.index') }}" class="manage">Quản lý tài khoản</a>
                                    </div>
                                    <div>
                                        <a href="{{ route('cusLogout') }}" class="logout">Đăng xuất</a>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav">
            <ul class="nav-bar">
                @foreach ($category as $item)
                    <li class="nav-bar-item">
                        <a href="{{ route('nav', ['id' => $item->id, 'name' => $item->name]) }}">
                            {{ $item->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
        <div class="warning">
            <div class="warning-block">
                <div class="warning-close">
                    <i class="fa-solid fa-xmark close-icon"></i>
                </div>
                <div class="warning-text">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span> Vui lòng đăng nhập!
                    </span>
                </div>
            </div>
        </div>

        <div class="footer ">
            <div class="row g-0 d-flex justify-content-center ">
                <div class="footer-category col-lg-8">
                    <div class="row g-0">
                        @foreach ($category as $item)
                            <li class="nav-bar-item col-lg-3"><a
                                    href="{{ route('index') }}">{{ $item->CategoryName }}</a>
                            </li>
                        @endforeach
                    </div>
                </div>
                <div class="footer-contact col-lg-4">
                    <div class="footer-channel">
                        <div class="footer-phone row g-0">
                            <div class="col-lg-6">
                                <div>Liên hệ tòa soạn</div>
                                <b>
                                    <h3 class="phone-number text-bold">
                                        09123456781
                                    </h3>
                                </b>
                            </div>
                        </div>
                        <div class="footer-media row g-0">
                            <div class="col-lg-1">
                                <i class="fa-brands fa-facebook" style="color: #4E89AE"></i>
                            </div>
                            <div class="col-lg-1">
                                <i class="fa-brands fa-youtube" style="color: #E64848"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="footer-member col-lg-8">
                    <h5>Cộng tác viên</h5>
                    <ul class="member-role row">
                        <li class="member col-lg-4"> Trần Thị Giáng My</li>
                        <li class="member col-lg-4"> Nguyễn Phạm Thanh Hoàng </li>
                        <li class="member col-lg-4"> Nguyễn Thị Kim Ngân</li>
                        <li class="member col-lg-4"> Bùi Văn Nin</li>
                        <li class="member col-lg-4"> Phạm Đức Mạnh</li>
                        <li class="member col-lg-4"> Liêu Hà Phương Huy</li>
                    </ul>
                </div>
                <div class="footer-logo col-lg-4">
                    <a href="{{ route('index') }}">
                        <img src="/images/logo.png" alt="logo" class="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
