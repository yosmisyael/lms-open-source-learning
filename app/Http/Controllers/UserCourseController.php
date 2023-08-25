<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Questions;
use App\Models\Rating;
use App\Models\Test;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\Console\Question\Question;

class UserCourseController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $uncompleted_course_ids = UserCourse::where('user_id', $user->id)->where('is_completed', 0)->pluck('course_id');
        
        $completed_course_ids = UserCourse::where('user_id', $user->id)->where('is_completed', 1)->pluck('course_id');

        $uncompleted_courses = [];

        $completed_courses = [];

        foreach ($uncompleted_course_ids as $id) {
            $course = Course::find($id);
            if ($course) {
                $uncompleted_courses[] = $course;
            }
        }

        foreach ($completed_course_ids as $id) {
            $course = Course::find($id);
            if ($course) {
                $completed_courses[] = $course;
            }
        }

        return view('dashboard.user.courses', [
            'uncompleted_courses' => $uncompleted_courses,
            'completed_courses' => $completed_courses
        ]);
    }
    
    public function show($username, $course_id)
    {
        $course = Course::find($course_id);

        $lessons = Lesson::where('course_id', $course_id)->get();

        $test = Test::find($course->test_id);

        $user_course = UserCourse::where('user_id', auth()->user()->id)->where('course_id', $course_id)->first();

        $is_rated = Rating::where('user_id', auth()->user()->id)->where('course_id', $course_id)->first();

        return view('dashboard.user.course.index', [
            'data' => $course,
            'lessons' => $lessons,
            'test' => $test,
            'user_course' => $user_course,
            'is_rated' => $is_rated ? true : false
        ]);
    }

    public function showLesson($username, $course_id, $lesson_id)
    {
        $lessons = Course::where('id', $course_id)->get();

        return view('dashboard.user.course.lesson', [
            'data' => Lesson::find($lesson_id),
            'total_lessons' => count($lessons),
            'course_id' => $course_id 
        ]);
    }

    public function test($username, $course_id, $test_id)
    {
        $questions = Questions::where('test_id', $test_id)->get();
        
        $test = Test::find($test_id);

        $user_course = UserCourse::where('user_id', auth()->user()->id)->where('course_id', $course_id)->first();

        $is_pass = $user_course->is_completed == 0 ? false : true;

        return view('dashboard.user.course.test', [
            'data' => $questions,
            'test' => $test,
            'course_id' => $course_id,
            'is_pass' => $is_pass
        ]);
    }
    
    public function grade(Request $request, $username, $course_id, $test_id)
    {
        $test = Test::find($test_id);

        $test_name = $test->name;

        $min_score = $test->min_score;

        $submited_answers = $request->answers;

        $correct_answers = Questions::where('test_id', $test_id)->pluck('answer')->toArray();

        $questions_total = count($correct_answers);

        $result = $questions_total;

        $point = is_float(100 / $questions_total) ? number_format(100 / $questions_total, 2) : 100 / $questions_total;

        foreach ($submited_answers as $index => $submited_answer) {
            if (!in_array($submited_answer, $correct_answers)) {
                $result -= 1;
            }
        }

        $score = is_float($result * $point) ? round($result * $point) : $result * $point;

        $result_status = $score >= $min_score ? 'Congratulations! You have successfully passed the test.' : 'You have failed the test. Please review your answers and retake the test.';

        $user = User::where('username', $username)->first();

        $user_course = UserCourse::where('course_id', $course_id)->where('user_id', $user->id)->first();

        if ($score >= $min_score && $user_course->is_completed != 1) {
            $user_course = UserCourse::where('user_id', auth()->user()->id)->where('course_id', $course_id)->update([
                'is_completed' => 1,
                'score' => $score
            ]);
        }

        return view('dashboard.user.course.review', compact('submited_answers', 'correct_answers', 'test_name', 'username', 'course_id', 'result_status', 'score', 'point'));
    }
}
