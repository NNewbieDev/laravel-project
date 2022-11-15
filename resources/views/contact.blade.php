<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>LIÊN HỆ VỚI CHÚNG TÔI</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <script href="{{ asset('js/lib/slick/slick.css') }}" rel="stylesheet"></script>
        <script href="{{ asset('js/lib/slick/slick-theme.css') }}" rel="stylesheet"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >

    </head>

    <body>
        <!-- Thanh Trên Cùng -->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tb-contact">
                            <p><i class="fas fa-envelope"></i>information@ou.edu.vn</p>
                            <p><i class="fas fa-phone-alt"></i>012 345 6789</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tb-menu">
                            <a href="">Đăng Ký</a>
                            <a href="">Đăng Nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Thanh Logo -->
        <div class="brand">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="b-logo">
                            <a href="index.html">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <h2></h2>  <!--quang cao-->
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="b-search">
                            <input type="text" placeholder="Tìm Kiếm">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thanh Điều Hướng -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.html" class="nav-item nav-link active">Trang Chủ</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Trong Nước</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Kinh Tế</a>
                                    <a href="#" class="dropdown-item">Chính Trị</a>
                                    <a href="#" class="dropdown-item">Xã Hội</a>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Thế Giới</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Kinh Tế</a>
                                    <a href="#" class="dropdown-item">Chính Trị</a>
                                    <a href="#" class="dropdown-item">Xã Hội</a>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Thể Thao</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Bóng Đá</a>
                                    <a href="#" class="dropdown-item">Bóng Chuyền</a>
                                    <a href="#" class="dropdown-item">Bóng Rổ</a>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Công Nghệ</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Máy Tính Cá Nhân - PC</a>
                                    <a href="#" class="dropdown-item">Điện Thoại Di Động</a>
                                    <a href="#" class="dropdown-item">Máy tính xách tay - Laptop</a>
                                </div>
                            </div>
                                <a href="contact.html" class="nav-item nav-link">Liên Hệ</a>
                                <a href="#" class="nav-item nav-link">Giới Thiệu</a>
                            </div>
                        <div class="social ml-auto">
                            <a href="https://www.facebook.com/TruongDaiHocMo"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/ou.edu.vn"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.youtube.com/c/HoChiMinhCityOpenUniversity"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        
        <!-- Đường dẫn -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Liên hệ</li>
                </ul>
            </div>
        </div>
        
        <!-- Liên hệ -->
        <div class="contact">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="contact-form">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Họ và Tên" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Tiêu đề" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" placeholder="Lời nhắn"></textarea>
                                </div>
                                <div><button class="btn" type="submit">GỬI TIN NHẮN</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-info">
                            <h3>Liên Lạc</h3>
                            <p>
                                Chúng tôi rất cảm kích, biết ơn bạn đã để lại lời nhắn giúp chúng tôi cải thiện website nhiều hơn nữa trong tương lai.
                                Lời góp ý chân thành của bạn như ánh sao sáng giúp tôi ngày càng hoàn thiện sản phẩm
                                <br>XIN CẢM ƠN!
                            </p>
                            <h4><i class="fa fa-map-marker"></i>Trường Đại học Mở Tp HCM</h4>
                            <h4><i class="fa fa-envelope"></i><a href="https://ou.edu.vn">ou.edu.vn</a></h4>
                            <h4><i class="fa fa-phone"></i>028-38364748</h4>
                            <div class="social">
                                <a href="https://www.facebook.com/TruongDaiHocMo"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/ou.edu.vn"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.youtube.com/c/HoChiMinhCityOpenUniversity"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        
        <!-- Footer -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Liên Hệ</h3>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>Trường Đại học Mở Tp HCM</p>
                                <p><i class="fa fa-envelope"></i><a href="https://ou.edu.vn">ou.edu.vn</a></p>
                                <p><i class="fa fa-phone"></i>028-38364748</p>
                                <div class="social">
                                    <a href="https://www.facebook.com/TruongDaiHocMo"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/ou.edu.vn"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.youtube.com/c/HoChiMinhCityOpenUniversity"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Danh Mục</h3>
                            <ul>
                                <li><a href="#">Trong nước</a></li>
                                <li><a href="#">Thế giới</a></li>
                                <li><a href="#">Thể Thao</a></li>
                                <li><a href="#">Công nghệ</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Thành Viên</h3>
                            <ul>
                                <li><a href="#">Liêu Hà Phương Huy</a></li>
                                <li><a href="#">Nguyễn Thị Kim Ngân</a></li>
                                <li><a href="#">Bùi Văn Nin</a></li>
                                <li><a href="#">Phạm Đức Mạnh</a></li>
                                <li><a href="#">Trần Thị Giáng My</a></li>
                                <li><a href="#">Nguyễn Phạm Thanh Hoàng</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Về Chúng Tôi</h3>
                            <div class="newsletter">
                                <p>
                                    <br>Nếu bạn có bất kì thắc mắc nào liên quan đến chúng tôi, xin hãy điền thông tin email
                                    vào bên dưới để chúng tôi liên lạc bạn hỗ trợ trong thời gian sớm nhất.
                                    <br>XIN CẢM ƠN!
                                </p>
                                <form>
                                    <input class="form-control" type="email" placeholder="Your email here">
                                    <button class="btn">GỬI</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Footer Menu Start -->
        <div class="footer-menu">
            <div class="container">
                <div class="f-menu">
                    <a href="terms.html">Điều khoản sử dụng</a>
                    <a href="privacyPolicy.html">Chính sách bảo mật</a>
                    <a href="#">Cookies</a> <!-- chua biet lam gi?-->
                    <a href="contact.html">Liên hệ với chúng tôi</a>
                </div>
            </div>
        </div>
        <!-- Footer Menu End -->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>No Copyright &copy; <a href="index.html">Nhóm 3</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('js/lib/slick/slick.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
