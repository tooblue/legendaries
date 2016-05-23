<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trait extends Model
{
    public function heroes()
    {
        return $this->belongsToMany('App\Hero');
    }
}
