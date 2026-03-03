@extends('emails.layout')

@section('title')
Inquiry Received – Imperial Tuitions
@endsection

@section('preheader')
We've received your inquiry. Our team will contact you shortly with further information.
@endsection

@section('header_title')
Inquiry Received
@endsection

@section('header_subtitle')
Thank you for reaching out — we'll be in touch shortly.
@endsection

@section('body')

<p>Dear <strong>{{ $inquiry->name }}</strong>,</p>

<p>
Thank you for contacting <strong>Imperial Tuitions</strong> and for your interest in one of our professional training programs.
We have successfully received your inquiry and appreciate the opportunity to assist you.
</p>

<div class="email-details-box">
  <div class="email-details-label">Course Details</div>

  <table role="presentation" width="100%" class="email-details-table">
    <tr>
      <td class="email-details-key email-stack">
        Course
      </td>
      <td class="email-details-val email-stack">
        {{ $inquiry->course_title }}
      </td>
    </tr>

    <tr>
      <td class="email-details-key email-stack">
        Level
      </td>
      <td class="email-details-val email-stack">
        {{ $inquiry->level ? ucfirst($inquiry->level) : '—' }}
      </td>
    </tr>
  </table>
</div>

<div class="email-message-box">
  <div class="email-message-label">Your Inquiry</div>

  <div class="email-message-content">
    {{ $inquiry->message }}
  </div>
</div>

<p>
Our team will review your inquiry and contact you shortly with further information.
</p>

<p>
Thank you for your interest in learning with <strong>Imperial Tuitions</strong>. 
We look forward to supporting you in your <strong>professional development journey</strong>.
</p>

<div class="email-signature">
  <div class="email-signature-line1">Kind regards,</div>
  <div class="email-signature-line2">Imperial Tuitions</div>
  <div class="email-signature-line3">Training &amp; Support Team</div>
</div>

@endsection

@section('footer_note')
This is an automated confirmation that we received your inquiry. 
If you did not request this, you may ignore this message.
@endsection