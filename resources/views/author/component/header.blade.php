<nav class="nav-bar" style="background-color:#fff; ">
    <div class="container-fluid py-2 px-1 d-flex align-items-center text-center justify-content-between nav_author">
        <div class="btn-group">
            <a href="#" class="fa-solid fa-bars text-decoration-none  rounded-circle p-3 fs-5 nav_author_link"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
            </a>
            <ul class="dropdown-menu p-2 rounded-3 nav_author_link_dropdown mt-2"
                style="background-color:var(--primary-color)">
                <li><a class="dropdown-item text-opacity-75 fw-light rounded-2" href="{{ route('index') }}">Trang
                        chủ</a></li>
                <li><a class="dropdown-item text-opacity-75 fw-light rounded-2" href="#">Danh sách bài
                        viết</a></li>
                <li>
                    <a class="dropdown-item change-mode text-opacity-75 fw-light rounded-2"
                        href="{{ route('author.index') }}">Chế độ màn hình
                        <i class="fa-solid fa-circle-half-stroke"></i>
                    </a>
                </li>
            </ul>
        </div>
        <a class="navbar-brand fs-4 fw-bold rounded-3 nav_author_link p-2" href="{{ route('author.index') }}">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </a>
        <div class="btn-group">
            <a href="#" class="nav_author_link p-1 rounded-circle mx-2" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="{{ asset('') . (isset(Auth::user()->avatar) ? Auth::user()->avatar : 'no-avatar.jpg') }}"
                    alt="img" class="avatar-item rounded-circle" style="width:40px;height:40px">
            </a>
            <ul class="dropdown-menu p-2 round-3 nav_author_link_dropdown mt-2"
                style="background-color:var(--primary-color)">
                <li><a class="dropdown-item text-opacity-75 fw-light rounded-2" href="{{ route('author.index') }}">Tài
                        khoản</a>
                </li>
                <li><a class="dropdown-item text-opacity-75 fw-light rounded-2"
                        href="{{ route('author.add-news') }}">Tạo bài viết mới</a></li>
                <li><a class="dropdown-item text-opacity-75 fw-light rounded-2"
                        href="{{ route('author.list-news') }}">Bài viết của
                        tôi</a></li>
            </ul>
        </div>
    </div>
</nav>
