<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dit extends Model
{
    /**
     * Get the cards record associated with the user.
     */
    public function cards()
    {
        return $this->hasMany('App\Card');
    }

    /**
     * Get the clips record associated with the user.
     */
    public function clips()
    {
        return $this->hasMany('App\Clip');
    }

    /**
     * Get the clips record associated with the user.
     */
    public function hdd()
    {
        return $this->belongsTo('App\Hdd');
    }
}
