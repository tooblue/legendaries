<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SplashController extends Controller
{
    public function index(Request $request)
    {
        return view('splash');
    }
}
