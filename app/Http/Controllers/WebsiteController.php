<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\TrainingCategory;

class WebsiteController extends Controller
{
    /**
     * Homepage – show courses grouped by title
     */
    public function index()
    {
        // Fetch only active courses
        $courses = Course::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->groupBy('title'); // 👈 IMPORTANT: group same courses (Beginner/Intermediate)

        $categories = TrainingCategory::with('images')->get();

        return view('index', compact('courses', 'categories'));
    }

    /**
     * Course detail page
     */
    public function show(Course $course)
    {
        // Prevent inactive course access
        abort_if(!$course->is_active, 404);

        // Load only active topics
        $course->load([
            'topics' => function ($q) {
                $q->where('is_active', 1)
                  ->orderBy('sort_order');
            }
        ]);

        return view('show', compact('course'));
    }

    /**
     * Switch course level from detail page
     * (Beginner → Intermediate → Advanced)
     */
    public function switchLevel(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'level' => 'required|string',
        ]);

        $course = Course::where('title', $request->title)
            ->where('level', $request->level)
            ->where('is_active', 1)
            ->first();

        if (!$course) {
            return response()->json([
                'found' => false,
                'message' => 'No course available right now for this level'
            ]);
        }

        return response()->json([
            'found' => true,
            'url' => route('show', $course->id)
        ]);
    }
}
