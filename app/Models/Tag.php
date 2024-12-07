<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    // Quan hệ với bảng news
    public function news()
    {
        return $this->belongsToMany(News::class, 'news_tag');
    }

    public function newsTags()
{
    return $this->hasMany(NewsTag::class); // Liên kết đến Model trung gian
}
}
