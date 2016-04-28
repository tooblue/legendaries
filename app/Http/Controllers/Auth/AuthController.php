<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Discord\Discord;
use Discord\WebSockets\WebSocket;

use Auth;
use Socialite;

class AuthController extends Controller
{

    protected $redirectTo = '/';

    /**
     * Redirect the user to the Discord authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::with('discord')
            ->with(['scope' => 'identify guilds'])
            ->redirect();
    }

    /**
     * Obtain the user information from Discord.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {

        $discord = Socialite::with('discord');
        $code = $discord->getCode();

        // if an auth token does not exist, fetch and save it to the session
        if ( !$request->session()->has('discord_token') )
            $request->session()->put('discord_token', $discord->getAccessToken($code));

        // get the Discord user guild object
        $user = $discord->api($request->session()->get('discord_token'))
            ->get('users/@me/guilds')
            ->getBody();

        // get the Discord user object
        $user = $discord->api($request->session()->get('discord_token'))
            ->get('users/@me')
            ->getBody();

        $user = json_decode($user);

        // check if user is a valid guild member
        if (Auth::attempt(['discord_id' => $user->id])) {
            return redirect()->intended('dashboard');
        }
        else {
            return redirect('/');
        }
    }
}
