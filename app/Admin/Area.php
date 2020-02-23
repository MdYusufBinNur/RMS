<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $guarded = [];

    public function report(){
        return $this->hasMany(Report::class);
    }

    public function task(){
        return $this->hasMany(Task::class);
    }
}
