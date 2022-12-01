@extends('author.layout.layout')
@section('title')
    {{ $title }}
@endsection
@section('header')
    @include('author.component.header')
@endsection
@section('main')
    <div class="container-fluid text-center py-5"
        style="background-color:{{ $darkMode ? 'var(--background-color-dark)' : 'var(--background-color-light)' }}">
        <div class="d-block">
            <img src="{{ asset('images') . '/' . $auth->avatar }}" alt="img" class="avatar rounded-circle"
                style="width:200px;height:200px">
            <h3 class="name mt-1 fs-2" style="color:{{ $darkMode ? 'var(--text-white-100)' : 'var(--text-dark-100)' }}">
                {{ $auth->user_name }}</h3>
        </div>
        <div class="row gx-3 gy-3 mt-4 p-xxl-3 p-xl-0 p-lg-3 p-md-4 p-sm-3">
            <div class="col-xl-3 col-lg-4 col-sm-12 col-md-6">
                <div class=" p-3 rounded-4 text-white text-start h-100 shadow-sm option"
                    style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }}">
                    <a href="{{ route('author.management.management-avatar') }}"
                        class="option_title fs-5 mb-1 fw-bold text-decoration-none"
                        style="color:{{ $darkMode ? 'var(--text-white-100)' : 'var(--text-dark-100)' }}">Thay đổi
                        Avatar</a>
                    <p class="description fs-6 mb-0 fw-light"
                        style="color:{{ $darkMode ? 'var(--text-white-50)' : 'var(--text-dark-75)' }}">Chọn ảnh đại diện
                        (PNG/JPG)</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-12 col-md-6">
                <div class=" p-3 rounded-4 text-white text-start h-100 shadow-sm option"
                    style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }}">
                    <a href="{{ route('author.management.management-password') }}"
                        class="option_title fs-5 mb-1 fw-bold text-decoration-none"
                        style="color:{{ $darkMode ? 'var(--text-white-100)' : 'var(--text-dark-100)' }}">Quản lí mật
                        khẩu</a>
                    <p class="description fs-6 mb-0 fw-light"
                        style="color:{{ $darkMode ? 'var(--text-white-50)' : 'var(--text-dark-75)' }}">Đổi mật khẩu, đánh
                        giá tính an toàn
                    </p>
                </div>
            </div>
            {{-- Chuc nang Quản lí Email --}}
            {{-- <div class="col-xl-3 col-lg-4 col-sm-12 col-md-6">
                <div class=" p-3 rounded-4 text-white text-start h-100 shadow-sm option"
                    style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }}">
                    <a href="" class="option_title fs-5 mb-1 fw-bold text-decoration-none"
                        style="color:{{ $darkMode ? 'var(--text-white-100)' : 'var(--text-dark-100)' }}">Quản lí
                        Email</a>
                    <p class="description fs-6 mb-0 fw-light"
                        style="color:{{ $darkMode ? 'var(--text-white-50)' : 'var(--text-dark-75)' }}">
                        <i class="fa-solid fa-check rounded-circle bg-primary p-1 text-dark" style="font-size:12px"></i>
                        {{ $auth->email }}
                    </p>
                </div>
            </div>
            {{-- Chuc nang Danh sách các phiên đăng nhập gần ddaay --}}
            {{-- <div class="col-xl-3 col-lg-4 col-sm-12 col-md-6">
                <div class=" p-3 rounded-4 text-white text-start h-100 shadow-sm option"
                    style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }}">
                    <a href="#" class="option_title fs-5 mb-1 fw-bold text-decoration-none"
                        style="color:{{ $darkMode ? 'var(--text-white-100)' : 'var(--text-dark-100)' }}">Lịch sử đăng
                        nhập</a>
                    <p class="description fs-6 mb-0 fw-light"
                        style="color:{{ $darkMode ? 'var(--text-white-50)' : 'var(--text-dark-75)' }}">Danh sách các phiên
                        đăng nhập gần
                        đây</p>
                </div>
            </div>  --}}
            <div class="col-xl-3 col-lg-4 col-sm-12 col-md-6">
                <div class=" p-3 rounded-4 text-white text-start h-100 shadow-sm option"
                    style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }}">
                    <a href="{{ route('author.management.management-information') }}"
                        class="option_title fs-5 mb-1 fw-bold text-decoration-none"
                        style="color:{{ $darkMode ? 'var(--text-white-100)' : 'var(--text-dark-100)' }}">Điều chỉnh hồ
                        sơ</a>
                    <p class="description fs-6 mb-0 fw-light"
                        style="color:{{ $darkMode ? 'var(--text-white-50)' : 'var(--text-dark-75)' }}">Thông tin cơ bản</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-12 col-md-6">
                <div class=" px-3 rounded-4 text-white text-start h-100 shadow-sm option d-flex align-items-center"
                    style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};min-height:86px">
                    <a href="{{ route('author.index') }}" id="logout"
                        class="text-uppercase fs-6 border p-2 rounded-3 text-decoration-none option_exit"
                        style="color:{{ $darkMode ? 'var(--text-white-100)' : 'var(--text-dark-100)' }};border-color:{{ $darkMode ? 'var(--text-white-100)' : 'var(--text-dark-75)' }}!important">
                        Thoát
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jvscript')
    var exitBtn = document.getElementById("logout");
    exitBtn.onclick = (e) => {
    e.preventDefault();
    let i = 10;
    e.target.style.backgroundColor = "#F25C45";
    e.target.innerHTML = "Xác nhận thoát tài khoản? (" + i + ")";
    i--;
    let countDown = setInterval(() => {
    if (i >= 0) {
    e.target.innerHTML = "Xác nhận thoát tài khoản? (" + i + ")";
    i--;
    } else {
    clearInterval(countDown);
    e.target.style.backgroundColor =
    "{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }}";
    e.target.innerHTML = "Thoát <i class='fa-solid fa-arrow-right-from-bracket'></i>";
    }
    }, 1000)
    }
@endsection
@section('footer')
    @include('author.component.footer')
@endsection
