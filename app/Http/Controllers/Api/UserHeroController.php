<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UserHero;

use Auth;

class UserHeroController extends Controller
{
    protected $heroes;

    public function __construct(UserHero $heroes)
    {
        $this->heroes = $heroes;
    }

    public function index()
    {
        return response()->json( $this->heroes::all() );
    }

    public function show($id)
    {
        return response()->json( $this->heroes::find($id) );
    }

    public function store(Request $request)
    {
        $userHero = new UserHero;
        $userHero->user_id = Auth::user()->id;
        $userHero->hero_id = $request->hero_id;
        $userHero->save();

        return response()->json($userHero);
    }
}
