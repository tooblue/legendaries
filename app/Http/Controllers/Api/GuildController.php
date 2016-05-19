<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Guild;

class GuildController extends Controller
{

    protected $guild;

    public function __construct(Guild $guild)
    {
        $this->guild = $guild;
    }

    public function index()
    {
        return response()->json($this->guild->get());
    }

    public function member($id)
    {
        return response()->json($this->guild->member($id));
    }

    public function members()
    {
        return response()->json($this->guild->members());
    }
}
