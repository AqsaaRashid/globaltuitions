<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLaunch;
use Illuminate\Http\Request;

class CourseLaunchController extends Controller
{
    public function index()
    {
        $launches = CourseLaunch::with('course')
            ->orderBy('launch_date', 'desc')
            ->get();

        return view('admin.course-launches.index', compact('launches'));
    }

    public function create()
    {
        $courses = Course::orderBy('title')->get();
        return view('admin.course-launches.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id'   => 'required|exists:courses,id',
            'launch_date' => 'required|date',
        ]);

        CourseLaunch::create([
            'course_id'   => $request->course_id,
            'launch_date' => $request->launch_date,
        ]);

        return redirect()
            ->route('admin.course-launches.index')
            ->with('success', 'Launch date added successfully.');
    }

    public function edit(CourseLaunch $courseLaunch)
    {
        $courses = Course::orderBy('title')->get();
        return view('admin.course-launches.edit', compact('courseLaunch', 'courses'));
    }

    public function update(Request $request, CourseLaunch $courseLaunch)
    {
        $request->validate([
            'course_id'   => 'required|exists:courses,id',
            'launch_date' => 'required|date',
        ]);

        $courseLaunch->update([
            'course_id'   => $request->course_id,
            'launch_date' => $request->launch_date,
        ]);

        return redirect()
            ->route('admin.course-launches.index')
            ->with('success', 'Launch date updated.');
    }

    public function destroy(CourseLaunch $courseLaunch)
    {
        $courseLaunch->delete();

        return back()->with('success', 'Launch date deleted.');
    }
}
