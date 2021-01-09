<?php

namespace App\Models;

use App\Models\User;
use App\Models\Forum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Moderator extends Model
{
    use HasFactory, SoftDeletes;

    public function user(){
        return $this->hasOne(User::class);
    }

    public function forum(){
        return $this->hasMany(Forum::class);
    }
}
