<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('unit_code')->nullable(); // Trường mã căn
            $table->foreignId('project_id')->constrained()->onDelete('cascade'); // Liên kết với bảng projects
            $table->foreignId('type_id')->constrained('property_types')->onDelete('cascade'); // Liên kết với bảng property_types
            $table->string('name'); // Tên bất động sản
            $table->float('area'); // Diện tích tổng
            $table->float('frontage')->nullable(); // Mặt tiền sử dụng
            $table->float('floor_1_area')->nullable(); // Diện tích sàn tầng 1
            $table->decimal('price', 15, 2); // Giá
            $table->integer('price_type'); //  Kiểu tính giá
            $table->enum('deal_type', ['sell', 'rent']); // Loại hình giao dịch
            $table->integer('number_of_floors'); // Số tầng
            $table->integer('bedrooms'); // Số phòng ngủ
            $table->enum('furniture', ['Bare Shell', 'Basic Furnished', 'Fully Furnished', 'Luxury Furnished']); // Mức độ nội thất bàn giao
            $table->enum('direction', ['East', 'West', 'South', 'North', 'Southeast', 'Northeast', 'Southwest', 'Northwest'])->nullable(); // Hướng nhà
            $table->text('description'); // Mô tả chi tiết (bao gồm tính năng)
            $table->longText('content')->nullable();
            $table->enum('status', ['red book', 'pending red book', 'sale contract', 'land measurement extract']); // Tình trạng pháp lý
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
