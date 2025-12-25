<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string', // ✅ NEW
            'image'       => 'required|image|mimes:png,jpg,jpeg,webp',
            'level'       => 'nullable|string|max:100',
            'duration'    => 'nullable|string|max:100',
            'price'       => 'nullable|numeric',
            'skills'      => 'nullable|string',
            'sort_order'  => 'required|integer',
        ]);

        // Upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Course::create([
            'title'       => $request->title,
            'description' => $request->description, // ✅ NEW
            'image'       => $imageName,
            'level'       => $request->level,
            'duration'    => $request->duration,
            'price'       => $request->price,
            'skills'      => $request->skills,
            'sort_order'  => $request->sort_order,
            'is_active'   => $request->has('is_active'),
        ]);

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Course added successfully');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string', // ✅ NEW
            'image'       => 'nullable|image|mimes:png,jpg,jpeg,webp',
            'level'       => 'nullable|string|max:100',
            'duration'    => 'nullable|string|max:100',
            'price'       => 'nullable|numeric',
            'skills'      => 'nullable|string',
            'sort_order'  => 'required|integer',
        ]);

        $imageName = $course->image;

        if ($request->hasFile('image')) {
            $oldPath = public_path('images/' . $course->image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $course->update([
            'title'       => $request->title,
            'description' => $request->description, // ✅ NEW
            'image'       => $imageName,
            'level'       => $request->level,
            'duration'    => $request->duration,
            'price'       => $request->price,
            'skills'      => $request->skills,
            'sort_order'  => $request->sort_order,
            'is_active'   => $request->has('is_active'),
        ]);

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Course updated successfully');
    }

    public function destroy(Course $course)
    {
        $imagePath = public_path('images/' . $course->image);
        if ($course->image && file_exists($imagePath)) {
            unlink($imagePath);
        }

        $course->delete();

        return back()->with('success', 'Course deleted successfully');
    }
}
