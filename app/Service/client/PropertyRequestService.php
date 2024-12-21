<?php

namespace App\Service\client;

use App\Models\PropertyRequest;
use Illuminate\Http\Request;

class PropertyRequestService
{
    //  Lưu thông tin liên hệ của khách hàng
    public function storePropertyRequest($data)
    {
        return PropertyRequest::create($data);
    }
}
