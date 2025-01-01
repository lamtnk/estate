<?php

namespace App\Service\admin;

use App\Models\PropertyImage;
use Illuminate\Http\Request;

class PropertyImageService
{
    public function getPropertyImages($propertyId)
    {
        // Lấy toàn bộ ảnh của bất động sản
        return PropertyImage::where('property_id', $propertyId)->get();
    }

    public function getPrimaryImage($propertyId)
    {
        return PropertyImage::where('property_id', $propertyId)
            ->where('is_primary', true)
            ->first(); // Chỉ lấy ảnh chính đầu tiên
    }

    public function getImageById($id)
    {
        return PropertyImage::findOrFail($id);
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

    public function deleteImage($id)
    {
        // Lấy thông tin ảnh cần xóa
        $image = $this->getImageById($id);

        // Xóa file vật lý trên server
        $filePath = public_path($image->image_path);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Xóa bản ghi trong database
        $image->delete();
    }

    public function deletePropertyImages($propertyId)
    {
        $images = $this->getPropertyImages($propertyId);

        foreach ($images as $image) {
            // Xóa tệp vật lý
            $filePath = public_path($image->image_path);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Xóa bản ghi trong db
            $image->delete();
        }
    }

    public function changePrimaryImage($propertyId, $image, $isPrimary)
    {
        $oldPrimaryImage = $this->getPrimaryImage($propertyId);

        // Nếu tải ảnh chính mới lên từ edit form thì sẽ thay ảnh chính
        if ($image != null) {
            // Nếu ảnh chính cũ có tồn tại thì xóa ảnh cũ
            if ($oldPrimaryImage != null) {
                $this->deleteImage($oldPrimaryImage->id);
            }

            // Lưu ảnh chính mới
            $this->storeImage($propertyId, $image, $isPrimary);
        }
    }
}
