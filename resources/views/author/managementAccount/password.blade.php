@extends('author.layout.layout')
@section('title')
    {{ $title }}
@endsection
@section('header')
    @include('author.header')
@endsection
@section('main')
    <div class="container-fluid text-center py-5" style="background-color:#353536">
        <div class="container" style="width:448px">
            <div class="px-3 py-4 rounded-4 text-white text-start h-100 shadow option" style="background-color: #2B2B2C">
                <p class="description fs-6 mb-0 fw-light text-white text-opacity-50 ">Bạn đang thay đổi mật khẩu cho tài
                    khoản: <b class="fw-bold" style="color:#c27324;">{{ $auth->authorName }}</b></p>
            </div>
            <div class="py-3 px-4 rounded-4 text-white text-start h-100 mt-3 shadow option"
                style="background-color: #2B2B2C">
                <form action="{{ route('author.post-news') }}" method='POST' enctype="multipart/form-data"
                    class="mt-4 mb-3">
                    @csrf
                    <div class="position-relative mt-3">
                        <input name="old_password" type="password" id="old_password"
                            class="form-control text-white shadow-none  fs-6 fw-normal p-3 form_input"
                            style="background-color:#2B2B2C;border-color:#918989" placeholder="&nbsp;">
                        <label for="old_password" class="position-absolute text-white text-opacity-75 px-2 py-1 input_label"
                            style="left:18px;background-color:#2B2B2C;">Nhập mật khẩu hiện hành</label>
                    </div>
                    <div class="position-relative mt-3">
                        <input name="password" type="password" id="password"
                            class="form-control text-white shadow-none  fs-6 fw-normal p-3 form_input"
                            style="background-color:#2B2B2C;border-color:#918989" placeholder="&nbsp;">
                        <label for="password" class="position-absolute text-white text-opacity-75 px-2 py-1 input_label"
                            style="left:18px;background-color:#2B2B2C;">Nhập mật khẩu mới</label>
                    </div>
                    <div class="position-relative mt-3">
                        <input name="confirm_password" type="password" id="confirm_password"
                            class="form-control text-white shadow-none fs-6 fw-normal p-3 form_input"
                            style="background-color:#2B2B2C;border-color:#918989" placeholder="&nbsp;">
                        <label for="confirm_password"
                            class="position-absolute text-white text-opacity-75 px-2 py-1 input_label"
                            style="left:18px;background-color:#2B2B2C;">Nhập lại mật khẩu mới</label>
                    </div>
                    <input type="submit" value="Đổi mật khẩu"
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
