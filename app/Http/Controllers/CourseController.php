<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() 
    {
        $courses = Course::with('user')->withCount('videos')->get();

        return Inertia::render('Courses/Index', [
            'courses' => $courses
        ]);
    }

    public function show(int $id) {
        $course = Course::where('id',$id)->with('videos')->first();

        return Inertia::render('Courses/Show', [
            'course' => $course
        ]);
    }
}