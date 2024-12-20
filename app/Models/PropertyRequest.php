<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'name',
        'email',
        'phone',
        'message',
    ];

    // Quan hệ N-1: Mỗi yêu cầu liên hệ thuộc về một bất động sản
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
