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
    public function searchProperties(array $filters, $perPage, $orderBy = 'created_at', $order = 'DESC')
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
        if (!empty($filters['deal_type'])) {
            $query->where('deal_type', $filters['deal_type']);
        }

        // Bộ lọc theo loại hình bất động sản
        if (!empty($filters['property_type'])) {
            $query->where('type_id', $filters['property_type']);
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

        // Bộ lọc theo nội thất
        if (!empty($filters['furniture'])) {
            $query->where('furniture', $filters['furniture']);
        }

        // Bộ lọc theo hướng nhà
        if (!empty($filters['direction'])) {
            $query->where('direction', $filters['direction']);
        }

        // **Thêm chức năng tìm kiếm theo từ khóa**
        if (!empty($filters['keyword'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'LIKE', '%' . $filters['keyword'] . '%')
                    ->orWhere('description', 'LIKE', '%' . $filters['keyword'] . '%');
            });
        }

        // Sắp xếp theo cột và thứ tự
        // Sắp xếp theo giá
        if ($orderBy === 'price') {
            $query->orderByRaw("
            CASE
                WHEN price_type = 1 THEN price
                WHEN price_type = 2 THEN price * area
                ELSE NULL
            END {$order},
            price_type = 3 ASC
        ");
        } else {
            // Sắp xếp mặc định
            $query->orderBy($orderBy, $order);
        }

        return $query->paginate($perPage);
    }
}
