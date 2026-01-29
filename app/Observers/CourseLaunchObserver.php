<?php
namespace App\Observers;

use App\Models\CourseLaunch;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\FreeCourseLaunchMail;

class CourseLaunchObserver
{
    public function created(CourseLaunch $launch)
    {
        $course = $launch->course;

        // ✅ Safety check (only FREE courses)
        if ($course->price != 0) {
            return;
        }

        // ✅ Send to all subscribers
        $subscribers = Subscriber::pluck('email');

        foreach ($subscribers as $email) {
            Mail::to($email)->send(
    new FreeCourseLaunchMail($course, $launch->launch_date)
);
        }
    }
}