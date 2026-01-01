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
        'training_category_id',
    ];

    public function topics()
    {
        return $this->hasMany(CourseTopic::class);
    }
     public function category()
    {
        return $this->belongsTo(TrainingCategory::class, 'training_category_id');
    }
    // app/Models/Course.php

public function launch()
{
    return $this->hasOne(CourseLaunch::class);
}

}
