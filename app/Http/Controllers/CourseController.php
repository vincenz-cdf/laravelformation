<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() 
    {
        $courses = Course::all();
        return Inertia::render('Index', [
            'courses' => $courses
        ]);
    }
}