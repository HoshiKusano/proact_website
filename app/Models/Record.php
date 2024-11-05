<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    public function detail()   
    {
        return $this->hasMany(Detail::class);  
    }
    
    public function user()   
    {
        return $this->belongsTo(User::class);  
    }
}
