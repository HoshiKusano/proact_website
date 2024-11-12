<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'title',
    'body',
    'user_id',
    
    ];
    public function categoryList()   
    {
        return $this->hasMany(CategoryList::class);  
    }
    
    public function answer()   
    {
        return $this->hasMany(Answer::class);  
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
