<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id(); // Tạo cột ID tự tăng
            $table->string('name'); // Tên người dùng
            $table->string('phone'); // Số điện thoại
            $table->string('email'); // Email
            $table->string('subject'); // Vấn đề
            $table->text('details'); // Chi tiết phản hồi
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}
