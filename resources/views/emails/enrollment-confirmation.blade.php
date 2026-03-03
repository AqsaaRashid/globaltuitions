@extends('emails.layout')

@section('title')
Enrollment Confirmation – Imperial Tuitions
@endsection

@section('preheader')
Your enrollment has been successfully received.
@endsection

@section('header_title')
Enrollment Submitted
@endsection

@section('header_subtitle')
Thank you for enrolling — our team will contact you shortly.
@endsection

@section('body')

<p>Dear <strong>{{ $enrollment->name }}</strong>,</p>

<p>
Thank you for enrolling in <strong>Imperial Tuitions</strong>.
We have successfully received your registration and our training coordinator will contact you soon with scheduling and payment details.
</p>

<div class="email-details-box">
  <div class="email-details-label">Enrollment Details</div>

  <table role="presentation" width="100%" class="email-details-table">

    <tr>
      <td class="email-details-key email-stack">Course</td>
      <td class="email-details-val email-stack">
        {{ $enrollment->course_name }}
      </td>
    </tr>

    @if($enrollment->level)
    <tr>
      <td class="email-details-key email-stack">Level</td>
      <td class="email-details-val email-stack">
        {{ ucfirst($enrollment->level) }}
      </td>
    </tr>
    @endif

    @if($enrollment->preferred_date)
    <tr>
      <td class="email-details-key email-stack">Preferred Date</td>
      <td class="email-details-val email-stack">
        {{ \Carbon\Carbon::parse($enrollment->preferred_date)->format('F d, Y') }}
      </td>
    </tr>
    @endif

    @if($enrollment->preferred_time)
    <tr>
      <td class="email-details-key email-stack">Preferred Time</td>
      <td class="email-details-val email-stack">
        {{ \Carbon\Carbon::parse($enrollment->preferred_time)->format('h:i A') }}
      </td>
    </tr>
    @endif

  </table>
</div>

@if($enrollment->message)
<div class="email-message-box">
  <div class="email-message-label">Your Message</div>
  <div class="email-message-content">
    {{ $enrollment->message }}
  </div>
</div>
@endif

<p>
Our team will review your enrollment and contact you within 24 hours.
</p>

<p>
We look forward to supporting you in your <strong>professional development journey</strong>.
</p>

<div class="email-signature">
  <div class="email-signature-line1">Kind regards,</div>
  <div class="email-signature-line2">Imperial Tuitions</div>
  <div class="email-signature-line3">Training &amp; Support Team</div>
</div>

@endsection

@section('footer_note')
This is an automated confirmation that your enrollment was received. 
If you did not request this, you may ignore this message.
@endsection