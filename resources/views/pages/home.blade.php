    @extends('layout')
    @section('content')
    <!-- /. header-section-->
    <!-- slider -->
    <div class="slider">
        <div class="owl-carousel owl-one owl-theme">
            <div class="item">
                <div class="slider-img">
                    <img src="{{('public/frontend/images/slider_1.jpg')}}" alt=""></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-8 col-sm-6 col-xs-12">
                            <div class="slider-captions">
                                <div class="brand-img">
                                    <img src="{{asset('public/frontend/images/mi_logo.png')}}" alt="">
                                </div>
                                <h1 class="slider-title">Xiaomi <span>Y1</span></h1>
                                <p class="hidden-xs">Xiaomi là một hãng điện thoại xịn trong tầm giá luôn đáp ứng đầy đủ nhu cầu của người dùng với cấu hình mạnh </p>
                                <p class="slider-price">12.000.000 VND </p>
                                <a href="cart.html" class="btn btn-primary btn-lg hidden-xs">Mua Ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="slider-img"><img src="{{('public/frontend/images/slider_2.jpg')}}" alt=""></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-8 col-sm-6 col-xs-12">
                            <div class="slider-captions">
                                <div class="brand-img">
                                    <img src="{{('public/frontend/images/google_logo.png')}}" alt="">
                                </div>
                                <h1 class="slider-title">Google Pixel</h1>
                                <p class="hidden-xs">Điện thoại thuần android và chụp ảnh rất đẹp cho ai thích chụp ảnh và muốn một chiếc máy ổn định lâu dài</p>
                                <p class="slider-price">17.000.000 VND</p>
                                <a href="cart.html" class="btn btn-primary btn-lg hidden-xs">Mua Ngay</a>                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="slider-img"><img src="{{('public/frontend/images/slider_3.jpg')}}" alt=""></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-8 col-sm-6 col-xs-12">
                            <div class="slider-captions">
                                <div class="brand-img">
                                    <img src="images/apple_logo.png" alt="">
                                </div>
                                <h1 class="slider-title">Iphone 16</h1>
                                <p class="hidden-xs">Chụp ảnh trên con máy này thật sự rất đẹp,khả năng quay video top 1 trong thế giới điện thoại
                                    <br> | 64 GB &amp; 256 GB Bộ nhớ trong</p>
                                <p class="slider-price">21.000.000 VND</p>
                                <a href="cart.html" class="btn btn-primary btn-lg hidden-xs">Mua Ngay</a>                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.slider -->
    <!-- mobile showcase -->
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="showcase-block">
                        <div class="display-logo ">
                            <a href="#"> <img src="{{('public/frontend/images/nexus.png')}}" alt=""></a>
                        </div>
                        <div class="showcase-img">
                            <a href="#"> <img src="{{('public/frontend/images/display_img_1.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="showcase-block active">
                        <div class="display-logo alignleft">
                            <a href="#">  <img src="{{('public/frontend/images/iphone.png')}}" alt="">
                            </a>
                        </div>
                        <div class="showcase-img">
                            <a href="#"> <img src="{{('public/frontend/images/display_img_2.png')}}" alt="" style="padding-left: 80px;"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="showcase-block ">
                        <div class="display-logo ">
                            <a href="#"> <img src="{{('public/frontend/images/samsung.png')}}" alt="">
                            </a>
                        </div>
                        <div class="showcase-img">
                            <a href="#"> <img src="{{('public/frontend/images/display_img_3.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="showcase-block">
                        <div class="display-logo ">
                            <a href="#"><img src="{{('public/frontend/images/htc.png')}}" alt=""></a>
                        </div>
                        <div class="showcase-img">
                            <a href="#"><img src="{{('public/frontend/images/display_img_4.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="showcase-block">
                        <div class="display-logo">
                            <a href="#">  <img src="{{('public/frontend/images/alcatel.png')}}" alt=""></a>
                        </div>
                        <div class="showcase-img">
                            <a href="#"> <img src="{{('public/frontend/images/display_img_5.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="showcase-block">
                        <div class="display-logo ">
                            <a href="#"><img src="{{('public/frontend/images/pixel.png')}}" alt=""></a>
                        </div>
                        <div class="showcase-img">
                            <a href="#"><img src="{{('public/frontend/images/display_img_6.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="showcase-block">
                        <div class="display-logo ">
                            <a href="#"><img src="{{('public/frontend/images/vivo.png')}}" alt=""></a>
                        </div>
                        <div class="showcase-img">
                            <a href="#"><img src="{{('public/frontend/images/display_img_7.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.mobile showcase -->
    <!-- latest products -->
    <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box">
                <div class="box-head">
                    <h3 class="head-title">Sản phẩm mới nhất</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        @foreach ($newProducts as $product)
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="product-block">
                                    <div class="product-img">
                                        <a href="{{ route('product.show', ['id' => $product->id]) }}">
                                            <img src="{{ asset('public/frontend/images/' . $product->image) }}" alt="{{ $product->name }}">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h5>
                                            <a href="{{ route('product.show', ['id' => $product->id]) }}" class="product-title">{{ $product->name }}</a>
                                        </h5>
                                        <div class="product-meta">
                                            <a href="#" class="product-price">{{ number_format($product->price, 0, ',', '.') }} VND</a>
                                            @if($product->discount_price)
                                                <a href="#" class="discounted-price">
                                                    <strike>{{ number_format($product->discount_price, 0, ',', '.') }} VND</strike>
                                                </a>
                                                <span class="offer-price">{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}% off</span>
                                                <div class="shopping-btn">
                                                    <button class="btn-like favorite-icon" 
                                                            data-product-id="{{ $product->id }}" 
                                                            data-url="{{ route('favorites.add') }}">
                                                        <i class="fa fa-heart"></i>
                                                    </button>
                                                    <button 
                                                        class="product-btn btn-cart add-to-cart" 
                                                        data-product-id="{{ $product->id }}" 
                                                        data-url="{{ route('cart.add') }}">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bán chạy nhất -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box">
                <div class="box-head">
                    <h3 class="head-title">Bán chạy nhất</h3>
                </div>
                <div class="box-body">
                    <div class="owl-carousel owl-two owl-theme">
                        @foreach ($bestSellers as $product)
                            <div class="item">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="product-block">
                                        <div class="product-img">
                                            <a href="{{ route('product.show', ['id' => $product->id]) }}">
                                                <img src="{{ asset('public/frontend/images/' . $product->image) }}" alt="{{ $product->name }}">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h5>
                                                <a href="{{ route('product.show', ['id' => $product->id]) }}" class="product-title">{{ $product->name }}</a>
                                            </h5>
                                            <div class="product-meta">
                                                <a href="#" class="product-price">{{ number_format($product->price, 0, ',', '.') }} VND</a>
                                                @if($product->discount_price)
                                                    <a href="#" class="discounted-price">
                                                        <strike>{{ number_format($product->discount_price, 0, ',', '.') }} VND</strike>
                                                    </a>
                                                    <span class="offer-price">{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}% off</span>
                                                    <div class="shopping-btn">
                                                        <button class="btn-like favorite-icon" 
                                                                data-product-id="{{ $product->id }}" 
                                                                data-url="{{ route('favorites.add') }}">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                        <button 
                                                            class="product-btn btn-cart add-to-cart" 
                                                            data-product-id="{{ $product->id }}" 
                                                            data-url="{{ route('cart.add') }}">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Đang khuyến mãi -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box">
                <div class="box-head">
                    <h3 class="head-title">Đang khuyến mãi</h3>
                </div>
                <div class="box-body">
                <div class="row">
                    @foreach ($discountedProducts as $product)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="product-block">
                                <div class="product-img">
                                    <a href="{{ route('product.show', ['id' => $product->id]) }}">
                                        <img src="{{ asset('public/frontend/images/' . $product->image) }}" alt="{{ $product->name }}">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h5>
                                        <a href="{{ route('product.show', ['id' => $product->id]) }}" class="product-title">{{ $product->name }}</a>
                                    </h5>
                                    <div class="product-meta">
                                        <a href="#" class="product-price">{{ number_format($product->price, 0, ',', '.') }} VND</a>
                                        @if($product->discount_price)
                                            <a href="#" class="discounted-price">
                                                <strike>{{ number_format($product->discount_price, 0, ',', '.') }} VND</strike>
                                            </a>
                                            <span class="offer-price">{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}% off</span>
                                            <div class="shopping-btn">
                                                <button class="btn-like favorite-icon" 
                                                    data-product-id="{{ $product->id }}" 
                                                    data-url="{{ route('favorites.add') }}">
                                                    <i class="fa fa-heart"></i>
                                                </button> 
                                                <button 
                                                    class="product-btn btn-cart add-to-cart" 
                                                    data-product-id="{{ $product->id }}" 
                                                    data-url="{{ route('cart.add') }}">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.product -->

    <!-- /.featured products -->
    <!-- cta -->
    <!-- /.cta -->
    <!-- features -->
    <div class="bg-default pdt40 pdb40">
        <div class="container">
            <div class="row">
                <!-- features -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-left">
                        <div class="feature-outline-icon">
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <div class="feature-content">
                            <h3 class="text-white">Thanh toán an toàn</h3>
                            <p>Mang đến dịch vụ trải nghiệm thoải mái nhất, an toàn, tiện dụng, Mobistore! </p>
                        </div>
                    </div>
                </div>
                <!-- features -->
                <!-- features -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-left">
                        <div class="feature-outline-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="feature-content">
                            <h3 class="text-white">Phản hồi 24/7</h3>
                            <p>Trợ giúp liên lạc, tham khảo , tra cứu 24/7!</p>
                        </div>
                    </div>
                </div>
                <!-- features -->
                <!-- features -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-left feature-circle">
                        <div class="feature-outline-icon">
                            <i class="fa fa-rotate-left "></i>
                        </div>
                        <div class="feature-content">
                            <h3 class="text-white">Đổi trả miễn phí</h3>
                            <p>Miễn phí bảo hành đổi trả lên đến 365 ngày!</p>
                        </div>
                    </div>
                </div>
                <!-- features -->
                <!-- features -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-left">
                        <div class="feature-outline-icon">
                            <i class="fa fa-dollar"></i>
                        </div>
                        <div class="feature-content">
                            <h3 class="text-white">Giá tốt nhất</h3>
                            <p>Giá thành tốt nhất trong thị trường. Cập nhật sản phẩm 24/7!</p>
                        </div>
                    </div>
                </div>
                <!-- features -->
            </div>
        </div>
    </div>
    @endsection