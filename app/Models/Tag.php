<?php

namespace App\Models;

use App\Models\Forum;
use App\Models\Thread;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function forums(){
        return $this->morphedByMany(Forum::class, 'taggable');
    }

    public function threads(){
        return $this->morphedByMany(Thread::class, 'taggable');
    }
}
