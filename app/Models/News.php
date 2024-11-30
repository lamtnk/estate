<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'author_id', 'published_at',
    ];

    // Quan hệ N-1: Mỗi bài viết được viết bởi một người dùng
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
