@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="register-box row g-0 justify-content-center">
            <div class="register-form col-lg-5">
                <div class="register-title">
                    <i class="fa-solid fa-user register-title__icon"></i>
                    <div class="register-title__text">Tạo tài khoản</div>
                </div>
                <form method="POST" action="{{ route('regist-author') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="username" class="col-md-4 col-form-label text-md-start">Tên tài khoản</label>

                        <div class="col-md-7">
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" required autocomplete="username">

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-start">Mật khẩu</label>

                        <div class="col-md-7">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-start">Xác nhận mật
                            khẩu</label>

                        <div class="col-md-7">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="register-block__btn">
                        <button type="submit" class="register-btn">
                            Đăng kí
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
