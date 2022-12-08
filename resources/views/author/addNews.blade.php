@extends('author.layout.layout')
@section('title')
    {{ $title }}
@endsection
@section('header')
    @include('author.component.header')
@endsection
@section('main')
    <div class="container-fluid py-5 px-3"
        style="background-color:{{ $darkMode ? 'var(--background-color-dark)' : 'var(--background-color-light)' }}">
        <h3 class="text-transform-capplicaze fs-4 fw-bold"
            style="color:{{ $darkMode ? 'var(--text-white-75)' : 'var(--text-dark-75)' }}">Tạo bài viết mới</h3>

        <div class="container-fluid p-4 rounded-4 text-white text-start h-100 option mt-4"
            style="background-color: {{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }}">
            <h4 class="fs-5 fw-normal" style="color:{{ $darkMode ? 'var(--text-white-75)' : 'var(--text-dark-75)' }}">Tạo bài
                viết mới với tên tài khoản:
                <b style="color:#c27324;">{{ Auth::user()->username }}</b>
            </h4>
            <form action="{{ route('author.post-news') }}" method='POST' enctype="multipart/form-data" class="mt-4 mb-5">
                @csrf
                <div class="position-relative mt-3">
                    <select name="page_id" id="page" class="form_input form-select shadow-none fs-6 fw-normal p-3"
                        style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};border-color:#918989;color:{{ $darkMode ? 'var(--text-white-75)' : 'var(--text-dark-75)' }}">
                        <option value>Chọn thể loại bài viết</option>
                        @foreach ($category as $page)
                            <option class="fs-5 select_option"
                                style="color:{{ $darkMode ? 'var(--text-white-75)' : 'var(--text-dark-75)' }}"
                                value="{{ $page->id }}">
                                {{ $page->CategoryName }}</option>
                        @endforeach)
                    </select>
                    @error('category_news')
                        <p class="mt-1 mb-2 fs-6 fw-normal text-danger px-3">
                            <i class="fa-solid fa-circle-exclamation mr-2"></i>
                            {{ $message }}
                        </p>
                    @enderror
                    {{-- <span class="position-absolute text-white text-opacity-75 px-2 py-1 input_label"
                        style="left:18px;background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};color:{{ $darkMode ? 'var(--text-white-75)' : 'var(--text-dark-75)' }}">
                        Chọn thể loại
                    </span> --}}
                </div>
                <div class="position-relative mt-3">
                    <input name="title_news" type="text" id="title_news" value="{{ old('title_news') }}"
                        class="form-control shadow-none fs-6 fw-normal p-3 form_input"
                        style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};border-color:#918989;color:{{ $darkMode ? 'var(--text-white-75)' : 'var(--text-dark-75)' }}"
                        placeholder="&nbsp;">
                    <label for="title_news" class="position-absolute px-2 py-1 input_label"
                        style="left:18px;background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};color:{{ $darkMode ? 'var(--text-white-75)' : 'var(--text-dark-75)' }}">Tiêu
                        đề bài viết</label>
                    @error('title_news')
                        <p class="mt-1 mb-2 fs-6 fw-normal text-danger px-3">
                            <i class="fa-solid fa-circle-exclamation me-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="position-relative mt-3">
                    <textarea name="content_news" id="content_news"
                        class="form-control shadow-none fs-6 fw-normal p-3 form_input resize-none" aria-label="With textarea"
                        style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};border-color:#918989;color:{{ $darkMode ? 'var(--text-white-75)' : 'var(--text-dark-75)' }}"
                        placeholder="&nbsp;">{{ old('content_news') }}</textarea>
                    <label for="content_news" class="position-absolute px-2 py-1 input_label"
                        style="left:18px;background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};color:{{ $darkMode ? 'var(--text-white-75)' : 'var(--text-dark-75)' }}">Nội
                        dung bài viết</label>
                    @error('content_news')
                        <p class="mt-1 mb-2 fs-6 fw-normal text-danger px-3">
                            <i class="fa-solid fa-circle-exclamation mr-2"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="position-relative mt-3">
                    <input type="file" accept="image/png, image/jpg, image/jpeg, image/gif" name="image_news"
                        class="form-control shadow-none fs-6 fw-normal p-4 form_input"
                        style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }};color:{{ $darkMode ? 'var(--text-white-75)' : 'var(--text-dark-75)' }};border-color:#918989">
                    @error('image_news')
                        <p class="mt-1 mb-2 fs-6 fw-normal text-danger px-3">
                            <i class="fa-solid fa-circle-exclamation mr-2"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <input type="submit" value="Tạo bài viết mới"
                    class="py-2 px-3 fs-6 mt-3 text-white rounded-3 text-uppercase text-opacity-75"
                    style="background-color:#c27324;border:none!important;">
            </form>
            <i class="mt-5"
                style="font-size:15px;color:{{ $darkMode ? 'var(--text-white-75)' : 'var(--text-dark-75)' }}">(*) Hãy đảm
                bảo bài viết đáp ứng tiêu chuẩn
                cộng đồng của
                Website tintuc. Bài viết của bạn
                sẽ được duyệt bởi đội ngũ của chúng tôi. Hãy viết nội dung có giá trị, hòa nhã, lịch sự và công tâm.</i>
        </div>
    </div>
@endsection
@section('footer')
    @include('author.component.footer')
@endsection
