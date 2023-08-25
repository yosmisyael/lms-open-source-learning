<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class DashboardLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($course_id)
    {
        $total_lessons = Course::where('id', $course_id)->pluck('total_lessons')[0];

        $lessons = range(1, $total_lessons+1);

        $used_order = Lesson::where('course_id', $course_id)->pluck('order');

        $available_order = array_diff($lessons, $used_order->toArray());

        return view('dashboard.admin.lesson.create', compact('course_id', 'total_lessons', 'available_order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_id' => 'required',
            'title' => 'required|min:3|max:255',
            'body' => 'required',
            'order' => 'required'
        ]);

        if ($request->order === '') {
            $validatedData['order'] = null;
        }

        Lesson::create($validatedData);

        return redirect('/admin/dashboard/courses/'.$request->course_id)->with('success', 'Lesson has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show($course_id, $lesson_id)
    {
        $lesson = Lesson::find($lesson_id);

        return view('dashboard.admin.lesson.show', [
            'data' => $lesson,
            'course_id' => $course_id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($course_id, $lesson_id)
    {
        $total_lessons = Course::where('id', $course_id)->pluck('total_lessons')[0];

        $lessons = range(1, $total_lessons+1);

        $used_order = Lesson::where('course_id', $course_id)->pluck('order');

        $available_order = array_diff($lessons, $used_order->toArray());

        return view('dashboard.admin.lesson.edit', [
            'data' => Lesson::find($lesson_id),
            'course_id' => $course_id, 
            'total_lessons' => $total_lessons,
            'available_order' => $available_order
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $course_id, $lesson_id)
    {
        $rules = [
            'course_id' => 'required'
        ];

        $lesson = Lesson::where('id', $lesson_id)->get()[0];

        if ($request->title !== $lesson['title']) {
            $rules['title'] = 'required|min:3|max:255';
        }
        
        if ($request->order !== $lesson['order']) {
            $rules['order'] = 'required';
        }
        
        if ($request->body !== $lesson['body']) {
            $rules['body'] = 'required';
        }

        $validatedData = $request->validate($rules);

        if ($request->order === '') {
            $validatedData['order'] = null;
        }

        Lesson::where('id', $lesson_id)->update($validatedData);

        return redirect('/admin/dashboard/courses/'.$course_id)->with('success', 'Lesson has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($course_id, $lesson_id)
    {
        Lesson::destroy($lesson_id);

        return redirect('/admin/dashboard/courses/'.$course_id)->with('success', 'lesson has been deleted');
    }
}
