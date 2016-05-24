<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\UserHero;

use Auth;

class UserHeroController extends Controller
{
    protected $heroes;
    protected $users;

    public function __construct(UserHero $heroes, User $users)
    {
        $this->heroes = $heroes;
        $this->users = $users;
    }

    public function all()
    {
        return response()->json( $this->heroes::all() );
    }

    public function index($user)
    {
        return response()->json( $this->users::find($user)->heroes()->with('hero')->get() );
    }

    public function show($user, $hero)
    {
        return response()->json( $this->heroes::with('hero')->find($hero));
    }

    public function store(Request $request, $user)
    {
        if ( $user == Auth::user()->id ) {
            $hero = $this->users::find($user)
                ->heroes()
                ->create(['hero_id' => $request->hero_id]);

            return response()->json( $hero->load('hero') );
        }
        else {
            abort(403);
        }
    }
}
