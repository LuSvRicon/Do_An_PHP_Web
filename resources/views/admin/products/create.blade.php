@extends('admin_layout')

@section('content')
<h1>Thêm sản phẩm</h1>
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả sản phẩm</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="form-group">
        <label for="price">Giá</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>
    <div class="form-group">
        <label for="discount_price">Giá giảm</label>
        <input type="number" class="form-control" id="discount_price" name="discount_price">
    </div>
    <div class="form-group">
        <label for="os">Hệ điều hành</label>
        <input type="text" class="form-control" id="os" name="os">
    </div>
    <div class="form-group">
        <label for="brand">Thương hiệu</label>
        <input type="text" class="form-control" id="brand" name="brand">
    </div>
    <div class="form-group">
        <label for="image">Ảnh sản phẩm</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="stock">Số lượng</label>
        <input type="number" class="form-control" id="stock" name="stock" required>
    </div>
    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select class="form-control" id="status" name="status" required>
            <option value="1">Kích hoạt</option>
            <option value="0">Không kích hoạt</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
</form>

@endsection
