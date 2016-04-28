<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Discord\Discord;
use Discord\WebSockets\WebSocket;

use Auth;
use Socialite;

class BotAuthController extends Controller
{

    protected $redirectTo = '/';

    /**
     * Redirect the user to the Discord authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::with('discordbot')
            ->with(['scope' => 'bot'])
            ->redirect();
    }

    /**
     * Obtain the user information from Discord.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        echo 'success';
    }
}
