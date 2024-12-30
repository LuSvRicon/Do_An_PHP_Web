<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Đăng nhập thành công
        $user = Auth::user(); // Lấy thông tin người dùng đã đăng nhập

        // Kiểm tra nếu là admin thì chuyển hướng đến trang admin
        if ($user->is_admin) {
            return redirect()->route('admin.dashboard'); // Route dành cho admin
        }

        // Nếu không phải admin, chuyển hướng đến trang người dùng thường
        return redirect()->route('pages.home'); // Thay 'pages.home' bằng route bạn muốn
    }

    // Đăng nhập thất bại
    return back()->withErrors([
        'email' => 'Thông tin đăng nhập không chính xác.',
    ]);
    }
}
?>
