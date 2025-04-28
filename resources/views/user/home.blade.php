<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>MOS TEST</title>
    <meta name="description" content="Hệ thống thi trắc nghiệm trực tuyến lớn nhất Việt Nam">
    <meta name="author" content="pixelcave">
    <!-- Open Graph Meta -->
    <meta property="og:title" content="Quản lý đề thi trắc nghiệm">
    <meta property="og:site_name" content="Quản lý đề thi trắc nghiệm">
    <meta property="og:description" content="Hệ thống thi trắc nghiệm trực tuyến lớn nhất Việt Nam">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="../../public/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../../public/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../../public/media/favicons/apple-touch-icon-180x180.png">


<!-- Slick Carousel -->
<link rel="stylesheet" href="{{ asset('slick/slick.css') }}">
<link rel="stylesheet" href="{{ asset('slick/slick-theme.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Google Fonts Preconnect -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.css') }}">

    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/custom.css') }}">
</head>

<body>
    <!-- Page Container -->
    <div id="page-container" class="sidebar-dark side-scroll page-header-fixed page-header-glass main-content-boxed remember-theme">
        <!-- Header -->
        <header id="page-header">
            <div class="content-header">
                <div class="space-x-1 d-flex align-items-center space-x-2 animated zoomInRight">
                    <a class="link-fx fw-bold" href="{{ route('home') }}">
                        <i class="fa fa-fire text-primary"></i>
                        <span class="fs-4 text-dual">MOS </span><span class="fs-4 text-primary">Test</span>
                    </a>
                </div>
                <div class="space-x-1">
                    <ul class="nav-main nav-main-horizontal nav-main-hover nav">
                        <?php 
                        if(!isset($_COOKIE['token'])) {
                            echo '<li class="nav-main-item">
                                <a class="btn btn-hero btn-light rounded-pill" href="admin">
                                    <i class="fa fa-right-to-bracket me-2"></i>Đăng nhập
                                </a>
                            </li>';
                        } else {
                            echo '<li class="nav-main-item">
                                <a class="btn btn-hero btn-primary rounded-pill" href="dashboard">
                                    <i class="fa fa-rocket me-2"></i>Dashboard
                                </a>
                            </li>';
                        }
                        ?>

                        <li class="nav-main-item">
                            <a class="btn btn-hero btn-primary rounded-pill" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">
                                <i class="fa fa-envelope me-2"></i> Liên hệ
                            </a>                            
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- END Header -->
        <!-- Main Container -->
        <main id="main-container">
            <!-- Hero -->
            <div class="hero bg-body-extra-light hero-bubbles hero-lg overflow-hidden">
                <div class="hero-inner">
                    <span class="hero-bubble hero-bubble-lg bg-warning" style="top: 20%; left: 10%;"></span>
                    <span class="hero-bubble bg-success" style="top: 20%; left: 80%;"></span>
                    <span class="hero-bubble hero-bubble-sm bg-xwork" style="top: 40%; left: 25%;"></span>
                    <span class="hero-bubble hero-bubble-lg bg-xmodern" style="top: 10%; left: 20%;"></span>
                    <span class="hero-bubble hero-bubble-lg bg-xeco" style="top: 30%; left: 90%;"></span>
                    <span class="hero-bubble hero-bubble-lg bg-danger" style="top: 35%; left: 20%;"></span>
                    <span class="hero-bubble hero-bubble-lg bg-warning" style="top: 60%; left: 35%;"></span>
                    <span class="hero-bubble bg-info" style="top: 60%; left: 80%;"></span>
                    <span class="hero-bubble hero-bubble-lg bg-xdream" style="top: 75%; left: 70%;"></span>
                    <span class="hero-bubble hero-bubble-lg bg-xpro" style="top: 75%; left: 10%;"></span>
                    <span class="hero-bubble bg-xplay" style="top: 90%; left: 90%;"></span>
                    <div class="position-relative d-flex align-items-center">
                        <div class="content content-full">
                            <div class="row g-6 w-100 py-7 overflow-hidden">
                                <div
                                    class="col-md-7 order-md-last py-4 d-md-flex align-items-md-center justify-content-md-end">
                                    <img class="img-fluid animated flipInX" src="{{ asset('images/home.png') }}"
                                        alt="Hero Promo">
                                </div>
                                <div class="col-md-5 py-4 d-flex align-items-center" data-toggle="appear"
                                    data-class="animated fadeInLeft">
                                    <div class="text-center text-md-start">
                                        <h1 class="fw-bold fs-2 mb-3">
                                            Hệ thống thi và tạo đề thi trắc nghiệm online tốt nhất.
                                        </h1>
                                        <p class="text-muted fw-medium mb-4">
                                        MOS (Microsoft Office Specialist) là bài thi về kỹ năng Tin học Văn phòng được triển khai bởi Tập đoàn khảo thí Tin học hàng đầu thế giới – Certiport (Hoa Kỳ) và đang được áp dụng trên 150 quốc gia và vùng lãnh thổ trên thế giới. Bài thi MOS được thực hiện trực tuyến trên 27 ngôn ngữ và đã được Việt hóa, với trung bình 280.000 bài thi mỗi tháng được tổ chức thông qua hơn 12.000 trung tâm được ủy quyền chính thức của Certiport.
                                        </p>
                                        <a class="btn btn-alt-primary py-2 px-3 m-1" href="auth/signin" target="_blank">
                                            <i class="fa fa-arrow-right opacity-50 me-1"></i> Tham gia ngay
                                        </a>
                                        <a class="btn btn-alt-secondary py-2 px-3 m-1 btn--scroll-to">
                                            <i class="fa fa-arrow-down opacity-50 me-1"></i> Tìm hiểu thêm
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="footer-static bg-body-extra-light">
            <div class="content py-4">
                <!-- Footer Navigation -->
                <div class="row items-push fs-sm border-bottom pt-4">
                    <div class="col-6 col-md-4">
                        <h3 class="fw-semibold">Thông tin</h3>
                        <ul class="list list-simple-mini">
                            <li>
                                <a class="fw-semibold text-dark" href="#">
                                    Chính sách bảo mật
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold text-dark" href="#">
                                    Điều khoản sử dụng
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold text-dark" href="#">
                                    Hướng dẫn
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3 class="fw-semibold">Địa chỉ</h3>
                        <div class="fs-sm push">
                            ABC<br>
                            Hà Nội<br>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3 class="fw-semibold">Kết nối</h3>
                        <ul class="list list-simple-mini">
                            <li>
                                <a class="fw-semibold" href="#">
                                    <i class="fab fa-1x fa-facebook-f me-2 text-dark"></i>
                                </a>
                                <a class="fw-semibold" href="#">
                                    <i class="fab fa-1x fa-facebook-messenger text-dark"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END Footer Navigation -->

                <!-- Footer Copyright -->
                <div class="row fs-sm pt-4">
                    <div class="col-md-6 offset-md-3 text-center">
                        Copyright © 2025 OnTestVN. All rights reserved.
                    </div>
                </div>
                <!-- END Footer Copyright -->
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-primary text-white">
              <h5 class="modal-title" id="contactModalLabel"><i class="fa fa-envelope me-2"></i>Liên hệ với chúng tôi</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Đóng"></button>
            </div>
            <div class="modal-body p-4">
              <form method="POST" action="{{ route('contact') }}">
                @csrf
                <div class="row g-3">
                  <div class="col-md-12">
                    <label class="form-label">Họ tên</label>
                    <input name="hoten" type="text" class="form-control" placeholder="Nhập họ tên của bạn" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="you@example.com" name="email" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Số điện thoại</label>
                    <input type="tel" class="form-control" placeholder="0123 456 789" name="sdt" required>
                  </div>
                  <div class="col-md-12">
                    <label class="form-label">Ý kiến / Tin nhắn</label>
                    <textarea class="form-control" rows="4" placeholder="Nội dung bạn muốn gửi..." name="ykien" required></textarea>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-paper-plane me-1"></i> Gửi phản hồi
              </button>
            </div>
        </form>

          </div>
        </div>
      </div>
      
    <!-- END Page Container -->
<!-- Dashmix App (nếu có trên CDN riêng, thay thế bằng link bên dưới nếu bạn có host CDN riêng) -->
<script src="{{ asset('js/dashmix.app.min.js') }}"></script>\
<script src="{{ asset('slick/slick.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
    let $ = jQuery;
    $(document).ready(function() {
        $(window).on('load', function() {
            $.getScript("https://cdn.jsdelivr.net/npm/sweetalert2@10.13.0/dist/sweetalert2.all.min.js",
                function() {

                    @if (Session::has('success'))
                        Swal.fire({
                            text: "{{ session('success') }}",
                            icon: "success",
                            // buttonsStyling: false,
                            confirmButtonText: "Đồng ý",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        })
                    @endif
                    @if (Session::has('error'))
                        Swal.fire({
                            text: "{{ session('error') }}",
                            icon: "error",
                            // buttonsStyling: false,
                            confirmButtonText: "Đồng ý",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        })
                    @endif
                });
        })
    });
</script>

</body>

</html>