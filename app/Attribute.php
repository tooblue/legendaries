<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $timestamps = false;
    
    public function book()
    {
        return $this->hasMany('App\Book');
    }
}
