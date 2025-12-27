<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classname extends Model
{
   public function subjects(){
      return $this->belongsToMany(Subject::class, "classsubjects", "classname_id", "subject_id");
   }

}
