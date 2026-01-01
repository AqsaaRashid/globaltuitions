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
}
