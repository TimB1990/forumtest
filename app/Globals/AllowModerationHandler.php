<?php

namespace App\Globals;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class AllowModerationHandler {

    protected $user;
    protected $model;

    public function __construct(User $user, Model $model){
        $this->user = $user;
        $this->model = $model;
    }

    public function check(){
        if($this->user->role == 'admin') return true;

        $moderators = $this->model->forum->moderators;

        if($this->user->role == 'moderator' && count($moderators) > 0 ){

            $moderators->first(function($mod){
                return $mod->id == $this->user->id && $mod->forum_id == $this->model->forum_id;
            });
        }
        return false;
    } 
}