<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquiryReceivedMail extends Mailable
{
    use SerializesModels;

    public $inquiry;

    public function __construct($inquiry)
    {
        $this->inquiry = $inquiry;
    }

    public function build()
    {
        return $this->subject('Inquiry Received – Imperial Tuitions')
                    ->view('emails.inquiry-received');
    }
}