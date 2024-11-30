<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyImage;
use App\Models\Property;

class PropertyImageSeeder extends Seeder
{
    public function run()
    {
        $properties = Property::all();

        foreach ($properties as $property) {
            // Tạo 5 hình ảnh cho mỗi bất động sản
            for ($i = 1; $i <= 5; $i++) {
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path' => 'images/property' . $property->id . '_image' . $i . '.jpg',
                    'is_primary' => $i == 1 ? true : false, // Chỉ 1 ảnh là ảnh chính
                ]);
            }
        }
    }
}
