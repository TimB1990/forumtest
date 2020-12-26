<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function thread(){
        return $this->belongsTo(Thread::class);
    }

    public function forum(){
        return $this->belongsTo(Forum::class);
    }

    // w.i.p.
}
