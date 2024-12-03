<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsTag extends Model
{
    use HasFactory;

    protected $table = 'news_tag'; // Tên bảng trung gian

    protected $fillable = [
        'news_id',
        'tag_id',
    ];

    // Liên kết đến bảng news
    public function news()
    {
        return $this->belongsTo(News::class);
    }

    // Liên kết đến bảng tags
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
