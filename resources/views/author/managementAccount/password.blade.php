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
        <div class="container" style="width:448px">
            <div class="px-3 py-4 rounded-4 text-start h-100 shadow option"
                style="background-color: {{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};color:#fff">
                <p class="description fs-6 mb-0 fw-light"
                    style="color:{{ $darkMode ? 'var(--text-white-50)' : 'var(--text-dark-50)' }}">Bạn đang thay đổi mật khẩu
                    cho
                    tài
                    khoản: <b class="fw-bold" style="color:var(--primary-color);">{{ $auth->UserName }}</b></p>
            </div>
            <div class="py-3 px-4 rounded-4 text-start h-100 mt-3 shadow option"
                style="background-color: {{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }}">
                <form action="{{ route('author.management.changed-password') }}" method='POST' class="mt-4 mb-3">
                    @csrf
                    <div class="position-relative mt-3">
                        <input name="old_password" type="password" id="old_password"
                            class="form-control shadow-none fs-6 fw-normal p-3 form_input"
                            style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};border-color:#918989;;color:{{ $darkMode ? 'var(--text-white-100)' : 'var(--text-dark-100)' }}"
                            placeholder="&nbsp;" value="{{ old('old_password') }}">
                        <label for="old_password" class="position-absolute px-2 py-1 input_label"
                            style="left:18px;background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};color:{{ $darkMode ? 'var(--text-white-75)' : 'var(--text-dark-75)' }}">Nhập
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
                            style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};border-color:#918989;color:{{ $darkMode ? 'var(--text-white-100)' : 'var(--text-dark-100)' }}"
                            placeholder="&nbsp;" value="{{ old('new_password') }}">
                        <label for="new_password" class="position-absolute px-2 py-1 input_label"
                            style="left:18px;background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};color:{{ $darkMode ? 'var(--text-white-75)' : 'var(--text-dark-75)' }}">Nhập
                            mật khẩu mới</label>
                        @error('new_password')
                            <p class="mt-1 mb-2 fs-6 fw-normal text-danger px-3">
                                <i class="fa-solid fa-circle-exclamation mr-2"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="position-relative mt-3">
                        <input name="confirmation_password" type="password" id="confirmation_password"
                            class="form-control shadow-none fs-6 fw-normal p-3 form_input"
                            style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};border-color:#918989;color:{{ $darkMode ? 'var(--text-white-100)' : 'var(--text-dark-100)' }}"
                            placeholder="&nbsp;" value="{{ old('confirmation_password') }}">
                        <label for="confirmation_password" class="position-absolute px-2 py-1 input_label"
                            style="left:18px;background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};color:{{ $darkMode ? 'var(--text-white-75)' : 'var(--text-dark-75)' }}">Nhập
                            lại mật khẩu mới</label>
                        @error('confirmation_password')
                            <p class="mt-1 mb-2 fs-6 fw-normal text-danger px-3">
                                <i class="fa-solid fa-circle-exclamation mr-2"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <input type="submit" value="Đổi mật khẩu"
                        class="py-2 px-3 fs-6 mt-3 rounded-3 text-uppercase text-white text-opacity-75"
                        style="background-color:var(--primary-color);border:none!important">
                </form>

            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('author.component.footer')
@endsection
