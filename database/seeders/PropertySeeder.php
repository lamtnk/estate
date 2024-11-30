<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\Project;
use App\Models\PropertyType;

class PropertySeeder extends Seeder
{
    public function run()
    {
        $projects = Project::all();
        $propertyTypes = PropertyType::all();

        foreach ($projects as $project) {
            foreach ($propertyTypes as $propertyType) {
                // Tạo 5 bất động sản cho mỗi dự án và loại bất động sản
                Property::create([
                    'project_id' => $project->id,
                    'type_id' => $propertyType->id,
                    'name' => 'Bất động sản ' . $propertyType->name . ' ' . $project->name,
                    'area' => rand(50, 300),
                    'price' => rand(1000000000, 10000000000),
                    'bedrooms' => rand(1, 5),
                    'bathrooms' => rand(1, 5),
                    'description' => 'Mô tả chi tiết về bất động sản...',
                    'status' => 'available',
                ]);
            }
        }
    }
}
