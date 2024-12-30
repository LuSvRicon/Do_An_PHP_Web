<?php
namespace App\Http\Controllers; 

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        // Kiểm tra nếu có từ khóa tìm kiếm
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where('name', 'like', '%' . $search . '%') // Tìm kiếm theo tên sản phẩm
              ->orWhere('description', 'like', '%' . $search . '%'); // Tìm kiếm theo mô tả
    }
        // Lọc theo hệ điều hành
        if ($request->has('os')) {
            $query->whereIn('os', $request->os);
        }
        // Lọc theo hãng sản xuất
        if ($request->has('brand')) {
            $query->whereIn('brand', $request->brand);
        }

        // Lọc theo giá
        if ($request->has('price')) {
            $priceRange = explode('-', $request->price);
            if (count($priceRange) == 2) {
                $query->whereBetween('price', [(float)$priceRange[0], (float)$priceRange[1]]);
            }
        }
        // Sắp xếp
        if ($request->has('sort_by')) {
            switch ($request->sort_by) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'best_selling':
                    $query->orderBy('sold', 'desc');
                    break;
            }
        }
        // Lấy danh sách sản phẩm với phân trang
        $products = $query->paginate(8);

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}
