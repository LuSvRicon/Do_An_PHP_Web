@extends('admin_layout')
@section('content')
    <h1>Danh sách phản hồi</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Vấn đề</th>
                <th>Chi tiết</th>
                <th>Ngày gửi</th>
                <th>Hành động</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->phone }}</td>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->subject }}</td>
                    <td>{{ $feedback->details }}</td>
                    <td>{{ $feedback->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <!-- Nút Xóa -->
                        <form action="{{ route('admin.feedbacks.delete', $feedback->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa phản hồi này?');">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
