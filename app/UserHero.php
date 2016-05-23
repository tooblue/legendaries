<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHero extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function hero()
    {
        return $this->belongsTo('App\Hero');
    }
}
