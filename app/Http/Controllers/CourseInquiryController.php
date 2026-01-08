<?php

namespace App\Http\Controllers;

use App\Models\CourseInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CourseInquiryController extends Controller
{
    /* =========================
       ADMIN: LIST
    ========================== */
    public function index()
    {
        $inquiries = CourseInquiry::latest()->paginate(20);
        return view('admin.course-inquiries.index', compact('inquiries'));
    }

    /* =========================
       ADMIN: VIEW (AJAX MODAL)
    ========================== */
    public function show(CourseInquiry $courseInquiry)
    {
        if (!$courseInquiry->is_viewed) {
            $courseInquiry->update(['is_viewed' => true]);
        }

        return response()->json([
            'id' => $courseInquiry->id,
            'course_title' => $courseInquiry->course_title,
            'name' => $courseInquiry->name,
            'email' => $courseInquiry->email,
            'phone' => $courseInquiry->phone,
            'message' => $courseInquiry->message,
        ]);
    }

    /* =========================
       ADMIN: REPLY
    ========================== */
    public function reply(Request $request, CourseInquiry $courseInquiry)
    {
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        Mail::raw($request->reply_message, function ($mail) use ($courseInquiry) {
            $mail->to($courseInquiry->email)
                 ->subject('Reply regarding ' . $courseInquiry->course_title);
        });

        $courseInquiry->update([
            'reply_status' => 'replied',
        ]);

        return redirect()
            ->route('admin.course-inquiries.index')
            ->with('success', 'Reply sent successfully.');
    }
     public function store(Request $request)
    {
        $request->validate([
            'course_title' => 'required|string',
            'name'         => 'required|string|max:255',
            'email'        => 'required|email',
            'message'      => 'required|string',
        ]);

        CourseInquiry::create($request->all());

        return back()->with('success', 'Your inquiry has been submitted. We will contact you soon.');
    }
}
