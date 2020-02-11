<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function report(){
        return $this->hasMany(Report::class);
    }
}
