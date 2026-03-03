@extends('emails.layout')

@section('title', 'Registration Received – Imperial Tuitions')

@section('preheader')
We've received your registration. Our team will contact you shortly to confirm schedule and payment.
@endsection

@section('header_title', 'Registration Received')
@section('header_subtitle', 'Thank you for your interest — we'll be in touch shortly.')

@section('body')
<p>Dear <strong>{{ $enrollment->name }}</strong>,</p>

<p>Thank you for contacting <strong>Imperial Tuitions</strong> and for your interest in one of our professional training programs.
We have successfully received your registration and appreciate the opportunity to assist you.</p>

<div class="email-details-box">
  <div class="email-details-label">Course Details</div>
  <table role="presentation" width="100%" class="email-details-table">
    <tr>
      <td class="email-details-key email-stack" style="width: 140px; padding: 6px 0; color:#64748b; font-size: 14px;">Course</td>
      <td class="email-details-val email-stack" style="padding: 6px 0; color:#0f172a; font-size: 14px; font-weight: 600;">{{ $enrollment->course_name }}</td>
    </tr>
    <tr>
      <td class="email-details-key email-stack" style="width: 140px; padding: 6px 0; color:#64748b; font-size: 14px;">Level</td>
      <td class="email-details-val email-stack" style="padding: 6px 0; color:#0f172a; font-size: 14px; font-weight: 600;">{{ $enrollment->level ? ucfirst($enrollment->level) : '—' }}</td>
    </tr>
  </table>
</div>

<p>Our team will review your registration and will contact you shortly to confirm availability, schedule, and payment details.</p>

<p>Thank you for your interest in learning with <strong>Imperial Tuitions</strong>. We look forward to supporting you in your <strong>professional development journey</strong>.</p>

<div class="email-signature">
  <div class="email-signature-line1">Kind regards,</div>
  <div class="email-signature-line2">Imperial Tuitions</div>
  <div class="email-signature-line3">Training &amp; Support Team</div>
</div>
@endsection

@section('footer_note')
This is an automated confirmation that we received your registration. If you did not request this, you may ignore this message.
@endsection
