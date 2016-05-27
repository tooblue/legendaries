<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Hero;

use Auth;

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
        $hero = Hero::find($id);

        if ( $hero->user_id == Auth::user()->id ) {
            $hero->lvl = $request->lvl;
            $hero->powerup_lvl = $request->powerup_lvl;
            $hero->grade = $request->grade;
            $hero->atk = $request->atk;
            $hero->def = $request->def;
            $hero->hp = $request->hp;
            $hero->spd = $request->spd;
            $hero->cr = $request->cr;
            $hero->cd = $request->cd;
            $hero->pen = $request->pen;
            $hero->acc = $request->acc;
            $hero->eva = $request->eva;
            $hero->save();

            return response()->json( $this->heroes::with('book','tags')->find($hero->id) );
        }
        else {
            abort(403);
        }
    }

    public function destroy($id)
    {
        $hero = Hero::find($id);

        if ( $hero->user_id == Auth::user()->id ) {
            $hero->delete();
            return response()->json( true );
        }
        else {
            abort(403);
        }
    }

}
