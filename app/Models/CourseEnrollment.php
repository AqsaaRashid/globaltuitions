<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseEnrollment extends Model
{
    protected $fillable = [
        'course_name',
         'launch_date',
        'name',
        'email',
        'phone',
        'registration_type', // 👈 ADD THIS
        'preferred_date',
        'preferred_time',
        'message',
        'status',
    ];
}
