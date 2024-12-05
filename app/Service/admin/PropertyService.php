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
        return Property::all();
    }

    public function storeProperty($data)
    {
        return Property::create($data); // Tạo Property
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
