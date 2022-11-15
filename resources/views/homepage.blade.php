<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Báo Tin Tức Cập Nhật Nhanh Nhất</title>
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
                            <p><i class="fas fa-phone-alt"></i>028-38364748</p>
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

        <!-- Tin Tức Nổi Bật Trên Cùng-->
        <div class="top-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 tn-left">
                        <div class="row tn-slider">
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/news-450x350-1.jpg" />
                                    <div class="tn-title">
                                        <a href="">Củng cố tin cậy chính trị, thúc đẩy hợp tác quốc tế</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/news-450x350-2.jpg" />
                                    <div class="tn-title">
                                        <a  href="">Sắp xếp cuộc sống khoa học giúp bạn trưởng thành hơn</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 tn-right">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/news-350x223-1.jpg" />
                                    <div class="tn-title">
                                        <a href="">Tổng bí thư Nguyễn Phú Trọng đến thăm Trung Quốc</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/news-350x223-2.jpg" />
                                    <div class="tn-title">
                                        <a href="">Giá xăng dầu tiếp tục tăng</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/news-350x223-3.jpg" />
                                    <div class="tn-title">
                                        <a href="">Liên tiếp xảy ra nhiều vụ giết người</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/news-350x223-4.jpg" />
                                    <div class="tn-title">
                                        <a href="">Kinh tế Thành phố Hồ Chí Minh ngày càng phát triển</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Danh mục nhỏ-->
        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Trong nước</h2>
                        <div class="row cn-slider">
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="img/news-350x223-1.jpg" />
                                    <div class="cn-title">
                                        <a href="">Thủ Tướng ban hành công điện về quản lý, điều chỉnh xăng dầu</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="img/news-350x223-2.jpg" />
                                    <div class="cn-title">
                                        <a href="">Bến xe Miền Đông vẫn được rước khách ở bến Miền Tây</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="img/news-350x223-3.jpg" />
                                    <div class="cn-title">
                                        <a href="">Hà Nội trao 3 quyết định về công tác cán bộ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Thế giới</h2>
                        <div class="row cn-slider">
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="img/news-350x223-4.jpg" />
                                    <div class="cn-title">
                                        <a href="">Căng thẳng bán đảo Triều Tiên ở mức cực cao</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="img/news-350x223-5.jpg" />
                                    <div class="cn-title">
                                        <a href="">Phần Lan, Thụy Điển xem xét đặt vũ khí hạt nhân trên lãnh thổ</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="img/news-350x223-1.jpg" />
                                    <div class="cn-title">
                                        <a href="">Nga đưa tên lửa siêu âm áp sát biên giới Ukraine</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Thế Thao</h2>
                        <div class="row cn-slider">
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="img/news-350x223-5.jpg" />
                                    <div class="cn-title">
                                        <a href="">Mbappe muốn PSG thanh lý cả Messi và Neymar?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="img/news-350x223-4.jpg" />
                                    <div class="cn-title">
                                        <a href="">HLV Nguyễn Đức Thắng nhận án phạt nặng từ VFF sau trận HAGL</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="img/news-350x223-3.jpg" />
                                    <div class="cn-title">
                                        <a href="">Dính drama "đấm đồng đội", Draymond Green đối diện án phạt nặng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Công nghệ</h2>
                        <div class="row cn-slider">
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="img/news-350x223-2.jpg" />
                                    <div class="cn-title">
                                        <a href="">Đánh giá chi tiết iPhone 14 Pro Max</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="img/news-350x223-1.jpg" />
                                    <div class="cn-title">
                                        <a href="">Foxconn tăng tiền thưởng để giữ nhân công sản xuất iPhone</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="img/news-350x223-3.jpg" />
                                    <div class="cn-title">
                                        <a href="">MediaTek công bố chip flaship Dimensity mới</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Thanh thông tin-->
        <div class="tab-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#featured">NỔI BẬT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#popular">PHỔ BIẾN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#latest">MỚI NHẤT</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="featured" class="container tab-pane active">
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-1.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="single-page.html">Bình Dương triệt phá đường dây mua trẻ sơ sinh</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-2.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Hàng chục người sử dụng ma túy trong quán karaoke</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-3.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Điều tra nguyên nhân vụ Ferrari gây tai nạn chết người gần SVĐ Mỹ Đình</a>
                                    </div>
                                </div>
                            </div>
                            <div id="popular" class="container tab-pane fade">
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-4.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Cảnh báo về các ứng dụng đầu tư chứng khoán không phép</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-5.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Thế giới cùng tìm giải pháp chống các cuộc tấn công mã độc tống tiền</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-1.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">David De Gea và nỗ lực chứng minh bản thân</a>
                                    </div>
                                </div>
                            </div>
                            <div id="latest" class="container tab-pane fade">
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-2.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Đề xuất EU từng bước bỏ kiểm soát EO trong mỳ ăn liền Việt Nam</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-3.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Shopee, Lazada, Tiki... không phải nộp thuế thay người bán</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-4.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Kinh tế số Việt Nam tăng trưởng nhanh nhất Đông Nam Á</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#m-viewed">XEM NHIỀU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#m-read">ĐỌC NHIỀU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#m-recent">GẦN ĐÂY</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="m-viewed" class="container tab-pane active">
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-5.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Tăng cường phối hợp quản lý các hoạt động liên quan đến lĩnh vực thủy sản</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-4.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Vinhomes triển khai hệ thống an ninh đa lớp thông minh</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-3.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Thiều Bảo Trâm kết hợp với Grey D, mở màn dự án live session mùa đông</a>
                                    </div>
                                </div>
                            </div>
                            <div id="m-read" class="container tab-pane fade">
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-2.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Đại học Việt Nam xếp hạng cao thế giới về tỉ lệ sinh viên có việc làm</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-1.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Tăng tốc đào tạo giáo viên cũ cho chương trình mới</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-3.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Giá nhà, giá đất liên tục tăng, cao hơn so với thu nhập người dân</a>
                                    </div>
                                </div>
                            </div>
                            <div id="m-recent" class="container tab-pane fade">
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-4.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Hàng loạt khu đô thị bị bỏ hoang nhiều năm gây lãng phí</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-5.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Tìm ra chất ức chế bào ung thư từ lúa gạo</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-1.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Chở bạn cùng lớp về, nam sinh bị đánh ghen</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tin tức chính-->
        <div class="main-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-1.jpg" />
                                    <div class="mn-title">
                                        <a href="">Chính Phủ đề xuất giữ lại Quỹ bình ổn giá xăng dầu</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-2.jpg" />
                                    <div class="mn-title">
                                        <a href="">Thảm kịch giẫm đạp tại Iteawon ở Hàn Quốc</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-3.jpg" />
                                    <div class="mn-title">
                                        <a href="">Triều Tiên tiếp tục thử nghiệm tên lửa, phóng ít nhất 10 tên lửa đạn đạo</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-4.jpg" />
                                    <div class="mn-title">
                                        <a href="">Điểm sáng thị trường bất động sản cuối năm 2022</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-5.jpg" />
                                    <div class="mn-title">
                                        <a href="">Người Hàn Quốc tưởng niệm các nạn nhân vụ giẫm đạp tại Iteawon</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-1.jpg" />
                                    <div class="mn-title">
                                        <a href="">Paul Pogba chính thức nói lời chia tay World Cup 2022</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-2.jpg" />
                                    <div class="mn-title">
                                        <a href="">AS Roma lội ngược dòng giành chiến thắng trước Verona</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-3.jpg" />
                                    <div class="mn-title">
                                        <a href="">Phòng chống sốt xuất huyết: Ý thức người dân rất quan trọng</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-4.jpg" />
                                    <div class="mn-title">
                                        <a href="">Kinh tế số Việt Nam tăng trưởng mạnh nhanh nhất Đông Nam Á</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mn-list">
                            <h2>Tin Liên Quan</h2>
                            <ul>
                                <li><a href="">Elon Musk thanh lọc Twitter</a></li>
                                <li><a href="">Tokyo công nhận quan hệ đồng giới</a></li>
                                <li><a href="">Quy định chặt chẽ hơn để bảo vệ quyền lợi người tiêu dùng</a></li>
                                <li><a href="">Củng cố tin cậy chính trị, thúc đẩy quan hệ hợp tác thực chất Việt Nam - Trung Quốc</a></li>
                                <li><a href="">Bộ Giáo Dục dự kiến mức học phí mới</a></li>
                                <li><a href="">Khám phá sân vận động tổ chức chung kết World Cup 2022</a></li>
                                <li><a href="">Bayern Munich xác lập kỉ lục Champions League mới</a></li>
                                <li><a href="">Đánh giá chi tiết iPhone 14 Pro Max</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                <div class="social ml-auto">
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
        <!-- Footer Bottom End -->

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
