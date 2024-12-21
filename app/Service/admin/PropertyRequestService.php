<?php

namespace App\Service\admin;

use App\Models\PropertyRequest;
use Illuminate\Http\Request;

class PropertyRequestService
{
    //  Thêm thông tin liên hệ của khách hàng
    public function getAllPropertyRequests()
    {
        // Lấy toàn bộ dữ liệu từ bảng PropertyRequests
        return PropertyRequest::with('property')->get();
    }
}
