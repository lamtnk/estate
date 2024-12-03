<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            'Kinh doanh',
            'Công nghệ',
            'Bất động sản',
            'Tin tức',
            'Sức khỏe',
            'Giáo dục',
            'Thể thao',
            'Giải trí',
        ];

        foreach ($tags as $tagName) {
            Tag::create(['name' => $tagName]);
        }
    }
}
