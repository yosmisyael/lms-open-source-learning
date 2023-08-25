<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index($username, $course_id)
    {
        $data = Course::find($course_id);

        $user = User::where('username', $username)->first();

        return view('dashboard.user.rating.create', compact('data', 'user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
            'rating' => 'required|int|in:1,2,3,4,5',
            'review' => 'required|string|min:1|max:255'
        ]);

        Rating::create($validatedData);

        return redirect('/users/'.auth()->user()->username.'/dashboard/courses/'.$request->course_id);
    }

    public function edit($username, $course_id)
    {
        $user = User::where('username', $username)->first();

        $data = Rating::where('user_id', $user->id)->where('course_id', $course_id)->first();

        return view('dashboard.user.rating.edit', compact('data', 'user'));
    }

    public function update(Request $request, $username, $course_id)
    {
        $rating = Rating::where('user_id', $request->user_id)->where('course_id', $course_id)->first();

        $rules = [
            'user_id' => 'required',
            'course_id' => 'required',
        ];

        if ($request->rating !== $rating->rating) {
            $rules['rating'] = 'required|int|in:1,2,3,4,5';
        }

        if ($request->review !== $rating->review) {
            $rules['review'] = 'required|string|min:1|max:255';
        }

        $validatedData = $request->validate($rules);

        $rating->update($validatedData);

        return redirect('/users/'.auth()->user()->username.'/dashboard/courses/'.$request->course_id);
    }
}
