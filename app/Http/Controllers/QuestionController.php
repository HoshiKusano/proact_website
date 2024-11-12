<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;
use App\Models\CategoryList;
use Illuminate\Support\Facades\Auth;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('questions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        return view('questions.create')->with(['categories' => $category->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request, Question $question )
    {   
        $user = Auth::id();
        $input = $request['question'];
        $input += ['user_id' => $user];
        $question->fill($input)->save();
        
        $categories = $request['categories'];
        foreach($categories as $category){
             $categoryList = new CategoryList;
             $categoryInput = [
                 'question_id' => $question->id,
                 'category_id' => $category,  
                 ];
             $categoryList->fill($categoryInput)->save();
        }
        dd($categories);
        return redirect('/posts/' . $post->id);
        
        
        
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
