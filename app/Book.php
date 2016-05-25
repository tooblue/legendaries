<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;
    protected $table = 'book';
    protected $appends = ['type','attribute','img'];

    public function getTypeAttribute()
    {
        return $this->type()->first();
    }

    public function getAttributeAttribute()
    {
        return $this->attribute()->first();
    }

    public function getImgAttribute()
    {
        return '/img/heroes/' . str_slug($this->name) . '.png';
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

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

    public function heroes()
    {
        return $this->hasMany('App\Hero');
    }
}
