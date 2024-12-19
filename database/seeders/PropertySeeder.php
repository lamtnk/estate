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
            'price_type' => 1,
            'deal_type' => 'sell',
            'number_of_floors' => 1,
            'bedrooms' => 4,
            'furniture' => 'Luxury Furnished', // Nội thất cao cấp
            'direction' => 'East', // Nhà hướng đông
            'description' => 'This is a luxurious villa located in the city center with a swimming pool, garden, and security...',
            'status' => 'red book',
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
            'price_type' => 1,
            'deal_type' => 'sell',
            'number_of_floors' => 1,
            'bedrooms' => 2,
            'furniture' => 'Basic Furnished', // Nội thất cơ bản
            'direction' => 'South', // Nhà hướng nam
            'description' => 'This modern apartment is located near the beach, offering stunning sea views and all modern amenities.',
            'status' => 'red book',
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
            'price_type' => 1,
            'deal_type' => 'sell',
            'number_of_floors' => 1,
            'bedrooms' => 2,
            'furniture' => 'Bare Shell', // Bàn giao thôthô
            'direction' => 'North', // Nhà hướng bắc
            'description' => 'A cozy 2-bedroom apartment located in the quiet suburbs, perfect for families.',
            'status' => 'red book',
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
