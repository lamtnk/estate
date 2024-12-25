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
        'furniture',
        'direction',
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

    // Chuyển nội thất sang tiếng việt
    public function getFurnitureVnAttribute()
    {
        $furnitureMapping = [
            'Bare Shell' => 'Bàn giao thô',
            'Basic Furnished' => 'Nội thất cơ bản',
            'Fully Furnished' => 'Nội thất đầy đủ',
            'Luxury Furnished' => 'Nội thất cao cấp'
        ];

        return $furnitureMapping[$this->furniture] ?? $this->furniture;
    }

    // Chuyển tên phương hướng sang tiếng việt
    public function getDirectionVnAttribute()
    {
        $directionMapping = [
            'East' => 'Đông',
            'West' => 'Tây',
            'South' => 'Nam',
            'North' => 'Bắc',
            'Southeast' => 'Đông Nam',
            'Northeast' => 'Đông Bắc',
            'Southwest' => 'Tây Nam',
            'Northwest' => 'Tây Bắc'
        ];

        return $directionMapping[$this->direction] ?? $this->direction;
    }

    // Accessor để định dạng giá (tỷ, triệu, nghìn) khi truy cập vào thuộc tính `price_formatted`
    public function getPriceFormattedAttribute()
    {
        $price = $this->price; // Giá của bất động sản

        if ($price >= 1_000_000_000) {
            return number_format($price / 1_000_000_000, 1, ',', '.') . ' tỷ';
        } elseif ($price >= 1_000_000) {
            return number_format($price / 1_000_000, 1, ',', '.') . ' triệu';
        } elseif ($price >= 1_000) {
            return number_format($price / 1_000, 1, ',', '.') . ' nghìn';
        }
        return number_format($price, 0, ',', '.');
    }
}
