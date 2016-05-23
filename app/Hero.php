<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }

    public function traits()
    {
        return $this->belongsToMany('App\Trait');
    }

    public function userHeroes()
    {
        return $this->hasMany('App\UserHero');
    }
}
