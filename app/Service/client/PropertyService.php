<?php

namespace App\Service\client;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyService
{
    public function getAllProperties($perPage)
    {
        // Lấy dữ liệu với phân trang
        return Property::with(['images', 'primaryImage'])->paginate($perPage);
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
        return Property::with(['images', 'propertyType', 'project'])->findOrFail($id);
    }
}
