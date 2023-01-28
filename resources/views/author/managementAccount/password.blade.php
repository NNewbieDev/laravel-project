@extends('author.layout.layout')
@section('title')
    {{ $title }}
@endsection
@section('header')
    @include('author.component.header')
@endsection
@section('main')
    <div class="container-fluid text-center py-5"
        style="background-color:{{ $darkMode ? 'var(--dark-clr)' : 'var(--primary-color)' }}">
        <div class="container" style="width:448px">
            <div class="px-3 py-4 rounded-4 text-start h-100 shadow option"
                style="background-color: {{ $darkMode ? 'var(--dark-clr)' : 'var(--white-clr)' }};color:#fff">
                <p class="description fs-6 mb-0"
                    style="color:{{ $darkMode ? 'var(--white-clr)' : 'var(--dark-clr); font-weight: bold;' }}">Bạn đang thay
                    đổi mật khẩu
                    cho
                    tài
                    khoản: <b class="fw-bold" style="color:var(--primary-color);">{{ Auth::user()->username }}</b></p>
            </div>
            <div class="py-3 px-4 rounded-4 text-start h-100 mt-3 shadow option"
                style="background-color: {{ $darkMode ? 'var(--dark-clr)' : 'var(--white-clr)' }}">
                <form action="{{ route('author.management.changed-password') }}" method='POST' class="mt-4 mb-3">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="position-relative mt-3">
                        <input name="old_password" type="password" id="old_password"
                            class="form-control shadow-none fs-6 fw-normal p-3 form_input"
                            style="background-color:{{ $darkMode ? 'var(--dark-clr)' : 'var(--white-clr)' }};border-color:#918989;color:{{ $darkMode ? 'var(--white-clr)' : 'var(--dark-clr)' }}"
                            placeholder="&nbsp;" value="{{ old('old_password') }}">
                        <label for="old_password" class="position-absolute px-2 py-1 input_label"
                            style="left:18px;background-color:{{ $darkMode ? 'var(--dark-clr)' : 'var(--white-clr)' }};color:{{ $darkMode ? 'var(--white-clr)' : 'var(--dark-clr)' }}">Nhập
                            mật khẩu hiện hành</label>
                        @error('old_password')
                            <p class="mt-1 mb-2 fs-6 fw-normal text-danger px-3">
                                <i class="fa-solid fa-circle-exclamation mr-2"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="position-relative mt-3">
                        <input name="new_password" type="password" id="new_password"
                            class="form-control shadow-none fs-6 fw-normal p-3 form_input"
                            style="background-color:{{ $darkMode ? 'var(--dark-clr)' : 'var(--white-clr)' }};border-color:#918989;color:{{ $darkMode ? 'var(--white-clr)' : 'var(--dark-clr)' }}"
                            placeholder="&nbsp;" value="{{ old('new_password') }}">
                        <label for="new_password" class="position-absolute px-2 py-1 input_label"
                            style="left:18px;background-color:{{ $darkMode ? 'var(--dark-clr)' : 'var(--white-clr)' }};color:{{ $darkMode ? 'var(--white-clr)' : 'var(--dark-clr)' }}">Nhập
                            mật khẩu mới</label>
                        @error('new_password')
                            <p class="mt-1 mb-2 fs-6 fw-normal text-danger px-3">
                                <i class="fa-solid fa-circle-exclamation mr-2"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="position-relative mt-3">
                        <input name="new_password_confirmation" type="password" id="new_password_confirmation"
                            class="form-control shadow-none fs-6 fw-normal p-3 form_input"
                            style="background-color:{{ $darkMode ? 'var(--dark-clr)' : 'var(--white-clr)' }};border-color:#918989;color:{{ $darkMode ? 'var(--white-clr)' : 'var(--dark-clr)' }}"
                            placeholder="&nbsp;" value="{{ old('new_password_confirmation') }}">
                        <label for="new_password_confirmation" class="position-absolute px-2 py-1 input_label"
                            style="left:18px;background-color:{{ $darkMode ? 'var(--dark-clr)' : 'var(--white-clr)' }};color:{{ $darkMode ? 'var(--white-clr)' : 'var(--dark-clr)' }}">Nhập
                            lại mật khẩu mới</label>
                        @error('new_password_confirmation')
                            <p class="mt-1 mb-2 fs-6 fw-normal text-danger px-3">
                                <i class="fa-solid fa-circle-exclamation mr-2"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <input type="submit" value="Đổi mật khẩu"
                        class="py-2 px-3 fs-6 mt-3 rounded-3 text-uppercase text-opacity-75"
                        style="background-color:var(--primary-color);border:none!important; color: var(--white-clr)">
                </form>

            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('author.component.footer')
@endsection
