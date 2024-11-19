<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToppageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\RecordController;

 

Route::middleware('auth')->group(function () {
    Route::middleware('undergraduate')->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/unauthorized', function () {return view('errors.unauthorized');})->name('unauthorized');
    Route::delete('/posts/{post}', [PostController::class,'delete']);
    Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
    Route::put('/posts/{post}', [PostController::class, 'update']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/create', [PostController::class, 'create']);
    Route::get('/posts/{post}', [PostController::class ,'show']);
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/', [ToppageController::class, 'index'])->name('toppage');
    Route::get('/vision', [ToppageController::class, 'vision']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


 
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::delete('/questions/{question}', [QuestionController::class,'delete']);
    Route::post('/questions', [QuestionController::class, 'store']);
    
    Route::get('/questions/{question}/edit', [QuestionController::class, 'edit']);
    Route::put('/questions/{question}', [QuestionController::class, 'update']);

   
    Route::post('/questions/{question}/answer', [AnswerController::class, 'store']);
    Route::get('/questions/{question}/answer/create', [AnswerController::class, 'create'])->name('answers.create'); 
    
    Route::get('/questions', [QuestionController::class, 'index'])->name('questions');
    Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('questions.show');
    
    Route::get('/records', [RecordController::class, 'index'])->name('record'); 
});

});

    

require __DIR__.'/auth.php';
