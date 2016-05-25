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
        return response()->json( $this->heroes::with('book')->get() );
    }

    public function show($id)
    {
        return response()->json( $this->heroes::with('book','tags')->find($id) );
    }

}
