<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        // Tạo 10 dự án giả
        Project::factory()->count(10)->create();
    }
}
