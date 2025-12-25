<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use App\Models\CourseEnrollment;
use Illuminate\Http\Request;

class CourseEnrollmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'course_name'     => 'required|string',
            'name'            => 'required|string|max:255',
            'email'           => 'required|email',
            'phone'           => 'required|string|max:20',
            'preferred_date'  => 'required|date',
            'preferred_time'  => 'required',
            'message'         => 'nullable|string',
        ]);

        CourseEnrollment::create($request->all());

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
        "Congratulations! Your enrollment for {$enrollment->course_name} has been approved.",
        function ($mail) use ($enrollment) {
            $mail->to($enrollment->email)
                 ->subject('Enrollment Approved');
        }
    );

    return back()->with('success', 'Enrollment approved.');
}

public function reject(CourseEnrollment $enrollment)
{
    $enrollment->update(['status' => 'rejected']);

    Mail::raw(
        "Unfortunately, your enrollment for {$enrollment->course_name} has been rejected.",
        function ($mail) use ($enrollment) {
            $mail->to($enrollment->email)
                 ->subject('Enrollment Rejected');
        }
    );

    return back()->with('success', 'Enrollment rejected.');
}

public function reply(Request $request, CourseEnrollment $enrollment)
{
    $request->validate([
        'reply_message' => 'required|string',
    ]);

    Mail::raw($request->reply_message, function ($mail) use ($enrollment) {
        $mail->to($enrollment->email)
             ->subject('Regarding Your Course Enrollment');
    });

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
        'preferred_date' => $enrollment->preferred_date,
        'preferred_time' => $enrollment->preferred_time,
        'status' => $enrollment->status,
        'created_at' => $enrollment->created_at->format('d M Y'),
    ]);
}


}
