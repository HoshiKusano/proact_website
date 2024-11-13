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
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function categoryList()   
    {
        return $this->hasMany(CategoryList::class);  
    }
    
     public function categories()   
    {
        return $this->belongsToMany(Category::class, 'category_lists', 'question_id', 'category_id');
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
