<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('pages.signup'); // Đường dẫn tới file view bạn cung cấp
    }

    public function register(Request $request)
    {
        // Xác thực dữ liệu từ form
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:10',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Tạo người dùng mới
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Tự động đăng nhập sau khi đăng ký
        Auth::login($user);
        
        // Flash thông báo thành công
        session()->flash('success', 'Bạn đã đăng ký thành công! Chào mừng bạn.');

        // Chuyển hướng đến trang chủ hoặc trang mong muốn
        return redirect()->route('pages.home');
    }
}
?>