<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/CourseInquiry.php
class CourseInquiry extends Model
{
    protected $fillable = [
        'course_title',
        'name',
        'email',
        'phone',
        'message',
        'level',
    'launch_date',
        'is_viewed',
        'reply_status',
    ];
}

