<?php

namespace App\Service\admin;

use App\Models\Project;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyService
{
    public function getAllProperties()
    {
        // Lấy toàn bộ dữ liệu từ bảng Properties
        return Property::with(['project', 'propertyType'])->get();
    }

    public function storeProperty($data, $image)
    {
        $property = Property::create($data); // Tạo Property
        $this->storeImage($property->id, $image, true); // Lưu ảnh chính của bất động sản
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

    /**
     * Lấy bất động sản theo ID.
     *
     * @param int $id
     * @return Property
     */
    public function getPropertyById($id)
    {
        return Property::with('images')->findOrFail($id);
    }

    /**
     * Cập nhật thông tin bất động sản.
     *
     * @param int $id
     * @param array $data
     * @return Property
     */
    public function updateProperty($id, array $data)
    {
        $Property = $this->getPropertyById($id);  // Lấy bất động sản theo ID
        $Property->update($data);  // Cập nhật thông tin bất động sản
        return $Property;
    }

    public function deleteProperty($id)
    {
        $Property = $this->getPropertyById($id);
        $Property->delete();
    }
}
