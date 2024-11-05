<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryList extends Model
{
    use HasFactory;
    protected $table = 'category_lists';
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
