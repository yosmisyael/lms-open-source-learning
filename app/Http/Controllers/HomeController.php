<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Course::withCount('users')->where('is_published', 1)->get();

        foreach ($data as $course) {
            $course->rating = $course->rate();
            $course->rating_users_count = $course->ratings()->count();
        }

        return view('home', compact('data'));
    }
}
