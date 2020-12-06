<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * Get the phone record associated with the user.
     */
    public function hdds()
    {
        return $this->hasMany('App\Hdd');
    }

    /**
     * Get the phone record associated with the user.
     */
    public function getHddCountAttribute()
    {
        return $this->hdds()->count();
    }
}
