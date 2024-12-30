<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        // Đếm số lượng người dùng không phải admin
    $userCount = User::where('is_admin', false)->count();

    // Đếm số lượng sản phẩm
    $productCount = Product::count();
    //Đếm số bài viết
    $postCount = Post::count();
    //Dem so luong phan hoi
    $feedbacksCount = Feedback::count();

    // Truyền các biến vào view
    return view('admin.dashboard', compact('userCount', 'productCount','postCount','feedbacksCount'));
    }

    public function users()
    {
        $users = User::where('is_admin', false)->get();
        return view('admin.users', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Người dùng đã bị xóa!');
    }
    public function products()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function createProduct()
    {
        return view('admin.products.create');
    }

public function storeProduct(Request $request)
    {
                // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'os' => 'nullable|string',
            'brand' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer|min:0',
            'status' => 'required|boolean', // Hoặc điều kiện phù hợp với status
        ]);

        // Xử lý ảnh (nếu có)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Tạo tên file duy nhất
            $image->move(public_path('frontend/images'), $imageName); // Di chuyển ảnh vào thư mục public/frontend/images
        } else {
            $imageName = 'default.jpg'; // Nếu không có ảnh
        }

        // Lưu sản phẩm vào cơ sở dữ liệu
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price ?: 0, // Nếu không có giá trị discount_price, gán giá trị mặc định là 0
            'os' => $request->os,
            'brand' => $request->brand ?: 'unknown', // Nếu không có giá trị brand, gán giá trị mặc định 'unknown'
            'image' => $imageName, // Lưu tên ảnh
            'sold' => 0, // Mặc định số lượng bán là 0 khi thêm mới sản phẩm
            'stock' => $request->stock ?: 0, // Nếu không có giá trị stock, gán giá trị mặc định là 0
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.products')->with('success', 'Sản phẩm đã được thêm!');
    }

public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function updateProduct(Request $request, $id)
{
    // Xác thực dữ liệu đầu vào
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'discount_price' => 'nullable|numeric|min:0',
        'description' => 'required|string',
        'os' => 'nullable|string',
        'brand' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Lấy sản phẩm từ database
    $product = Product::findOrFail($id);

    // Cập nhật các trường
    $product->name = $request->name;
    $product->price = $request->price;
    $product->discount_price = $request->discount_price ?: 0;
    $product->description = $request->description;
    $product->os = $request->os;
    $product->brand = $request->brand ?: 'unknown';

    // Xử lý ảnh nếu có upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('frontend/images'), $imageName);

        // Gán tên ảnh mới cho sản phẩm
        $product->image = $imageName;
    }

    // Lưu vào cơ sở dữ liệu
    $product->save();

    // Redirect về trang danh sách sản phẩm với thông báo thành công
    return redirect()->route('admin.products')->with('success', 'Sản phẩm đã được cập nhật!');
}

    

public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Sản phẩm đã được xóa!');
    }
    public function logout()
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect('/login')->with('success', 'You have been logged out.');
    }
}
    // public function deleteFeedback($id)
    // {
    //     $feedback = Feedback::findOrFail($id); // Lấy phản hồi theo ID
    //     $feedback->delete(); // Xóa phản hồi
    
    //     return redirect()->route('admin.feedbacks.delete')->with('success', 'Phản hồi đã được xóa thành công!');
    // }
    

