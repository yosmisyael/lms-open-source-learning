<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseEnrollmentController extends Controller
{
    public function enroll(Request $request, $course_id)
    {
        $user = Auth::user();

        if (!$request->user() || !$request->user()->hasRole('student')) {
            return redirect()->route('login')
                ->with('warning', 'Please login to enroll in a course!');
        }
        
        $isEnrolled = UserCourse::where('user_id', $user->id)->where('course_id', $course_id)->first();

        if ($isEnrolled) {
            return redirect('/users/'.$user->username.'/dashboard/courses/'.$course_id);
        }

        UserCourse::create([
            'user_id' => $user->id,
            'course_id' => $course_id,
        ]);

        return redirect('/users/'.$user->username.'/dashboard/courses/'.$course_id);
    }
}
