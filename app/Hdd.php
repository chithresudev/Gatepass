<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hdd extends Model
{
    /**
      * Get the user that owns the project.
      */
     public function project()
     {
         return $this->belongsTo('App\project');
     }

    /**
      * Get the Dit that HDD the project.
      */
     public function dits()
     {
         return $this->hasMany('App\Dit');
     }
}
