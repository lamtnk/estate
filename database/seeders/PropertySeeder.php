<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run()
    {
        // Tạo bất động sản đầu tiên
        $property1 = Property::create([
            'project_id' => 1, // Giả sử dự án có ID = 1
            'type_id' => 2, // Loại bất động sản có ID = 2
            'name' => 'Luxury Villa in City Center',
            'area' => 400, // Diện tích 400 m²
            'frontage' => 10, // Mặt tiền 10m
            'floor_1_area' => 150, // Diện tích sàn tầng 1
            'price' => 15000000000, // Giá 15 tỷ
            'bedrooms' => 4,
            'bathrooms' => 4,
            'parking' => 2, // Có 2 chỗ đậu xe
            'description' => 'This is a luxurious villa located in the city center with a swimming pool, garden, and security...',
            'status' => 'available',
            'unit_code' => 'VILLA-001', // Mã căn cho bất động sản
        ]);

        // Thêm ảnh cho bất động sản này
        PropertyImage::create([
            'property_id' => $property1->id,
            'image_path' => 'storage/images/property1/image1.jpg',
            'is_primary' => true, // Đánh dấu ảnh này là chính
        ]);

        PropertyImage::create([
            'property_id' => $property1->id,
            'image_path' => 'storage/images/property1/image2.jpg',
            'is_primary' => false, // Ảnh phụ
        ]);

        PropertyImage::create([
            'property_id' => $property1->id,
            'image_path' => 'storage/images/property1/image3.jpg',
            'is_primary' => false, // Ảnh phụ
        ]);

        // Tạo bất động sản thứ hai
        $property2 = Property::create([
            'project_id' => 2, // Giả sử dự án có ID = 2
            'type_id' => 1, // Loại bất động sản có ID = 1
            'name' => 'Modern Apartment near the Beach',
            'area' => 150, // Diện tích 150 m²
            'frontage' => 5, // Mặt tiền 5m
            'floor_1_area' => 80, // Diện tích sàn tầng 1
            'price' => 5000000000, // Giá 5 tỷ
            'bedrooms' => 2,
            'bathrooms' => 2,
            'parking' => 1, // Có 1 chỗ đậu xe
            'description' => 'This modern apartment is located near the beach, offering stunning sea views and all modern amenities.',
            'status' => 'available',
            'unit_code' => 'APT-002', // Mã căn cho bất động sản
        ]);

        // Thêm ảnh cho bất động sản thứ hai
        PropertyImage::create([
            'property_id' => $property2->id,
            'image_path' => 'storage/images/property2/image1.jpg',
            'is_primary' => true, // Đánh dấu ảnh này là chính
        ]);

        PropertyImage::create([
            'property_id' => $property2->id,
            'image_path' => 'storage/images/property2/image2.jpg',
            'is_primary' => false, // Ảnh phụ
        ]);

        PropertyImage::create([
            'property_id' => $property2->id,
            'image_path' => 'storage/images/property2/image3.jpg',
            'is_primary' => false, // Ảnh phụ
        ]);

        // Tạo bất động sản thứ ba
        $property3 = Property::create([
            'project_id' => 3, // Giả sử dự án có ID = 3
            'type_id' => 3, // Loại bất động sản có ID = 3
            'name' => 'Cozy Apartment in the Suburbs',
            'area' => 100, // Diện tích 100 m²
            'frontage' => 8, // Mặt tiền 8m
            'floor_1_area' => 50, // Diện tích sàn tầng 1
            'price' => 2000000000, // Giá 2 tỷ
            'bedrooms' => 2,
            'bathrooms' => 1,
            'parking' => 1, // Có 1 chỗ đậu xe
            'description' => 'A cozy 2-bedroom apartment located in the quiet suburbs, perfect for families.',
            'status' => 'rented',
            'unit_code' => 'APT-003', // Mã căn cho bất động sản
        ]);

        // Thêm ảnh cho bất động sản thứ ba
        PropertyImage::create([
            'property_id' => $property3->id,
            'image_path' => 'storage/images/property3/image1.jpg',
            'is_primary' => true, // Đánh dấu ảnh này là chính
        ]);

        PropertyImage::create([
            'property_id' => $property3->id,
            'image_path' => 'storage/images/property3/image2.jpg',
            'is_primary' => false, // Ảnh phụ
        ]);

        PropertyImage::create([
            'property_id' => $property3->id,
            'image_path' => 'storage/images/property3/image3.jpg',
            'is_primary' => false, // Ảnh phụ
        ]);
    }
}
