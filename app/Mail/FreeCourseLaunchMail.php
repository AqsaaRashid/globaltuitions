<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FreeCourseLaunchMail extends Mailable
{
    use SerializesModels;

    public $course;
    public $launchDate;

    public function __construct($course, $launchDate)
    {
        $this->course = $course;
        $this->launchDate = $launchDate;
    }

    public function build()
    {
        return $this
            ->subject('🎉 New FREE Course Launching!')
            ->view('emails.free-course-launch');
    }
}