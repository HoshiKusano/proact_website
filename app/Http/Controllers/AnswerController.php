<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth; 

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Question $question) //特殊
    {
        return view('answers.create')->with(['question' => $question]);
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request, Question $question)
    {   
        $answer = new Answer();
        $answer->body = $request->input('answer.body');
        $answer->question_id = $question->id;
        $answer->user_id = Auth::id();
        $answer->save();
        
        return redirect()->route('questions.show', $question);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
