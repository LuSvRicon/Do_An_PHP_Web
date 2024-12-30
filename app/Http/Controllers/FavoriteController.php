<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class FavoriteController extends Controller
{
    public function index()
    {
    $favorites = Favorite::where('user_id', Auth::id())->with('product')->get();

    return view('pages.favorite', compact('favorites'));
    }
    public function add(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!Auth::check()) {
            return response()->json(['message' => 'Bạn cần đăng nhập để thêm vào danh sách yêu thích.'], 401);
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Kiểm tra sản phẩm đã có trong danh sách yêu thích chưa
        $favorite = Favorite::where('user_id', Auth::id())
                            ->where('product_id', $request->product_id)
                            ->first();

        if ($favorite) {
            return response()->json(['message' => 'Sản phẩm đã có trong danh sách yêu thích.'], 200);
        }

        // Thêm sản phẩm vào danh sách yêu thích
        Favorite::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
        ]);

        return response()->json(['message' => 'Đã thêm sản phẩm vào danh sách yêu thích.'], 200);
    }
    public function destroy($id)
{
    // Kiểm tra xem người dùng có đăng nhập không
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xóa sản phẩm khỏi danh sách yêu thích.');
    }

    // Tìm sản phẩm yêu thích theo ID và user_id
    $favorite = Favorite::where('user_id', Auth::id())->where('id', $id)->first();

    // Nếu không tìm thấy sản phẩm yêu thích, trả về thông báo lỗi
    if (!$favorite) {
        return redirect()->route('favorites.index')->with('error', 'Sản phẩm không tồn tại trong danh sách yêu thích.');
    }

    // Xóa sản phẩm yêu thích
    $favorite->delete();

    // Trả về thông báo thành công
    return redirect()->route('favorites.index')->with('success', 'Sản phẩm đã được xóa khỏi danh sách yêu thích.');
}



}
