<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/CourseInquiry.php
class CourseInquiry extends Model
{
    protected $fillable = [
        'course_title',
         'course_id',
    'launch_id',
        'name',
        'email',
        'phone',
        'message',
        'level',
    'launch_date',
        'is_viewed',
        'reply_status',
    ];
     public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

