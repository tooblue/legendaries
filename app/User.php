<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Guild;

use Socialite;

class User extends Authenticatable
{

    use SoftDeletes;

    protected $fillable = ['discord_id'];
    protected $dates = ['deleted_at'];

    public function heroes()
    {
        return $this->hasMany('App\UserHero');
    }

    /**
     * Stuff so Laravel doesn't try to mess with remember_token
     */

     public function getRememberToken()
     {
         return '';
     }

     public function setRememberToken($value)
     {
     }

     public function getRememberTokenName()
     {
         // just anything that's not actually on the model
         return 'trash_attribute';
     }

     public function setTrashAttributeAttribute($value)
     {
     }

}
