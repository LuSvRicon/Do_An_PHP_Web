@extends('admin_layout')

@section('content')
<h1>Sửa sản phẩm</h1>
<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
    </div>
    <div class="form-group">
        <label for="price">Giá</label>
        <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
    </div>
    <div class="form-group">
        <label for="discount_price">Giá giảm</label>
        <input type="number" name="discount_price" id="discount_price" class="form-control" value="{{ $product->discount_price }}" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea name="description" id="description" class="form-control" required>{{ $product->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="os">Hệ điều hành</label>
        <input type="text" name="os" id="os" class="form-control" value="{{ $product->os }}" required>
    </div>
    <div class="form-group">
        <label for="brand">Thương hiệu</label>
        <input type="text" name="brand" id="brand" class="form-control" value="{{ $product->brand }}" required>
    </div>
    <div class="form-group">
        <label for="image">Ảnh sản phẩm</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection
