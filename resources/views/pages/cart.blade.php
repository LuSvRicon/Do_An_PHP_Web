@extends('layout')
@section('content')
<br>
<div class="container mt-5">
    <h2 class="mb-4">Giỏ Hàng</h2>

    @if($cartItems->isEmpty())
        <p class="text-center">Giỏ hàng của bạn trống!</p>
        <div class="text-center mb-4">
            <a href="{{ route('pages.home') }}" class="btn btn-primary">Tiếp tục mua sắm</a>
        </div>
    @else
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>
                        @if(isset($item->product))
                            <img src="{{ asset('public/frontend/images/' . ($item->product->image ?? 'default.jpg')) }}" 
                                 alt="{{ $item->product->name ?? 'No Name' }}" 
                                 style="width: 60px; height: 60px; margin-right: 10px;">
                            {{ $item->product->name }}
                        @else
                            <p class="text-danger">Sản phẩm này đã bị xóa.</p>
                        @endif
                    </td>
                    <td>{{ number_format($item->product->price ?? 0) }}đ</td>
                    <td>
                        <form action="{{ route('cart.update') }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control form-control-sm w-50">
                            <button type="submit" class="btn btn-sm btn-warning ml-2">Cập nhật</button>
                        </form>
                    </td>
                    <td>{{ number_format(($item->product->price ?? 0) * $item->quantity) }}đ</td>
                    <td>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i> Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-right"><strong>Tổng cộng:</strong></td>
                    <td><strong>{{ number_format($cartItems->sum(fn($item) => ($item->product->price ?? 0) * $item->quantity)) }}đ</strong></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('pages.home') }}" class="btn btn-secondary">Tiếp tục mua sắm</a>
        </div>
    @endif
</div>
<br>
<br>
@endsection
