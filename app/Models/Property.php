<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id', 'type_id', 'name', 'area', 'price', 'bedrooms', 'bathrooms', 'description', 'status',
    ];

    // Quan hệ N-1: Mỗi bất động sản thuộc về một dự án
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Quan hệ N-1: Mỗi bất động sản thuộc về một loại bất động sản
    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'type_id');
    }

    // Quan hệ 1-N: Mỗi bất động sản có thể có nhiều hình ảnh
    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }
}
