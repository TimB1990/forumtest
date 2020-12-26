<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Taggables extends Migration
{

    public function up()
    {
        Schema::create('taggables', function (Blueprint $table) {
            $table->morphs('taggable');
        });
    }

    public function down()
    {
        //
    }
}
