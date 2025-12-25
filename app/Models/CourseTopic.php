<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTopic extends Model
{
    protected $fillable = [
        'course_id','title','description','sort_order','is_active'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
