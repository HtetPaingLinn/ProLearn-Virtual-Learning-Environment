<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function universityCourses()
    {
        $courses = Course::whereBetween('major_id', [4, 21])->get();
        $active = 'university';
        return view('dashboard', compact('courses', 'active'));
    }

    public function extraordinaryCourses()
    {
        $courses = Course::whereBetween('major_id', [1, 3])->get();
        $active = 'extraordinary';
        return view('dashboard', compact('courses', 'active'));
    }
}
