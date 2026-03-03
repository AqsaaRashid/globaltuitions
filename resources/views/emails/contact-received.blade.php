@extends('emails.layout')

@section('title', 'Message Received – Imperial Tuitions')

@section('preheader')
We've received your message. Our team will contact you shortly.
@endsection

@section('header_title', 'Message Received')
@section('header_subtitle', 'Thank you for reaching out — we'll be in touch shortly.')

@section('body')
<p>Dear <strong>{{ $contact->name }}</strong>,</p>

<p>Thank you for contacting <strong>Imperial Tuitions</strong>. We have successfully received your message and appreciate the opportunity to assist you.</p>

<div class="email-message-box">
  <div class="email-message-label">Your Message</div>
  <div class="email-message-content">{{ $contact->message }}</div>
</div>

<p>Our team will review your message and will contact you shortly. If your inquiry is related to a specific course, feel free to reply to this email with the course name and any additional information.</p>

<p>Thank you for your interest in <strong>Imperial Tuitions</strong>. We look forward to supporting you.</p>

<div class="email-signature">
  <div class="email-signature-line1">Kind regards,</div>
  <div class="email-signature-line2">Imperial Tuitions</div>
  <div class="email-signature-line3">Training &amp; Support Team</div>
</div>
@endsection

@section('footer_note')
This is an automated confirmation that we received your message. If you did not request this, you may ignore this email.
@endsection
