<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Forum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Thread extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function forum(){
        return $this->belongsTo(Forum::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
