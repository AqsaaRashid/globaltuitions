<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseEnrollment extends Model
{
    protected $fillable = [
        'course_name',
         'launch_date',
         'course_id',
    'launch_id',
        'name',
        'email',
        'phone',
         'level',
        'registration_type', // 👈 ADD THIS
        'preferred_date',
        'preferred_time',
        'message',
        'status',
    ];
    public function course()
{
    return $this->belongsTo(Course::class);
}

}
