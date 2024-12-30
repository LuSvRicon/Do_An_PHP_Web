<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('author_id')->nullable(); // Cho phép giá trị NULL
            $table->timestamps();
    
            // Đặt cột `author_id` làm khóa ngoại với hành động 'set null' khi bản ghi user bị xóa
            $table->foreign('author_id')
                  ->references('id')->on('users')
                  ->onDelete('set null'); // Nếu user bị xóa, author_id sẽ được đặt thành NULL
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
