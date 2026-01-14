<?php

// app/Models/CourseLaunch.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseLaunch extends Model
{
    protected $fillable = [
        'course_id',
        'launch_date',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    // app/Models/CourseLaunch.php
public function enrollments()
{
    return $this->hasMany(
        \App\Models\CourseEnrollment::class,
        'launch_id'
    );
}

public function inquiries()
{
    return $this->hasMany(
        \App\Models\CourseInquiry::class,
        'launch_id'
    );
}


}
