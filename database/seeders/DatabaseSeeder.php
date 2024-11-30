<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Gọi các Seeder
        $this->call([
            UserSeeder::class,
            ProjectSeeder::class,
            PropertyTypeSeeder::class,
            PropertySeeder::class,
            PropertyImageSeeder::class,
            NewsSeeder::class,
            ContactSeeder::class,
        ]); 
        Project::factory()->count(10)->create();
    }
}
