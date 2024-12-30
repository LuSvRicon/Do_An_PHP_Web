@extends('admin_layout')
@section('content')
<div class="container">
    <h1>Thêm Bài Viết</h1>
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Tiêu Đề</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Nội Dung</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Hình Ảnh</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
@endsection
