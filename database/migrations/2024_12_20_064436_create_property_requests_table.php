<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('property_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade'); // Liên kết với bảng properties
            $table->string('name'); // tên người gửi yêu cầu liên hệ
            $table->string('email'); // địa chỉ email
            $table->string('phone'); // số điện thoại
            $table->enum('purpose', ['residential', 'investment ']); // mục đích mua (để ở, đầu tư)
            $table->date('date'); // ngày hỗ trợ tư vấn
            $table->time('time'); // giờ hỗ trợ tư vấn
            $table->text('message')->nullable(); // nội dung tin nhắn
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_requests');
    }
};
