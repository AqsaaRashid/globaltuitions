<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\CourseEnrollmentConfirmation;

use App\Models\CourseEnrollment;
use Illuminate\Http\Request;

class CourseEnrollmentController extends Controller
{
   public function store(Request $request)
{
    $request->validate([
        'course_name' => 'required|string',
        'name'        => 'required|string|max:255',
        'email'       => 'required|email',
        'phone'       => 'nullable|string|max:20',
        'message'     => 'nullable|string',
        'launch_date' => 'nullable|date',
        'level'       => 'nullable|string|max:50',
    ]);

    $enrollment = CourseEnrollment::create($request->all());

    // ✅ SEND CONFIRMATION EMAIL
    Mail::to($enrollment->email)
        ->send(new CourseEnrollmentConfirmation($enrollment));

    return back()->with('success', 'Enrollment submitted successfully!');
}


    public function index()
    {
        $enrollments = CourseEnrollment::latest()->get();
        return view('admin.course-enrollments.index', compact('enrollments'));
    }



public function approve(CourseEnrollment $enrollment)
{
    $enrollment->update(['status' => 'approved']);

   Mail::raw(
    "Dear {$enrollment->name},\n\n" .
    "We’re pleased to inform you that your enrollment has been approved.\n\n" .
    "Here are your training details:\n" .
    "Course: {$enrollment->course_name}\n" .
    ($enrollment->level ? "Level: {$enrollment->level}\n" : "") .
    ($enrollment->launch_date
        ? "Start Date: " . \Carbon\Carbon::parse($enrollment->launch_date)->format('d M Y') . "\n"
        : ""
    ) .
    "\nOur team will contact you shortly with further information regarding schedule, access, and payment.\n\n" .
    "If you have any questions in the meantime, feel free to reply to this email.\n\n" .
    "Warm regards,\n" .
    "BTMG USA Training Team",
    function ($mail) use ($enrollment) {
        $mail->to($enrollment->email)
             ->subject('Enrollment Approved – BTMG USA Training');
    }
);


    return back()->with('success', 'Enrollment approved.');
}

public function reject(CourseEnrollment $enrollment)
{
    $enrollment->update(['status' => 'rejected']);

    Mail::raw(
    "Dear {$enrollment->name},\n\n" .
    "Thank you for your interest in the {$enrollment->course_name} training program.\n\n" .
    "After reviewing your registration, we regret to inform you that we are unable to proceed with your enrollment for this particular session at this time.\n\n" .
    ($enrollment->launch_date
        ? "Training Session Date: " . \Carbon\Carbon::parse($enrollment->launch_date)->format('d M Y') . "\n\n"
        : ""
    ) .
    "This decision may be due to limited seat availability, scheduling constraints, or eligibility requirements for the selected batch.\n\n" .
    "We truly appreciate your interest in BTMG USA Training and encourage you to explore upcoming sessions or reach out to us if you would like guidance on alternative training options.\n\n" .
    "If you have any questions or would like further clarification, please feel free to reply to this email.\n\n" .
    "Kind regards,\n" .
    "BTMG USA Training Team",
    function ($mail) use ($enrollment) {
        $mail->to($enrollment->email)
             ->subject('Enrollment Update – BTMG USA Training');
    }
);


    return back()->with('success', 'Enrollment rejected.');
}

public function reply(Request $request, CourseEnrollment $enrollment)
{
    $request->validate([
        'reply_message' => 'required|string',
    ]);

   Mail::raw(
    "Dear {$enrollment->name},\n\n" .
    $request->reply_message . "\n\n" .
    "If you need any further assistance regarding your enrollment for " .
    "{$enrollment->course_name}, please feel free to reply to this email.\n\n" .
    "Kind regards,\n" .
    "BTMG USA Training Team",
    function ($mail) use ($enrollment) {
        $mail->to($enrollment->email)
             ->subject('BTMG USA Training – Enrollment Update');
    }
);


    return back()->with('success', 'Reply sent successfully.');
}
// show
public function show(CourseEnrollment $enrollment)
{
    return response()->json([
        'id' => $enrollment->id,
        'course_name' => $enrollment->course_name,
        'name' => $enrollment->name,
        'email' => $enrollment->email,
        'phone' => $enrollment->phone,
        'message' => $enrollment->message,
        'status' => $enrollment->status,
        'launch_date' => $enrollment->launch_date,
        'level' => $enrollment->level,
        'created_at' => $enrollment->created_at->format('d M Y'),
    ]);
}
public function destroy(CourseEnrollment $enrollment)
{
    $enrollment->delete();

    return back()->with('success', 'Enrollment deleted successfully.');
}



}
