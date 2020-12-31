<?php

namespace App\Models;

use App\Models\Forum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function forums(){
        return $this->hasMany(Forum::class);
    }
}
