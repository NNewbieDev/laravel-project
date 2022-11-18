@extends('author.layout.layout')
@section('title')
    {{ $title }}
@endsection
@section('header')
    @include('author.header')
@endsection
@section('main')
    <div class="container-fluid text-center py-5" style="background-color:#353536">
        <div class="d-block">
            <img src="{{ asset('images') . '/' . $auth->avatar }}" alt="img" class="avatar rounded-circle"
                style="width:200px;height:200px">
            <h3 class="name mt-1 fs-2 text-white">{{ $auth->authorName }}</h3>
        </div>
        <div class="row gx-3 gy-3 mt-4 p-xxl-3 p-xl-0 p-lg-3 p-md-4 p-sm-3">
            <div class="col-xl-3 col-lg-4 col-sm-12 col-md-6">
                <div class=" p-3 rounded-4 text-white text-start h-100 shadow-sm option" style="background-color: #2B2B2C">
                    <a href="{{ route('author.management.management-avatar') }}"
                        class="option_title fs-5 mb-1 fw-bold text-decoration-none text-white">Thay đổi
                        Avatar</a>
                    <p class="description fs-6 mb-0 fw-light text-white text-opacity-50">Chọn ảnh đại diện (PNG/JPG)</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-12 col-md-6">
                <div class=" p-3 rounded-4 text-white text-start h-100 shadow-sm option" style="background-color: #2B2B2C">
                    <a href="{{ route('author.management.management-password') }}"
                        class="option_title fs-5 mb-1 fw-bold text-decoration-none text-white">Quản lí mật
                        khẩu</a>
                    <p class="description fs-6 mb-0 fw-light text-white text-opacity-50">Đổi mật khẩu, đánh giá tính an toàn
                    </p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-12 col-md-6">
                <div class=" p-3 rounded-4 text-white text-start h-100 shadow-sm option" style="background-color: #2B2B2C">
                    <a href="" class="option_title fs-5 mb-1 fw-bold text-decoration-none text-white">Quản lí
                        Email</a>
                    <p class="description fs-6 mb-0 fw-light text-white text-opacity-50">
                        <i class="fa-solid fa-check rounded-circle bg-primary p-1 text-dark" style="font-size:12px"></i>
                        {{ $auth->email }}
                    </p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-12 col-md-6">
                <div class=" p-3 rounded-4 text-white text-start h-100 shadow-sm option" style="background-color: #2B2B2C">
                    <a href="#" class="option_title fs-5 mb-1 fw-bold text-decoration-none text-white">Lịch sử đăng
                        nhập</a>
                    <p class="description fs-6 mb-0 fw-light text-white text-opacity-50">Danh sách các phiên đăng nhập gần
                        đây</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-12 col-md-6">
                <div class=" p-3 rounded-4 text-white text-start h-100 shadow-sm option" style="background-color: #2B2B2C">
                    <a href="{{ route('author.management.management-information') }}"
                        class="option_title fs-5 mb-1 fw-bold text-decoration-none text-white">Điều chỉnh hồ
                        sơ</a>
                    <p class="description fs-6 mb-0 fw-light text-white text-opacity-50">Thông tin cơ bản</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-12 col-md-6">
                <div class=" px-3 rounded-4 text-white text-start h-100 shadow-sm option d-flex align-items-center"
                    style="background-color: #2B2B2C">
                    <a href="{{ route('author.index') }}" id="logout"
                        class="text-uppercase fs-6 border p-2 rounded-3 text-decoration-none text-white option_exit">
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
    console.log('i');
    if (i >= 0) {
    e.target.innerHTML = "Xác nhận thoát tài khoản? (" + i + ")";
    i--;
    } else {
    clearInterval(countDown);
    e.target.style.backgroundColor = "#2B2B2C";
    e.target.innerHTML = "Thoát <i class='fa-solid fa-arrow-right-from-bracket'></i>";
    }
    }, 1000)
    }
@endsection
@section('footer')
    @include('author.footer')
@endsection
