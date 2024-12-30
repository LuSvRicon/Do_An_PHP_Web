@extends('layout')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="box">
                        <div class="box-head">
                            <h2 class="head-title">Liên hệ với chúng tôi</h2>
                        </div>
                        <div class="box-body contact-form">
                            <div class="row">
                            <form method="POST" action="{{ route('feedback.store') }}">
                                    @csrf
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input id="name" name="name" type="text" placeholder="Họ và tên" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input id="phone" name="phone" type="text" placeholder="Điền số điện thoại" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input id="email" name="email" type="email" placeholder="Điền địa chỉ email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input id="subject" name="subject" type="text" placeholder="Vấn đề của bạn" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <textarea class="form-control" id="textarea" name="details" rows="4" placeholder="Chi tiết" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Gửi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.contact-form -->
                <!-- address-block -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="box">
                        <div class="box-head">
                            <h2 class="head-title">Thông tin liên hệ</h2>
                        </div>
                        <div class="box-body">
                            <div class="contact-block">
                                <h4>Địa chỉ</h4>
                                <p>Ấp Tân Thanh,Xã Tân Bình,Huyện Tân Biên,Thành phố Tây Ninh, Việt Nam - 2024</p>
                            </div>
                            <div class="contact-block">
                                <h4>Đường dây nóng</h4>
                                <p class="mb0">Phone: <span class="text-default">0843053017</span></p>
                                <p class="mb0">Email: <span class="text-default">dangkhoa1546@gmail.com</span></p>
                            </div>
                            <div class="contact-block">
                                <h4>Liên kết</h4>
                                <div class="ft-social">
                                    <span><a href="https://www.facebook.com/profile.php?id=100041815470386" class="btn-social btn-facebook" ><i class="fa fa-facebook"></i></a></span>
                                    <span><a href="https://www.instagram.com/khoadng574/" class=" btn-social btn-instagram"><i class="fa fa-instagram"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.address-block -->
            </div>
        </div>
    </div>
@endsection