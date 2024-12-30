<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from easetemplate.com/free-website-templates/mobistore/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Nov 2021 09:40:15 GMT -->
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="create ecommerce website template for your online store, responsive mobile templates">
    <meta name="keywords" content="ecommerce website templates, online store,">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mobile Store</title>
    
    
    <!-- Sử dụng asset() để định nghĩa đúng đường dẫn -->
    <link href="{{asset('/public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/public/frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/public/frontend/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('/public/frontend/css/owl.theme.default.css')}}" rel="stylesheet">
    <link href="{{asset('/public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

</head>
</head>
<body>
<!-- top-header-->
<div class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6 hidden-xs">
                <p class="top-text">Đại Học Nguyễn Tất Thành</p>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                <ul>
                    <li>0843053017</li>
                    <li>Web Đồ Án CSPM1</li>
                </ul>
            </div>
        </div>
        <!-- /.top-header-->
    </div>
</div>
<!-- header-section-->
<div class="header-wrapper">
    <div class="container">
        <div class="row">
            <!-- logo -->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-8">
            <div class="logo">
                <a href="{{ route('pages.home') }}">
                    <img src="{{ asset('/public/frontend/images/logo.png') }}" alt="Logo">
                </a>
            </div>

            </div>
            <!-- /.logo -->
            <!-- search -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="search-bg">
                   <form method="GET" action="{{ route('products.index') }}">
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm sản phẩm..." value="{{ request('search') }}">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <!-- /.search -->

            <!-- account -->
                <!-- Hiển thị tài khoản -->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="account-section styled-account">
                        <ul>
                            @if(Auth::check())
                                <!-- Nếu người dùng đã đăng nhập -->
                                <li>
                                    <a href="#" class="title d-none d-sm-inline welcome-text">Xin chào, <span>{{ Auth::user()->name }}</span></a>
                                </li>
                                <li class="hidden-xs separator">|</li>
                                <li>
                                    <form action="{{ route('user.logout') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-link logout-btn" title="Đăng xuất">
                                            Đăng xuất
                                        </button>
                                    </form>
                                </li>
                            @else
                                <!-- Nếu người dùng chưa đăng nhập -->
                                <li><a href="{{ route('signup') }}" class="title hidden-xs">Đăng Ký</a></li>
                                <li class="hidden-xs separator">|</li>
                                <li><a href="{{ route('login') }}" class="title hidden-xs">Đăng nhập</a></li>
                            @endif
                            <li><a href="{{route('favorites.index')}}" class="icon-link"><i class="fa fa-heart"></i></a></li>
                            <li>
                                <a href="{{ route('pages.cart') }}" class="title icon-link">
                                    <i class="fa fa-shopping-cart"></i>
                                    <sup class="cart-quantity">{{ $cartQuantity }}</sup>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Hiển thị thông báo thành công -->
                @if(session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            Swal.fire({
                                title: 'Thành công!',
                                text: "{{ session('success') }}",
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        });
                    </script>
                @endif
                <!-- /.account -->
            </div>
            <!-- search -->
        </div>
    </div>
    <!-- navigation -->
    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- navigations-->
                    <div id="navigation">
                        <ul>
                            <li class="active"><a href="{{ route('pages.home') }}">Trang chủ</a></li>
                            <li><a href="{{route('products.index')}}">Điện thoại</a>
                            </li>
                            <li><a href="{{route('about')}}">Thông tin</a>
                            </li>
                            <li><a href="{{route('blog_default')}}">Bài viết</a> </li>
                            <li><a href="{{route('feedback.store')}}">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.navigations-->
            </div>
        </div>
    </div>
</div>
    <div class="slider">
          @yield('content')
    </div>
<!-- /.features -->
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="row">
            <!-- footer-company-links -->
            <!-- footer-contact links -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Thông tin hỗ trợ</h3>
                    <div class="contact-info">
                        <span class="contact-icon"><i class="fa fa-map-marker"></i></span>
                        <span class="contact-text">Xã Tân Bình,Huyện Tân Biên<br>Thành phố Tây Ninh, Việt Nam - 2024</span>
                    </div>
                    <div class="contact-info">
                        <span class="contact-icon"><i class="fa fa-phone"></i></span>
                        <span class="contact-text">0843053017</span>
                    </div>
                    <div class="contact-info">
                        <span class="contact-icon"><i class="fa fa-envelope"></i></span>
                        <span class="contact-text">Khoa Nguyễn</span>
                    </div>
                </div>
            </div>
            <!-- /.footer-useful-links -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Tiện ích</h3>
                    <ul class="arrow">
                        <li><a href="{{route('pages.home')}}">Trang Chủ </a></li>
                        <li><a href="{{route('products.index')}}">Điện Thoại</a></li>
                        <li><a href="{{route('about')}}">Thông Tin</a></li>
                        <li><a href="{{route('blog_default')}}">Bài Viết</a></li>
                        <li><a href="{{route('contact')}}">Liên Hệ</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.footer-useful-links -->
            <!-- footer-policy-list-links -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Chính sách</h3>
                    <ul class="arrow">
                        <li><a href="#">Thanh toán</a></li>
                        <li><a href="#">Hủy, trả hàng</a></li>
                        <li><a href="#">Giao hàng và vận chuyển</a></li>
                        <li><a href="#">Chính sách bảo mật</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.footer-policy-list-links -->
            <!-- footer-social links -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Liên lạc với chúng tôi</h3>
                    <div class="ft-social">
                        <span><a href="https://www.facebook.com/profile.php?id=100041815470386" class="btn-social btn-facebook" ><i class="fa fa-facebook"></i></a></span>
                        <span><a href="https://www.instagram.com/khoadng574/" class=" btn-social btn-instagram"><i class="fa fa-instagram"></i></a></span>
                    </div>
                </div>
            </div>
            <!-- /.footer-social links -->
        </div>
    </div>
    <!-- tiny-footer -->
    <div class="tiny-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="payment-method alignleft">
                        <ul>
                            <li><a href="#"><i class="fa fa-cc-paypal fa-2x"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard  fa-2x"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-visa fa-2x"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover fa-2x"></i></a></li>
                        </ul>
                    </div>
                    <p class="alignright">Copyright © Khoa Đăng
                        <a href="https://urlctrl.com/mykhoa" target="_blank" class="copyrightlink">NTTU Khoa</a></p>
                </div>
            </div>
        </div>
        <!-- /. tiny-footer -->
    </div>
</div>
<!-- /.footer -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('public/frontend/js/jquery.min.js')}}" type="text/javascript"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('public/frontend/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/frontend/js/menumaker.js')}}" type="text/javascript"></script>
<script src="{{asset('public/frontend/js/jquery.sticky.js')}}" type="text/javascript"></script>
<script src="{{asset('public/frontend/js/sticky-header.js')}}" type="text/javascript"></script>
<script src="{{asset('public/frontend/js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/frontend/js/multiple-carousel.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('public/frontend/js/app.js')}}" type="text/javascript"></script>
<script src="{{asset('public/frontend/js/favorite.js')}}" type="text/javascript"></script>
<script src="{{asset('public/frontend/js/delete.js')}}" type="text/javascript"></script>
</body>
<!-- Mirrored from easetemplate.com/free-website-templates/mobistore/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Nov 2021 09:40:40 GMT -->
</html>
