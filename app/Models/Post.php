<?php

namespace App\Models;

use App\Models\User;
use App\Models\Forum;
use App\Models\Thread;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function thread(){
        return $this->belongsTo(Thread::class);
    }

    public function forum(){
        return $this->belongsTo(Forum::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
