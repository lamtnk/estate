<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;

class NewsSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            // Tạo 3 tin tức cho mỗi người dùng
            for ($i = 1; $i <= 3; $i++) {
                News::create([
                    'title' => 'Tin tức số ' . $i,
                    'content' => 'Nội dung tin tức số ' . $i,
                    'author_id' => $user->id,
                    'image' => 'path/to/image' . $i . '.jpg',
                    'project_id' => 1,
                    'published_at' => now(),
                ]);
            }
        }
    }
}
