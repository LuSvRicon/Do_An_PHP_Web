@extends('admin_layout')

@section('content')
<h1>Danh sách sản phẩm</h1>
<a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">Thêm sản phẩm</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
