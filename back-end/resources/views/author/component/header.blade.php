<nav class="nav-bar text-white" style="background-color:#2B2B2C">
    <div class="container-fluid py-2 px-1 d-flex align-items-center text-center justify-content-between nav_author">
        <div class="btn-group">
            <a href="#"
                class="fa-solid fa-bars text-decoration-none text-white rounded-circle p-3 fs-5 nav_author_link"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
            </a>
            <ul class="dropdown-menu p-2 rounded-3 nav_author_link_dropdown mt-2" style="background-color:#2B2B2C">
                <li><a class="dropdown-item text-white text-opacity-75 fw-light rounded-2"
                        href="{{ route('index') }}">Trang
                        chủ</a></li>
                <li>
                    <hr class="dropdown-divider bg-light bg-opacity-25">
                </li>
                <li><a class="dropdown-item text-white text-opacity-75 fw-light rounded-2" href="#">Danh sách bài
                        viết</a></li>
            </ul>
        </div>
        <a class="navbar-brand fs-4 fw-bold rounded-3 nav_author_link p-2" href="#">Website tintuc</a>
        <div class="btn-group">
            <a href="#" class="nav_author_link p-1 rounded-circle mx-2" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="http://localhost:8000/images/cat.jpg" alt="img" class="avatar-item rounded-circle"
                    style="width:40px;height:40px">
            </a>
            <ul class="dropdown-menu p-2 round-3 nav_author_link_dropdown mt-2" style="background-color:#2B2B2C">
                <li><a class="dropdown-item text-white text-opacity-75 fw-light rounded-2"
                        href="{{ route('author.index') }}">Tài khoản</a>
                </li>
                <li>
                    <hr class="dropdown-divider bg-light bg-opacity-25">
                </li>
                <li><a class="dropdown-item text-white text-opacity-75 fw-light rounded-2"
                        href="{{ route('author.add-news') }}">Tạo bài viết mới</a></li>
                <li><a class="dropdown-item text-white text-opacity-75 fw-light rounded-2"
                        href="{{ route('author.list-news') }}">Bài viết của
                        tôi</a></li>
            </ul>
        </div>
    </div>
</nav>
