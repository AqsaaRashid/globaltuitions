<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',   // ✅ NEW (course description)
        'image',
        'level',
        'duration',
        'price',
        'skills',
        'sort_order',
        'is_active',
    ];

    public function topics()
    {
        return $this->hasMany(CourseTopic::class);
    }
}
