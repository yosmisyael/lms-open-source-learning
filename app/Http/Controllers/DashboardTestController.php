<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Questions;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.admin.tests', [
            'data' => Test::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.admin.tests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'min_score' => ['required', 'integer', 'min:0','max:100'],
        ]);

        Test::create($validatedData);

        return redirect('/admin/dashboard/tests')->with('success', 'New test has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test): View
    {
        $data = $test;

        $questions = Questions::where('test_id', $test->id)->get();

        return view('dashboard.admin.tests.show', compact('data', 'questions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test): View
    {
        return view('dashboard.admin.tests.edit', [
            'data' => $test
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Test $test)
    {
        $rules = [];
     
        if ($request->name != $test->name) {
            $rules['name'] = ['required', 'unique:tests'];
        }
        
        if ($request->min_score != $test->min_score) {
            $rules['min_score'] = ['required', 'integer', 'min:0', 'max:100'];
        }

        $validatedData = $request->validate($rules);
        
        Test::where('id', $test->id)->update($validatedData);

        return redirect('/admin/dashboard/tests')->with('success', 'Test has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        $coursesReferencingTest = Course::where('test_id', $test->id)->count();

        if ($coursesReferencingTest === 0) {
            Test::destroy($test->id);
            return redirect('/admin/dashboard/tests')->with('success', 'Test has been deleted.');
        }

        return back()->with('error', 'Test cannot be deleted as it is referenced by one or more courses.');
    }
}
