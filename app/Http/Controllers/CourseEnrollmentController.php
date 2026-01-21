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
        'course_id'   => 'required|exists:courses,id',
        // 'launch_id'   => 'nullable|exists:course_launches,id',

        'course_name' => 'required|string',
        'name'        => 'required|string|max:255',
        'email'       => 'required|email',
        'phone'       => 'nullable|string|max:20',
        'message'     => 'nullable|string',
        // 'launch_date' => 'nullable|date',
        'level'       => 'nullable|string|max:50',
            // ✅ NEW
    'preferred_date' => 'nullable|date',
    'preferred_time' => 'nullable|date_format:H:i',
    ]);

  $enrollment = CourseEnrollment::create([
    'course_id'   => $request->course_id,
    'course_name' => $request->course_name,

    'name'        => $request->name,
    'email'       => $request->email,
    'phone'       => $request->phone,
    'message'     => $request->message,

    'level'       => $request->level,

    // ✅ NEW
    'preferred_date' => $request->preferred_date,
    'preferred_time' => $request->preferred_time,
]);


    // SEND EMAIL
    Mail::to($enrollment->email)
        ->send(new CourseEnrollmentConfirmation($enrollment));

    return back()->with([
        'popup_success' => true,
        'popup_title'   => 'Enrollment Submitted',
        'popup_message' => 'Thank you for enrolling. A GLOBAL TUITIONS coordinator will contact you shortly.'
    ]);
}

public function byLaunch($launchId)
{
    $enrollments = CourseEnrollment::where('launch_id', $launchId)
        ->latest()
        ->get();

    return view('admin.course-enrollments.index', compact('enrollments'));
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
    "GLOBAL TUITIONS Training Team",
    function ($mail) use ($enrollment) {
        $mail->to($enrollment->email)
             ->subject('Enrollment Approved – GLOBAL TUITIONS Training');
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
    "We truly appreciate your interest in GLOBAL TUITIONS Training and encourage you to explore upcoming sessions or reach out to us if you would like guidance on alternative training options.\n\n" .
    "If you have any questions or would like further clarification, please feel free to reply to this email.\n\n" .
    "Kind regards,\n" .
    "GLOBAL TUITIONS Training Team",
    function ($mail) use ($enrollment) {
        $mail->to($enrollment->email)
             ->subject('Enrollment Update – GLOBAL TUITIONS Training');
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
    "GLOBAL TUITIONS Training Team",
    function ($mail) use ($enrollment) {
        $mail->to($enrollment->email)
             ->subject('GLOBAL TUITIONS Training – Enrollment Update');
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
    'level' => $enrollment->level,

    // ✅ NEW
    'preferred_date' => $enrollment->preferred_date,
    'preferred_time' => $enrollment->preferred_time,

    'created_at' => $enrollment->created_at->format('d M Y'),
]);

}
public function destroy(CourseEnrollment $enrollment)
{
    $enrollment->delete();

    return back()->with('success', 'Enrollment deleted successfully.');
}



}
