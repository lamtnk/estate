<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('news_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained()->onDelete('cascade'); // Liên kết với bảng news
            $table->foreignId('tag_id')->constrained()->onDelete('cascade'); // Liên kết với bảng tags
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news_tag');
    }
};
