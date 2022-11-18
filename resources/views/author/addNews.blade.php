@extends('author.layout.layout')
@section('title')
    {{ $title }}
@endsection
@section('header')
    @include('author.header')
@endsection
@section('main')
    <div class="container-fluid py-5 px-3" style="background-color:#353536">
        <h3 class="text-white text-transform-capplicaze fs-4 fw-bold text-opacity-75">Tạo bài viết mới</h3>

        <div class="container-fluid p-4 rounded-4 text-white text-start h-100 option mt-4" style="background-color: #2B2B2C">
            <h4 class="text-white fs-5 fw-normal text-opacity-75">Tạo bài viết mới với tên tài khoản:
                <b style="color:#c27324;">{{ $auth->authorName }}</b>
            </h4>
            <form action="{{ route('author.post-news') }}" method='POST' enctype="multipart/form-data" class="mt-4 mb-5">
                @csrf
                <div class="position-relative mt-3">
                    <select name="category_news" id="category"
                        class="form_input form-select text-white shadow-none fs-6 fw-normal p-3"
                        style="background-color:#2B2B2C;border-color:#918989">
                        <option value></option>
                        <option class="text-white text-opacity-75 fs-5 select_option" value="1">Fashion</option>
                        <option class="text-white text-opacity-75 fs-5 select_option" value="2">Technology</option>
                        <option class="text-white text-opacity-75 fs-5 select_option" value="3">Cars</option>
                        <option class="text-white text-opacity-75 fs-5 select_option" value="4">Block chain
                        </option>
                    </select>
                    <span class="position-absolute text-white text-opacity-75 px-2 py-1 input_label"
                        style="left:18px;background-color:#2B2B2C;">
                        Chọn thể loại
                    </span>
                </div>
                <div class="position-relative mt-3">
                    <input name="title_news" type="text" id="title_news"
                        class="form-control text-white shadow-none  fs-6 fw-normal p-3 form_input"
                        style="background-color:#2B2B2C;border-color:#918989" placeholder="&nbsp;">
                    <label for="title_news" class="position-absolute text-white text-opacity-75 px-2 py-1 input_label"
                        style="left:18px;background-color:#2B2B2C;">Tiêu đề bài viết</label>
                </div>

                <div class="position-relative mt-3">
                    <textarea name="content_news" id="content_news"
                        class="form-control text-white shadow-none fs-6 fw-normal p-3 form_input resize-none" aria-label="With textarea"
                        name="content" style="background-color:#2B2B2C;border-color:#918989" placeholder="&nbsp;"></textarea>
                    <label for="content_news" class="position-absolute text-white text-opacity-75 px-2 py-1 input_label"
                        style="left:18px;background-color:#2B2B2C;">Nội dung bài viết</label>
                </div>
                <div class="position-relative mt-3">
                    <input type="file" accept="image/png, image/jpg, image/jpeg, image/gif" name="image_news"
                        class="form-control text-white shadow-none fs-6 fw-normal p-4 form_input"
                        style="background-color:#2B2B2C;border-color:#918989">
                    <span class="position-absolute text-white text-opacity-75 px-2 py-1 input_label"
                        style="left:18px;background-color:#2B2B2C;">Tải ảnh bìa</span>
                </div>
                <input type="submit" value="Tạo bài viết mới"
                    class="py-2 px-3 fs-6 mt-3 text-white rounded-3 text-uppercase text-opacity-75"
                    style="background-color:#c27324;border:none!important;">
            </form>
            <i class="text-white text-opacity-75 mt-5" style="font-size:15px">(*) Hãy đảm bảo bài viết đáp ứng tiêu chuẩn
                cộng đồng của
                Website tintuc. Bài viết của bạn
                sẽ được duyệt bởi đội ngũ của chúng tôi. Hãy viết nội dung có giá trị, hòa nhã, lịch sự và công tâm.</i>
        </div>
    </div>
@endsection
@section('footer')
    @include('author.footer')
@endsection
