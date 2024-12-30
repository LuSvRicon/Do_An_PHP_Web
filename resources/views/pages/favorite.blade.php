@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="box">
            <div class="box-head box-head-gray">
                <h3 class="head-title">Danh sách yêu thích</h3>
            </div>
            <div class="box-body box-body-gray">
                @if($favorites->isEmpty())
                    <p class="text-center">Danh sách yêu thích của bạn đang trống!</p>
                @else
                <ul class="list-favorites">
                    @foreach($favorites as $favorite)
                    <li class="item">
                    <form action="{{ route('favorites.destroy', $favorite->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')  <!-- Đảm bảo phương thức DELETE -->
                        <button type="submit" class="btn-delete" data-id="{{ $favorite->id }}">×</button>
                    </form>
                        <div class="thumbnail">
                            <a href="{{ route('product.show', $favorite->product->id) }}" class="img">
                                <img src="{{ asset('public/frontend/images/'. $favorite->product->image) }}" alt="{{ $favorite->product->name }}" />
                            </a>
                        </div>
                        <div class="body">
                            <a href="{{ route('product.show', $favorite->product->id) }}" class="name">
                                {{ $favorite->product->name }}
                            </a>
                            <div class="rating-review">
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span>
                                            <i class="fa {{ $i <= $favorite->product->rating ? 'fa-star' : 'fa-star-o' }}"></i>
                                        </span>
                                    @endfor
                                </div>
                                <span class="review-count">
                                    ({{ $favorite->product->reviews_count }} nhận xét)
                                </span>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="price-discount">{{ number_format($favorite->product->price) }} đ</div>
                            @if($favorite->product->discount_price)
                            <div class="wrap">
                                <div class="price">
                                    <strike>{{ number_format($favorite->product->discount_price) }} đ</strike>
                                </div>
                                <div class="discount">
                                    -{{ round(($favorite->product->price - $favorite->product->discount_price) / $favorite->product->price * 100) }}%
                                </div>
                            </div>
                            @endif
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <a href="{{ route('pages.home') }}" class="btn-link" style="display:block; margin-bottom: 20px">
        <center>Trở về trang mua hàng</center>
        </a>
    </div>
</div>
<br>
@endsection