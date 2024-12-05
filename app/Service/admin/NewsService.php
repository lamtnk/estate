<?php

namespace App\Service\admin;

use App\Models\News;
use App\Models\Project;
use Illuminate\Http\Request;

class NewsService
{
    public function getAll()
    {
        // Lấy tất cả các dự án với các trường cần thiết
        return News::all(); // Lấy toàn bộ dữ liệu từ bảng projects
    }

    public function storeNews($title, $content, $author_id, $published_at, $image, $project_id)
    {
        News::create([
            'title' => $title,
            'content' => $content,
            'author_id' => $author_id,
            'published_at' => $published_at,
            'image' => $image,
            'project_id' => $project_id,
        ]);
    }

    public function getNewsById($id)
    {
        return News::find($id);
    }

    public function updateNews($id, $title, $content, $author_id, $published_at, $image, $project_id)
    {
        $news = News::find($id);
        $news->title = $title;
        $news->content = $content;
        $news->author_id = $author_id;
        $news->published_at = $published_at;
        $news->image = $image;
        $news->project_id = $project_id;
        $news->save();
    }

    public function deleteNews($id)
    {
        News::destroy($id);
    }
}
