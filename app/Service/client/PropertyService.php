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

    // tìm kiếm bất động sản theo bộ lọc
    public function searchProperties(array $filters, $perPage)
    {
        $query = Property::with(['images', 'primaryImage']);

        // Bộ lọc theo khu vực
        if (!empty($filters['province'])) {
            $query->where('province', $filters['province']);
        }

        // Bộ lọc theo dự án
        if (!empty($filters['project_id'])) {
            $query->where('project_id', $filters['project_id']);
        }

        // Bộ lọc theo loại hình giao dịch
        if (!empty($filters['transaction_type'])) {
            $query->where('transaction_type', $filters['transaction_type']);
        }

        // Bộ lọc theo loại hình bất động sản
        if (!empty($filters['property_type_id'])) {
            $query->where('property_type_id', $filters['property_type_id']);
        }

        // Bộ lọc theo giá
        if (!empty($filters['price_min'])) {
            $query->where('price', '>=', $filters['price_min']);
        }
        if (!empty($filters['price_max'])) {
            $query->where('price', '<=', $filters['price_max']);
        }

        // Bộ lọc theo diện tích
        if (!empty($filters['area_min'])) {
            $query->where('area', '>=', $filters['area_min']);
        }
        if (!empty($filters['area_max'])) {
            $query->where('area', '<=', $filters['area_max']);
        }

        // Bộ lọc theo số phòng ngủ
        if (!empty($filters['bedrooms'])) {
            $query->where('bedrooms', '>=', $filters['bedrooms']);
        }

        // Bộ lọc theo số phòng tắm
        if (!empty($filters['bathrooms'])) {
            $query->where('bathrooms', '>=', $filters['bathrooms']);
        }

        return $query->paginate($perPage);
    }
}
