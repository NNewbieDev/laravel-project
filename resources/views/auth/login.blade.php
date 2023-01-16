@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="login-form ">
                    <div class="login-title">
                        <i class="fa-solid fa-user login-title__icon"></i>
                        <div class="login-title__text">Đăng nhập</div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3 justify-content-center">
                                <label for="username" class="col-lg-3 col-md-5 col-form-label text-md-start">Tên tài
                                    khoản</label>

                                <div class="col-lg-5 col-md-7">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <label for="password" class="col-lg-3 col-md-5 col-form-label text-md-start">Mật
                                    khẩu</label>

                                <div class="col-lg-5 col-md-7">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0 justify-content-center">
                                <div class="col-lg-8 offset-lg-4 col-md-8 offset-md-2 ">
                                    <button type="submit" class="btn-login">
                                        Đăng nhập
                                    </button>
                                    <a href="{{ route('register') }}" class="btn-register">Tạo tài khoản
                                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-main')
    const account = document.querySelector('.account-icon');
    const dropdown = document.querySelector('.dropdown');

    account.addEventListener('click', function (e) {
    dropdown.classList.toggle('active');
    });
@endsection
