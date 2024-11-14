<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;
use App\Models\Answer;
use App\Models\CategoryList;
use Illuminate\Support\Facades\Auth;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Question $question, Request $request)
    {
        $searchText = $request->input("search_text");
        if($searchText){
            $spaceConversion = mb_convert_kana($searchText, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);//半角と全角の区別をなくす
            $query = Question::query(); //検索したいモデル
            
            foreach($wordArraySearched as $word){
            $query->where('title', 'like', '%' . $word . '%')
            ->orwhere('body', 'like', '%' . $word . '%');
            }
            $Questions = $query
                    ->withCount('answer')  // 回答数をカウント
                    ->withExists('answer as has_reply')  // 回答の有無を確認
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(10);
            
            
        }else{
            $Questions = $question->getPaginateByLimit();
        }
        return view('questions.index')->with(['questions' => $Questions]);
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
        return redirect('/questions');
        
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question, Answer $answer)
    {
        return view('questions.show')->with([
            'question' => $question,
            'answers'  => $question->answer
            
            ]);
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
