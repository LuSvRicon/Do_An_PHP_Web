<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'description', 'price', 'discount_price', 'os', 'brand', 'image', 'sold', 'created_at', 'updated_at', 'stock', 'status'
    ];
    
    
    
}
