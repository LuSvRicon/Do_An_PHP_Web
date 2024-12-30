<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FeedbackController;



/*
|----------------------------------------------------------------------| 
| Web Routes 
|----------------------------------------------------------------------|
*/

// Hiển thị giao diện
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('pages.home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::post('/contact', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/blog_default', [PostController::class, 'index'])->name('blog_default');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


// Đăng nhập 
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('postLogin');

// Đăng ký
Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [RegisterController::class, 'register']);

// Đăng xuất 
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'Đăng xuất thành công!');
})->middleware('auth')->name('user.logout');

// Danh sách sản phẩm và chi tiết sản phẩm
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

// Route cho giỏ hàng
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('pages.cart'); // Hiển thị giỏ hàng
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add'); // Thêm sản phẩm vào giỏ hàng
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update'); // Cập nhật số lượng sản phẩm
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove'); // Xóa sản phẩm khỏi giỏ hàng
    
// Route cho trang danh sách yêu thích
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index')->middleware('auth');
Route::post('/favorites/add', [FavoriteController::class, 'add'])->name('favorites.add')->middleware('auth');
// Xóa sản phẩm khỏi danh sách yêu thích
Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy')->middleware('auth');
});
// Admin 
Route::middleware(['auth', 'is_admin'])->group(function () {
    // Trang chính admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    //Đăng xuất trong trang Admin
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Quản lý người dùng
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

    // Quản lý sản phẩm
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/products/create', [AdminController::class, 'createProduct'])->name('admin.products.create'); // Thêm sản phẩm
    Route::post('/admin/products', [AdminController::class, 'storeProduct'])->name('admin.products.store'); // Lưu sản phẩm mới
    Route::get('/admin/products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit'); // Sửa sản phẩm
    Route::put('/admin/products/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update'); // Cập nhật sản phẩm
    Route::delete('/admin/products/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete'); // Xóa sản phẩm
    //Quản lý bài viết
    Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/admin/posts/{id}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/admin/posts/{id}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
    Route::put('/admin/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    //Phan hoi
    Route::get('/admin/feedbacks', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::delete('/admin/feedbacks/{id}', [FeedbackController::class, 'destroy'])->name('admin.feedbacks.delete');

});
    