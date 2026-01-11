<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Enrollment Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f9fafb; padding:20px;">

    <div style="max-width:600px; margin:0 auto; background:#ffffff; padding:30px; border-radius:8px; border:1px solid #e5e7eb;">

        <h2 style="color:#09515D; margin-bottom:10px;">
            Enrollment Confirmed
        </h2>

        <p style="font-size:14px; color:#374151;">
            Dear {{ $enrollment->name }},
        </p>

        <p style="font-size:14px; color:#374151;">
            Thank you for registering for the following professional training program with
            <strong>BTMG USA</strong>:
        </p>

        <ul style="font-size:14px; color:#374151; line-height:1.6;">
            <li><strong>Course:</strong> {{ $enrollment->course_name }}</li>

            @if($enrollment->level)
                <li><strong>Level:</strong> {{ ucfirst($enrollment->level) }}</li>
            @endif

            @if($enrollment->launch_date)
                <li>
                    <strong>Start Date:</strong>
                    {{ \Carbon\Carbon::parse($enrollment->launch_date)->format('d M Y') }}
                </li>
            @endif
        </ul>

        <p style="font-size:14px; color:#374151;">
            Our training coordinator will contact you shortly with further details regarding
            schedule, payment, and onboarding.
        </p>

       

        <p style="margin-top:20px; font-size:14px; color:#374151;">
            Kind regards,<br>
            <strong>BTMG USA Training Team</strong><br>
            <span style="color:#6b7280;">Professional & Corporate Training</span>
        </p>

    </div>

</body>
</html>
