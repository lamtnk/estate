<?php

namespace App\Service\admin;

use App\Models\PropertyRequest;
use Illuminate\Http\Request;

class PropertyRequestService
{
    //  Thêm thông tin liên hệ của khách hàng
    public function getAllConsultationRequests()
    {
        // Lấy toàn bộ yêu cầu tư vấn từ bảng PropertyRequests
        return PropertyRequest::with('property')->where('request_type', 'consultation')->get();
    }

    public function getAllVisitRequests()
    {
        // Lấy toàn bộ yêu cầu tham quan từ bảng PropertyRequests
        return PropertyRequest::with('property')->where('request_type', 'visit')->get();
    }

    // Thay đổi trạng thái xem của yêu cầu
    public function toggleStatus($id)
    {
        $propertyRequest = PropertyRequest::findOrFail($id);
        $propertyRequest->status = !$propertyRequest->status;
        $propertyRequest->save();
    }

    // đánh dấu đã xem mọi yêu cầu
    public function markAllSeen($requestType)
    {
        PropertyRequest::where('request_type', $requestType)
            ->where('status', 0)
            ->update(['status' => 1]);
    }
}
