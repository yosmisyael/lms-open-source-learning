<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.courses', [
            'data' => Course::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.courses.create', [
            'tests' => Test::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'total_lessons' => 'required|integer|min:1',
            'level' => 'required|in:beginner,advanced',
            'image' => 'required|file|image|mimes:jpg,png,jpeg,webp|max:1024',
        ]);

        if ($request->test_id) {
            if ($request->test_id === '') {
                $validatedData['test_id'] = null;
            }

            $validatedData['test_id'] = $request->test_id;
        }


        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('course-pictures');
        }

        Course::create($validatedData);

        return redirect('/admin/dashboard/courses')->with('success', 'Course has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('dashboard.admin.courses.show', [
            'data' => $course,
            'lessons' => Lesson::where('course_id', $course->id)->get()
        ]);   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('dashboard.admin.courses.edit', [
            'data' => $course,
            'tests' => Test::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $rules = [];

        if ($request->test_id === '') {
            $rules['test_id'] = null;
        }

        if ($request->test_id !== null && $request->test_id !== $course->test_id) {
            $rules['test_id'] = 'required|max:1';
        }

        if ($request->title !== $course->title) {
            $rules['title'] = 'required|max:255';
        }

        if ($request->total_lessons !== $course->total_lessons) {
            $rules['total_lessons'] = 'required|integer|min:1';
        }

        if ($request->description !== $course->description) {
            $rules['description'] = 'required';
        }

        if ($request->level !== $course->level) {
            $rules['level'] = 'required|in:beginner,advanced';
        }

        if ($request->file('image')) {
            $rules['image'] = 'file|image|mimes:jpg,png,jpeg,webp|max:1024';
        }
        
        $validatedData = $request->validate($rules);
        
        if ($request->file('image')) {
            if ($request->old_image) {
                Storage::delete($request->old_image);
            }

            $validatedData['image'] = $request->file('image')->store('course-pictures');
        }

        $course->update($validatedData);

        return redirect('/admin/dashboard/courses')->with('success', 'Course has been updated!');
    }

    /**
     * Publish course by update the value of is_published field to 1 
     */
    public function publish(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'is_published' => 'required|integer|in:1'
        ]);

        if ($course->is_published == 1) {
            return redirect('/admin/dashboard/courses')->with('warning', 'The course is already published!');
        }

        if ($course->test_id == null) {
            return redirect('/admin/dashboard/courses')->with('danger', 'The course should have a unit test!');
        }        
        
        $lessons_count = $course->lessons()->whereNotNull('order')->count();

        if ($lessons_count !== $course->total_lessons) {
            return redirect('/admin/dashboard/courses')->with('danger', 'The course should have complete lessons!');
        }

        $course->update($validatedData);
    
        return redirect('/admin/dashboard/courses')->with('success', 'The course has been published!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if ($course->image) {
            Storage::delete($course->image);
        }

        $course->delete();
        
        return redirect('/admin/dashboard/courses')->with('success', 'Test has been deleted!');
    }
}
