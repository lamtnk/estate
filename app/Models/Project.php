<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'description',
        'start_date',
        'end_date',
        'handover_date',
        'status',
        'content',
    ];

    // Quan hệ 1-N: Một dự án có thể có nhiều bất động sản
    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class, 'project_id');
    }

    // Lấy ảnh chính (ví dụ ảnh bìa)
    public function primaryImage()
    {
        return $this->hasOne(ProjectImage::class, 'project_id')->where('is_primary', true);
    }
}
