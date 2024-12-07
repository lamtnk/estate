<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author_id',
        'published_at',
        'image',
        'project_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Quan hệ N-1: Mỗi bài viết được viết bởi một người dùng
    public function User()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Quan hệ với bảng projects
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Quan hệ với bảng tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'news_tag');
    }

    public function newsTags()
{
    return $this->hasMany(NewsTag::class); // Liên kết đến Model trung gian
}
}
