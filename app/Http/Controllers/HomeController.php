<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy ngày hiện tại và 3 tháng trước
        $today = Carbon::today();
        $threeMonthsAgo = Carbon::now()->subMonths(3);
    
        // Lấy sản phẩm mới nhất trong 3 tháng qua
        $newProducts = Product::where('status', '1')
                              ->where('created_at', '>=', $threeMonthsAgo)
                              ->orderBy('created_at', 'desc')
                              ->limit(4)
                              ->get();
    
        if ($newProducts->isEmpty()) {
            $newProducts = Product::where('status', '1')
                                  ->orderBy('created_at', 'desc')
                                  ->limit(8)
                                  ->get();
        }
    
        // Lấy sản phẩm bán chạy
        $bestSellers = Product::where('status', '1')
                              ->where('sold', '>', 0)
                              ->orderBy('sold', 'desc')
                              ->limit(4)
                              ->get();
    
        // Lấy sản phẩm khuyến mãi
        $discountedProducts = Product::where('status', '1')
                                     ->whereNotNull('discount_price')
                                     ->where('discount_price', '>', DB::raw('price'))
                                     ->limit(4)
                                     ->get();
    
        // Truyền dữ liệu vào view
        return view('pages.home', compact('newProducts', 'bestSellers', 'discountedProducts'));
    }

    public function cart()
    {
        return view('pages.cart');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function blog_default()
    {
        return view('pages.blog_default');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function signup()
    {
        return view('pages.signup');
    }

    public function login()
    {
        return view('pages.login');
    }

    public function favorite()
    {
        return view('pages.favorite');
    }
}
