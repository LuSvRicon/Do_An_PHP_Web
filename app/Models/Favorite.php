<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = 'favorites'; // Bảng trong cơ sở dữ liệu

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    // Liên kết với người dùng
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Liên kết với sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
