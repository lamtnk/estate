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

    public function storeNews($title, $content, $userId, $publishedAt, $imageName, $projectId)
    {
        return News::create([
            'title' => $title,
            'content' => $content,
            'author_id' => $userId,
            'published_at' => $publishedAt,
            'image' => $imageName,
            'project_id' => $projectId,
        ]);
    }


    public function getNewsById($id)
    {
        return News::find($id);
    }

    public function updateNews($id, $title, $content, $authorId, $publishedAt, $imageName, $projectId, array $tags = [])
    {
        $news = News::findOrFail($id);

        // Cập nhật dữ liệu bài viết
        $news->update([
            'title' => $title,
            'content' => $content,
            'user_id' => $authorId,
            'published_at' => $publishedAt,
            'image' => $imageName ?? $news->image, // Giữ ảnh cũ nếu không upload ảnh mới
            'project_id' => $projectId,
        ]);

        // Gắn thẻ liên quan
        if (!empty($tags)) {
            $news->tags()->sync($tags); // Gắn thẻ mới
        } else {
            $news->tags()->detach(); // Xóa tất cả các thẻ nếu không có thẻ nào được chọn
        }

        return $news;
    }


    public function deleteNews($id)
    {
        // Lấy bài viết theo ID
        $news = News::findOrFail($id);

        // Kiểm tra và xóa ảnh nếu tồn tại
        if ($news->image && file_exists(public_path('assets/images/thumb/' . $news->image))) {
            unlink(public_path('assets/images/thumb/' . $news->image));
        }

        // Xóa bài viết
        $news->delete();
    }
}
