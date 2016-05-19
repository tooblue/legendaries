<?php

namespace App\Http\Controllers;

use Auth;
use App\Guild;

class DashboardController extends Controller
{

    protected $guild;
    protected $member;

    public function __construct(Guild $guild)
    {
        $this->guild = $guild;
        $this->member = $this->guild->member(Auth::user()->discord_id);
    }

    public function index()
    {
        $session = [
            'user' => [
                'app' => Auth::user(),
                'discord' => $this->member
            ],
            'userAvatar' => 'https://cdn.discordapp.com/avatars/' . Auth::user()->discord_id . '/' . $this->member->user->avatar . '.jpg',
            'roles' => $this->guild->roles()
        ];

        return view('app', ['session' => $session]);
    }
}
