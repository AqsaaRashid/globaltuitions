<?php

namespace App\Http\Controllers\Admin;
use App\Models\Course;

use App\Http\Controllers\Controller;
use App\Models\CourseEnrollment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEnrollments = CourseEnrollment::count();

        $totalActiveCourses = Course::where('is_active', 1)->count();

        return view('dashboard', compact(
            'totalEnrollments',
            'totalActiveCourses'
        ));
    }
}
