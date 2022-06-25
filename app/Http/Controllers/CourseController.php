<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index() 
    {
        $courses = Course::with('user')
        ->select('courses.*', DB::raw(
            '(SELECT COUNT(DISTINCT(user_id))
            FROM completions C, videos V
            WHERE C.video_id = V.id
            AND courses.id = V.course_id
            ) AS participants'
        ))
        ->withCount('videos')->latest()->get();

        return Inertia::render('Courses/Index', [
            'courses' => $courses
        ]);
    }

    public function show(int $id) {
        $course = Course::where('id',$id)->with('videos')->first();
        $watched = auth()->user()->videos;

        return Inertia::render('Courses/Show', [
            'course' => $course,
            'watched' => $watched
        ]);
    }

    public function toggleProgress(Request $request) {
        $id = $request->input('videoId');
        $user = auth()->user();

        $user->videos()->toggle($id);
        return $user->videos;
    }
}