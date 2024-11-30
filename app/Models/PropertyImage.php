<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id', 'image_path', 'is_primary',
    ];

    // Quan hệ N-1: Mỗi hình ảnh thuộc về một bất động sản
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
