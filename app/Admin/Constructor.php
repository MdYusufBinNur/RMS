<?php

namespace App\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Constructor extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function report(){
        return $this->hasMany(Report::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function task(){
        return $this->hasMany(Task::class);
    }
}
