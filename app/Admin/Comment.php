<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function constructor(){
        return $this->belongsTo(Constructor::class);
    }

    public function task(){
        return $this->belongsTo(Task::class);
    }
}
