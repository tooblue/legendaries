<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Hero;

class HeroController extends Controller
{
    protected $heroes;

    public function __construct(Hero $heroes)
    {
        $this->heroes = $heroes;
    }

    public function index()
    {
        return response()->json( $this->heroes::with('book','tags','user')->get() );
    }

    public function show($id)
    {
        return response()->json( $this->heroes::with('book','tags','user')->find($id) );
    }

    public function update(Request $request, $id)
    {
        $hero = Hero::with('user')->find($id);

        if ( $hero->user->id == Auth::user()->id ) {
            $hero->lvl = $request->lvl;
            $hero->atk = $request->atk;
            $hero->def = $request->def;
            $hero->hp = $request->hp;
            $hero->spd = $request->spd;
            $hero->cr = $request->cr;
            $hero->save();

            return response()->json( $this->heroes::with('book','tags')->find($hero->id) );
        }
        else {
            abort(403);
        }
    }

}
