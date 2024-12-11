<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_code',
        'project_id',
        'type_id',
        'name',
        'area',
        'frontage',
        'floor_1_area',
        'price',
        'price_type',
        'deal_type',
        'number_of_floors',
        'bedrooms',
        'bathrooms',
        'parking',
        'description',
        'content',
        'status',
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

    public function images()
    {
        return $this->hasMany(PropertyImage::class, 'property_id');
    }

    // Lấy ảnh chính (ví dụ ảnh bìa)
    public function primaryImage()
    {
        return $this->hasOne(PropertyImage::class, 'property_id')->where('is_primary', true);
    }
}
