<?php

namespace App\Service\client;

use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeService
{
    public function getAllPropertyTypes()
    {
        // Lấy tất cả các dự án với các trường cần thiết
        return PropertyType::all(); // Lấy toàn bộ dữ liệu từ bảng PropertyTypes
    }
}
