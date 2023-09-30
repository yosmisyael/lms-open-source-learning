<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $data = Course::withCount('users')->where('is_published', 1)->latest()->filter(request(['search']))->paginate(6)->withQueryString();

        foreach ($data as $course) {
            $course->rating = $course->rate();
            $course->rating_users_count = $course->ratings()->count();
        }

        return view('courses', compact('data'));
    }

    public function show($id)
    {
        try {
            $course = Course::where('is_published', 1)->find($id);

            $course_ratings = $course->ratings->filter(function ($rating) {
                return $rating->pivot->rating >= 4;
            })->take(3);

            $data = $course;

            return view('course', compact('data', 'course_ratings'));   
        } catch (ModelNotFoundException $e) {
            return view('error');
        }
             
    }
}
