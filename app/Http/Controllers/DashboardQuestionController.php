<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Illuminate\Http\Request;

class DashboardQuestionController extends Controller
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
    public function create($test_id)
    {
        return view('dashboard.admin.questions.create', compact('test_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $test_id)
    {
        $rules = [
            'test_id' => 'required',
            'content' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'answer' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Questions::create($validatedData);

        return redirect('/admin/dashboard/tests/'.$test_id)->with('success', "Question has been added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Questions $questions, $test_id, $question_id)
    {
        $question = Questions::find($question_id);

        return view('dashboard.admin.questions.show', [
            'data' => $question
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questions $questions, $test_id, $question_id)
    {
        return view('dashboard.admin.questions.edit', [
            'data' => $questions->find($question_id),
            'test_id' => $test_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $test_id, $question_id)
    {
        $test_id = $request->test_id;
        
        $questions = Questions::where('id', $question_id)->get()[0];

        $rules = [
            'test_id' => 'required'
        ];

        if ($request->content != $questions['content']) {
            $rules['content'] = ['required'];
        }
        if ($request->option1 != $questions['option1']) {
            $rules['option1'] = ['required'];
        }
        if ($request->option2 != $questions['option2']) {
            $rules['option2'] = ['required'];
        }
        if ($request->option3 != $questions['option3']) {
            $rules['option3'] = ['required'];
        }
        if ($request->option4 != $questions['option4']) {
            $rules['option4'] = ['required'];
        }
        if ($request->answer != $questions['answer']) {
            $rules['answer'] = ['required'];
        }

        $validatedData = $request->validate($rules);

        Questions::where('id', $question_id)->update($validatedData);

        return redirect('/admin/dashboard/tests/'.$test_id)->with('success', "Question has been updatad!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($test_id, $question_id)
    {
        Questions::destroy($question_id);

        return redirect('/admin/dashboard/tests/'.$test_id)->with('success', 'Question has been deleted.');
    }
}
