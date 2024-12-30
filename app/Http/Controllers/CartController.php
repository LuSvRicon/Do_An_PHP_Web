<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Lấy tất cả sản phẩm trong giỏ hàng của người dùng
        $cartItems = CartItem::where('user_id', Auth::id())
                             ->with('product') // Lấy thông tin sản phẩm liên quan
                             ->get();

        // Loại bỏ mục giỏ hàng không có sản phẩm
        $cartItems = $cartItems->filter(function ($item) {
            return $item->product; // Loại bỏ nếu product là null
        });

        // Tính tổng số lượng sản phẩm trong giỏ hàng
        $cartQuantity = $cartItems->sum('quantity');

        // Trả về view với dữ liệu giỏ hàng
        return view('pages.cart', compact('cartItems', 'cartQuantity'));
    }

    public function add(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Bạn cần đăng nhập để thêm vào giỏ hàng.'], 401);
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);

        if (!$product || $product->status !== '1') {
            return response()->json(['message' => 'Sản phẩm không tồn tại hoặc không khả dụng.'], 400);
        }

        $cartItem = CartItem::where('user_id', Auth::id())
                            ->where('product_id', $request->product_id)
                            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        // Tính tổng số lượng sản phẩm trong giỏ hàng
        $cartQuantity = CartItem::where('user_id', Auth::id())->sum('quantity');

        return response()->json([
            'message' => 'Sản phẩm đã được thêm vào giỏ hàng.',
            'cartQuantity' => $cartQuantity,
        ]);
    }

    public function remove($id)
    {
        $cartItem = CartItem::where('user_id', Auth::id())->find($id);

        if (!$cartItem) {
            return redirect()->route('pages.cart')->withErrors(['message' => 'Mục giỏ hàng không tồn tại.']);
        }

        $cartItem->delete();

        return redirect()->route('pages.cart')->with('message', 'Đã xóa sản phẩm khỏi giỏ hàng.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::where('user_id', Auth::id())
                            ->where('product_id', $request->product_id)
                            ->first();

        if (!$cartItem) {
            return redirect()->route('pages.cart')->withErrors(['message' => 'Mục giỏ hàng không tồn tại.']);
        }

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->route('pages.cart');
    }
   

}
