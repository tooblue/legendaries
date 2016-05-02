<?php

namespace App\Http\Controllers\Discord;

use Illuminate\Http\Request;

use App\Providers\DiscordBot;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class BaseController extends Controller
{
    protected $discordBot;

    public function __construct(DiscordBot $discordBot)
    {
        $this->discordBot = $discordBot;
    }
}
