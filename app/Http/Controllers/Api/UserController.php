<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use Auth;

class UserController extends Controller
{
    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        return response()->json( $this->users::all() );
    }

    public function show($id)
    {
        return response()->json( $this->users::find($id) );
    }

}
