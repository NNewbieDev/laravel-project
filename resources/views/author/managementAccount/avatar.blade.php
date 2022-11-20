@extends('author.layout.layout')
@section('title')
    {{ $title }}
@endsection
@section('header')
    @include('author.header')
@endsection
@section('main')
    <div class="container-fluid text-center py-5"
        style="background-color:{{ $darkMode ? 'var(--background-component-color-dark)' : 'var(--background-component-color-light)' }}">
        <div class=" py-3 px-4 rounded-4 text-white text-center h-100 shadow option" style="background-color: #2B2B2C">
            <form action="{{ route('author.management.update-avatar') }}" method="post" enctype="multipart/form-data">
                @csrf
                <img class="rounded-3 mt-4 mb-2" src="{{ asset('images/' . $avatar) }}" alt="avatar"
                    style="width:150px;height:150px;object-fit:cover">
                <p class="text-white text-opacity-50 fs-6 fw-light">Avatar hiện hành</p>
                <i class="fa-solid fa-arrow-down fs-1 my-4 text-opacity-75 text-white d-block"></i>
                <div class="text-center" id="image_drag_cover" style="display:none;">
                    <img class="rounded-3 my-3 shadow" id="image_drag" src="" alt="avatar"
                        style="width:180px;height:100px;object-fit:cover">
                </div>
                <div class="draggable d-flex flex-column justify-content-center align-center py-5 rounded-3 mt-2"
                    style="border:1px dashed #fff">
                    <i class="fa-solid fa-upload fs-3 text-white text-opacity-75 mb-2"></i>
                    <p class="text-white fs-6 fw-light text-opacity-75">Nhấp chọn ảnh(PNG/JPG) hoặc kéo thả vào ô này</p>
                </div>
                <input type="file" name="avatar" id="avatar_input" accept="image/png, image/jpg ,image/jpeg" hidden>
                <div class="container-fluid text-start p-0">
                    <p class="text-white text-opacity-75 fs-5 mt-2 mb-0 display_imageName" style="display:none">
                        <i class="fa-solid fa-link"></i>
                        <span class="file_name ml-2">filename</span>
                    </p>
                    <input type="submit" value="Tiến hành đổi Avatar"
                        class="py-2 px-3 mt-3 fs-6 mb-2 text-white rounded-3 text-uppercase text-opacity-75"
                        style="background-color:rgb(194, 115, 36);border:none!important;">
                    <h3 class="text-capitalize fs-5 mt-4 text-white text-opacity-75">Một số lưu ý</h3>
                    <ol class="px-4 w-100 text-white text-opacity-75">
                        <li class="item">Dung lượng tối đa là 2MB.</li>
                        <li class="item">Chỉ chấp nhận định dạng JPG/PNG.</li>
                        <li class="item">Vui lòng không tải lên ảnh gây hại, phản cảm và vi phạm nội quy của website.
                        </li>
                    </ol>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('assets/js') . '/avatar.js' }}"></script>
@endsection
@section('footer')
    @include('author.footer')
@endsection
