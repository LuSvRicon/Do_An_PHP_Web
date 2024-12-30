<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('Products', function (Blueprint $table) {
           
            $table->id(); // Tự động tạo cột 'id' kiểu big integer và auto increment
            $table->string('name'); // Tên sản phẩm
            $table->text('description')->nullable(); // Mô tả sản phẩm, có thể null
            $table->decimal('price', 10, 2); // Giá gốc sản phẩm
            $table->decimal('discount_price', 10, 2)->nullable(); // Giá giảm, có thể null
            $table->string('os')->nullable(); // Hệ điều hành, có thể null
            $table->string('brand'); // Thương hiệu sản phẩm
            $table->string('image')->nullable(); // Đường dẫn ảnh, có thể null
            $table->integer('sold')->default(0); // Số lượng đã bán, mặc định là 0
           
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('Products');
    }
}
