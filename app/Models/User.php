<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Thread;
use App\Models\Moderator;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function moderator(){
        return $this->belongsTo(Moderator::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function threads(){
        return $this->hasMany(Thread::class);
    }
}
