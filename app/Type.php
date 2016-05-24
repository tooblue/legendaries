<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function heroes()
    {
        return $this->hasMany('App\Hero');
    }
}
