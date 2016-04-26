<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Socialite;

class User extends Authenticatable
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
