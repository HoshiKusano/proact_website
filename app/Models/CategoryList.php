<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryList extends Model
{
    use HasFactory;
    protected $table = 'category_lists';
    
     protected $fillable = [
    'question_id',
    'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
