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
        'date',
        'time',
        'purpose',
        'visit_type',
        'request_type',
    ];

    public function getFormattedDatetimeAttribute()
    {
        if ($this->date && $this->time) {
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->date . ' ' . $this->time)
                ->format('d/m/Y - H:i');
        }

        return null;
    }

    // Quan hệ N-1: Mỗi yêu cầu liên hệ thuộc về một bất động sản
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
