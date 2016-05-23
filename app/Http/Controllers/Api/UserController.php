<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use Auth;

class UserHeroController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return response()->json( $this->$user::all() );
    }

    public function show($id)
    {
        return response()->json( $this->user::find($id) );
    }

    public function heroes()
    {
        return response()->json( $this->$user::heroes() );
    }

}
