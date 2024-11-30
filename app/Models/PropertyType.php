<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Quan hệ 1-N: Một loại bất động sản có thể có nhiều bất động sản
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
