<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'location', 'description', 'start_date', 'end_date', 'status',
    ];

    // Quan hệ 1-N: Một dự án có thể có nhiều bất động sản
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
