@extends('admin_layout')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Danh Sách Bài Viết</h3>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-light">
                <i class="bi bi-plus-circle"></i> Tạo Bài Viết
            </a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Tiêu Đề</th>
                        <th>Tác Giả</th>
                        <th class="text-center">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->author->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning btn-sm me-2">
                                    <i class="bi bi-pencil-square"></i> Sửa
                                </a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
