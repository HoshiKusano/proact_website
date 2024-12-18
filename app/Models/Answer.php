<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function question()   
    {
        return $this->belongsTo(Question::class);  
    }
    
    protected $fillable = ['body', 'question_id', 'user_id'];
}

