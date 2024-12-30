@extends('layout')
@section('content')
<div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.html">Trang chủ</a></li>
                            <li>Điện thoại</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /. header-section-->
    <!-- product-list -->
    <div class="content">
<div class="container">
    <!-- Bộ lọc sản phẩm (Form tìm kiếm) -->
    <form method="GET" action="{{ route('products.index') }}">
        <div class="row">
            <!-- Lọc theo hệ điều hành -->
            <div class="col-md-3">
                    <label for="os">Hệ điều hành</label>
                    <select name="os[]" id="os" class="form-control" multiple>
                        <option value="android" {{ in_array('android', request('os', [])) ? 'selected' : '' }}>Android</option>
                        <option value="ios" {{ in_array('ios', request('os', [])) ? 'selected' : '' }}>iOS</option>
                    </select>
                </div>

            <!-- Lọc theo hãng sản xuất --> 
            <div class="col-md-3">
                <label for="brand">Hãng sản xuất</label>
                <select name="brand[]" id="brand" class="form-control" multiple>
                    <option value="samsung" {{ in_array('samsung', request('brand', [])) ? 'selected' : '' }}>Samsung</option>
                    <option value="apple" {{ in_array('apple', request('brand', [])) ? 'selected' : '' }}>Apple</option>
                    <option value="xiaomi" {{in_array('xiaomi',request('brand',[])) ?'selected':''}}>Xiaomi</option>
                    <!-- Thêm các lựa chọn khác ở đây -->
                </select>
            </div>


            <!-- Lọc theo giá -->
            <div class="col-md-3">
                <label for="price">Giá</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ request('price') }}" placeholder="Ví dụ: 500-1000">
            </div>

            <!-- Sắp xếp -->
            <div class="col-md-3">
                <label for="sort_by">Sắp xếp</label>
                <select name="sort_by" id="sort_by" class="form-control">
                    <option value="">Chọn</option>
                    <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Giá thấp đến cao</option>
                    <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Giá cao đến thấp</option>
                    <option value="best_selling" {{ request('sort_by') == 'best_selling' ? 'selected' : '' }}>Bán chạy</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3 btn-sm">Tìm kiếm</button>
    </form>
     <br>
    <!-- Hiển thị sản phẩm -->
    <div class="row mt-4">
    @foreach ($products as $product)
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb30">
        <a href="{{ route('product.show', $product->id) }}">
            <div class="product-block">
                <div class="product-img">
                    <img src="{{ asset('public/frontend/images/' . $product->image) }}" alt="{{ $product->name }}">
                </div>
                <div class="product-content">
                    <h5><a href="{{ route('product.show', $product->id) }}" class="product-title">{{ $product->name }}</a></h5>
                    <div class="product-meta">
                        <!-- Hiển thị giá sản phẩm -->
                        @if ($product->price)
                            <a href="#" class="product-price">{{ number_format($product->price, 0, ',', '.') }} VND</a>
                        @endif
                        @if ($product->discount_price)
                            <!-- Hiển thị giá giảm -->
                            <a href="#" class="discounted-price">{{ number_format($product->discount_price, 0, ',', '.') }} VND</a>
                            <span class="offer-price">{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}% off</span>
                        @endif
                    </div>
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
                </div>
            </div>
        </a>
    </div>
@endforeach
<!-- Hiển thị phân trang -->
<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="st-pagination">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
