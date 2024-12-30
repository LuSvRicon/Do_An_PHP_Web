<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all(); // Lấy toàn bộ phản hồi
        return view('admin.feedbacks', compact('feedbacks'));
    }

    public function store(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'details' => 'required|string',
        ]);

        // Lưu phản hồi vào database
        Feedback::create($request->all());

        // Chuyển hướng về trang liên hệ với thông báo thành công
        return redirect()->back()->with('success', 'Phản hồi của bạn đã được gửi thành công!');
    }
    public function destroy($id)
{
    // Tìm phản hồi theo ID
    $feedback = Feedback::findOrFail($id);

    // Xóa phản hồi
    $feedback->delete();

    // Chuyển hướng về trang danh sách phản hồi với thông báo thành công
     return redirect()->route('feedback.index')->with('success', 'Phản hồi đã được xóa thành công!');
}

}
