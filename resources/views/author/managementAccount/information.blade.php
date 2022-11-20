@extends('author.layout.layout')
@section('title')
    {{ $title }}
@endsection
@section('header')
    @include('author.header')
@endsection
@section('main')
    <div class="container-fluid text-center py-5"
        style="background-color:{{ $darkMode ? 'var(--background-color-dark)' : 'var(--background-color-light)' }}">
        <div class="container" style="width:448px">
            <div class="py-3 px-4 rounded-4 text-white text-start h-100 option mt-4"
                style="background-color: {{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }}">
                <p class="text-white text-opacity-75 fs-6">(*)Các thông tin bên dưới đều không bắt buộc, không công khai,
                    không
                    trao đổi với bất cứ ai. Chúng chỉ được sử dụng khi quản trị viên muốn liên hệ với bạn.</p>
                <form action="{{ route('author.management.changed-information') }}" method='POST' class="mt-4 mb-3">
                    @csrf
                    <div class="position-relative mt-3">
                        <input name="phone_number" type="text" id="phone_number"
                            class="form-control text-white shadow-none  fs-6 fw-normal p-3 form_input"
                            style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};border-color:#918989"
                            placeholder="&nbsp;" value="{{ $auth->phoneNumber }}">
                        <label for="phone_number" class="position-absolute text-white text-opacity-75 px-2 py-1 input_label"
                            style="left:18px;background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};">Số
                            điện thoại</label>
                    </div>
                    <div class="position-relative mt-3">
                        <input name="full_name" type="text" id="full_name"
                            class="form-control text-white shadow-none  fs-6 fw-normal p-3 form_input"
                            style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};border-color:#918989"
                            placeholder="&nbsp;" value="{{ $auth->fullName }}">
                        <label for="full_name" class="position-absolute text-white text-opacity-75 px-2 py-1 input_label"
                            style="left:18px;background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};">Họ
                            và tên</label>
                    </div>
                    <div class="position-relative mt-3">
                        <input name="address" type="text" id="address"
                            class="form-control text-white shadow-none fs-6 fw-normal p-3 form_input"
                            style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};border-color:#918989"
                            placeholder="&nbsp;" value="{{ $auth->address }}">
                        <label for="address" class="position-absolute text-white text-opacity-75 px-2 py-1 input_label"
                            style="left:18px;background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};">Địa
                            chỉ</label>
                    </div>
                    <input type="submit" value="Lưu hồ sơ"
                        class="py-2 px-3 fs-6 mt-3 text-white rounded-3 text-uppercase text-opacity-75"
                        style="background-color:#c27324;border:none!important;">
                </form>

            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('author.footer')
@endsection
