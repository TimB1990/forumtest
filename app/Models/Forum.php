<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Thread;
use App\Models\Moderator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Forum extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function threads(){
        return $this->hasMany(Thread::class);
    }

    public function moderators(){
        return $this->hasMany(Moderator::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}