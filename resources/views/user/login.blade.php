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
<div class="bg-image">
    <div class="row g-0 bg-primary-op">
        <div class="hero-static col-md-6 d-flex align-items-center bg-body-extra-light">
            <div class="p-3 w-100">
                <div class="mb-3 text-center">
                    <a class="link-fx fw-bold fs-1" href="/">
                        <span class="text-dark">MOS </span><span class="text-primary">Test</span>
                    </a>
                    <p class="text-uppercase fw-bold fs-sm text-muted">Đăng nhập</p>
                </div>
                <div class="row g-0 justify-content-center">
                    <div class="col-sm-8 col-xl-6">
                        <form class="js-validation-signin">
                            <div class="py-3">
                                <div class="mb-4">
                                    <input type="text" class="form-control form-control-lg form-control-alt"
                                        id="login-username" name="login-username" placeholder="Mã học sinh">
                                </div>
                                <div class="mb-4">
                                    <input type="password" class="form-control form-control-lg form-control-alt"
                                        id="login-password" name="login-password" placeholder="Mật khẩu">
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                                    <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Đăng nhập
                                </button>
                                
                                <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                    <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1"
                                        href="">
                                        <i class="fa fa-exclamation-triangle opacity-50 me-1"></i> Quên mật khẩu
                                    </a>
                                    <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{ url('admin') }}">
                                        <i class="fa fa-user opacity-50 me-1"></i> Trang quản trị 
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
            <div class="p-3">
                <p class="display-4 fw-bold text-white mb-3">
                    Welcome to the MOS Test
                </p>
                <p class="fs-lg fw-semibold text-white-75 mb-0">
                    Copyright &copy; <span data-toggle="year-copy"></span>
                </p>
            </div>
        </div>
    </div>
</div>

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

