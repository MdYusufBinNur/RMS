<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
     protected $guarded = [];

     public function constructor(){
         return $this->belongsTo(Constructor::class);
     }

     public function area(){
         return $this->belongsTo(Area::class);
     }

     public function task(){
         return $this->belongsTo(Task::class);
     }
}
