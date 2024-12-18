<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    public function question()
    {
        return $this->hasMany(Question::class);
    }
    
    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
    
    public function record()
    {
        return $this->hasMany(Record::class);
    }
    
    public function detail()
    {
        return $this->hasMany(Detail::class);
    }
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'grade',
        'authority',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'authority' => 'boolean',
        'password' => 'hashed',
    ];
    
     /**
     * 学部生かどうかを判定
     *
     * @return bool
     */
    public function isUndergraduate(): bool
    {
        return !$this->authority && in_array($this->grade, ['1', '2', '3', '4']);
    }
}
