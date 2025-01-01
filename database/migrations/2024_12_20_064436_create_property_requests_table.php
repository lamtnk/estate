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
            $table->text('message')->nullable(); // nội dung tin nhắn
            $table->date('date'); // ngày
            $table->time('time'); // giờ
            $table->enum('purpose', ['residential', 'investment', 'none']); // mục đích mua (để ở, đầu tư)
            $table->enum('visit_type', ['direct ', 'video call', 'none']); // Hình thức tham quan (trực tiếp, video call)
            $table->enum('request_type', ['consultation', 'visit']); // loại yêu cầu
            $table->boolean('status'); // Tình trạng yêu cầu (chưa xem, đã xem)
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
