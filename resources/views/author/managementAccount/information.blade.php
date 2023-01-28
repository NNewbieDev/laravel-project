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
            <div class="py-3 px-4 rounded-4 text-white text-start h-100 option mt-4 shadow"
                style="background-color: {{ $darkMode ? 'var(--dark-clr)' : 'var(--white-clr)' }}">
                <p class="fs-6" style="color:{{ $darkMode ? 'var(--white-clr)' : 'var(--dark-clr); font-weight:bold;' }}">
                    (*)Các thông
                    tin bên dưới đều không bắt buộc, không công khai,
                    không
                    trao đổi với bất cứ ai. Chúng chỉ được sử dụng khi quản trị viên muốn liên hệ với bạn.</p>
                <form action="{{ route('author.management.changed-information') }}" method='POST' class="mt-4 mb-3">
                    @csrf
                    <div class="position-relative mt-3">
                        <input name="phone_number" type="text" id="phone_number"
                            class="form-control shadow-none  fs-6 fw-normal p-3 form_input"
                            style="background-color:{{ $darkMode ? 'var(--dark-clr)' : 'var(--white-clr)' }};border-color:#918989;color:{{ $darkMode ? 'var(--white-clr)' : 'var(--dark-clr)' }}"
                            placeholder="&nbsp;"
                            value="{{ old('phone_number') ? old('phone_number') : Auth::user()->phone }}">
                        <label for="phone_number" class="position-absolute px-2 py-1 input_label"
                            style="left:18px;background-color:{{ $darkMode ? 'var(--dark-clr)' : 'var(--white-clr)' }};color:{{ $darkMode ? 'var(--white-clr)' : 'var(--dark-clr)' }}">Số
                            điện thoại</label>
                        @error('phone_number')
                            <p class="mt-1 mb-2 fs-6 fw-normal text-danger px-3">
                                <i class="fa-solid fa-circle-exclamation me-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="position-relative mt-3">
                        <input name="full_name" type="text" id="full_name"
                            class="form-control shadow-none  fs-6 fw-normal p-3 form_input"
                            style="background-color:{{ $darkMode ? 'var(--dark-clr)' : 'var(--white-clr)' }};border-color:#918989;color:{{ $darkMode ? 'var(--white-clr)' : 'var(--dark-clr)' }}"
                            placeholder="&nbsp;"
                            value="{{ old('full_name') ? old('full_name') : Auth::user()->fullname }}">
                        <label for="full_name" class="position-absolute px-2 py-1 input_label"
                            style="left:18px;background-color:{{ $darkMode ? 'var(--dark-clr)' : 'var(--white-clr)' }};color:{{ $darkMode ? 'var(--white-clr)' : 'var(--dark-clr)' }}">Họ
                            và tên</label>
                        @error('full_name')
                            <p class="mt-1 mb-2 fs-6 fw-normal text-danger px-3">
                                <i class="fa-solid fa-circle-exclamation me-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="position-relative mt-3">
                        <input name="address" type="text" id="address"
                            class="form-control shadow-none fs-6 fw-normal p-3 form_input"
                            style="background-color:{{ $darkMode ? 'var(--dark-clr)' : 'var(--white-clr)' }};border-color:#918989;color:{{ $darkMode ? 'var(--white-clr)' : 'var(--dark-clr)' }}"
                            placeholder="&nbsp;" value="{{ old('address') ? old('address') : Auth::user()->address }}">
                        <label for="address" class="position-absolute px-2 py-1 input_label"
                            style="left:18px;background-color:{{ $darkMode ? 'var(--dark-clr)' : 'var(--white-clr)' }};color:{{ $darkMode ? 'var(--white-clr)' : 'var(--dark-clr)' }}">Địa
                            chỉ</label>
                        @error('address')
                            <p class="mt-1 mb-2 fs-6 fw-normal text-danger px-3">
                                <i class="fa-solid fa-circle-exclamation me-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <input type="submit" value="Lưu hồ sơ"
                        class="py-2 px-3 fs-6 mt-3 rounded-3 text-uppercase text-opacity-75"
                        style="background-color:var(--primary-color);color:var(--white-clr);border:none!important;">
                </form>

            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('author.component.footer')
@endsection
