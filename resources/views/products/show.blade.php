@extends('layout')

@section('title', $product->name)
@section('content')
<div class="container">
    <div class="row">
        <br>
        <br>
        <div class="col-md-6">
          <img src="{{ asset('public/frontend/images/' . $product->image) }}" 
               alt="{{ $product->name }}" 
               class="img-fluid" 
               style="max-width: 300px; height: auto; display: block; margin: 0 auto;">
        </div>
        <div class="col-md-6">
            <br>
            <br>
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
            <p>Giá hiện tại: {{ number_format($product->price, 0, ',', '.') }} VND</p>
            @if ($product->discount_price)
                <p>Giá gốc: {{ number_format($product->discount_price, 0, ',', '.') }} VND</p>
            @endif
            <div class="shopping-btn-container" style="display: flex; gap: 10px;">
                <!--Thêm giỏ hàng-->
                <div class="shopping-btn">
                    <button class="btn-primary add-to-cart"  
                            data-product-id="{{ $product->id }}" 
                            data-url="{{ route('cart.add') }}">
                        Thêm vào giỏ hàng
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                </div>
                <!--Thêm yêu thích-->
                <div class="shopping-btn">
                    <button class="btn-primary favorite-icon"
                            data-product-id="{{ $product->id }}"
                            data-url="{{ route('favorites.add') }}">
                        Thêm vào yêu thích
                        <i class="fa fa-heart"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection
