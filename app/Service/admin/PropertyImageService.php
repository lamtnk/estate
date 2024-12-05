<?php

namespace App\Service\admin;

use App\Models\PropertyImage;
use Illuminate\Http\Request;

class PropertyImageService
{
    public function getPropertyImages($propertyId)
    {
        // Lấy toàn bộ ảnh của bất động sản
        return PropertyImage::with('property')->where('property_id', $propertyId)->get();
    }

    public function storeImage($propertyId, $image, $isPrimary)
    {
        // Tạo tên file duy nhất
        $fileName = uniqid() . '_' . $image->getClientOriginalName();

        // Chuyển file vào thư mục public/assets/images/property
        $image->move(public_path('assets/images/property'), $fileName);

        // Cập nhật đường dẫn ảnh
        $imagePath = 'assets/images/property/' . $fileName;

        // Tạo bản ghi trong bảng PropertyImage
        PropertyImage::create([
            'property_id' => $propertyId,
            'image_path' => $imagePath,
            'is_primary' => $isPrimary,
        ]);
    }
}
