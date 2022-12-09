@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="register-box row g-0 justify-content-center">
            <div class="register-form col-lg-5">
                <div class="register-title">
                    <i class="fa-solid fa-user register-title__icon"></i>
                    <div class="register-title__text">Tạo tài khoản</div>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row g-0 mb-3">
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

                    <div class="row g-0 mb-3">
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

                    <div class="row g-0 mb-3">
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

            {{-- Đăng ký tác giả --}}
            <div class="register-author col-lg-5 ">
                <div class="register-author__poster">
                    <div class="register-author__title">
                        <h1 class="title">Trở thành cộng tác viên</h1>
                    </div>
                    <img src="images/become-partner.jpg" alt="">
                    <div class="register-author__sub">
                        Hãy trở thành cộng tác viên với chúng tôi để cùng nhau đưa những thông tin chất lượng đến với cộng
                        đồng.
                        Trở thành cộng tác viên bạn còn có được những quyền lợi và ưu đãi hấp dẫn.
                    </div>
                    <div class="register-author__btn" onclick="">
                        <a href="{{ route('register-author') }}">Đăng ký ngay</a>
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
