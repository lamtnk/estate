<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Tag;
use App\Models\NewsTag;

class NewsTagSeeder extends Seeder
{
    public function run()
    {
        $newsItems = News::all();
        $tags = Tag::all();

        foreach ($newsItems as $news) {
            // Chọn ngẫu nhiên từ 1 đến 3 thẻ cho mỗi bài viết
            $randomTags = $tags->random(rand(1, 3));

            foreach ($randomTags as $tag) {
                NewsTag::create([
                    'news_id' => $news->id,
                    'tag_id' => $tag->id,
                ]);
            }
        }
    }
}
