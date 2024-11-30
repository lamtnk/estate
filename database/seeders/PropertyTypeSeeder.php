<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyType;

class PropertyTypeSeeder extends Seeder
{
    public function run()
    {
        // Tạo một số loại bất động sản
        PropertyType::create(['name' => 'Nhà đất']);
        PropertyType::create(['name' => 'Căn hộ']);
        PropertyType::create(['name' => 'Biệt thự']);
        PropertyType::create(['name' => 'Shophouse']);
    }
}
