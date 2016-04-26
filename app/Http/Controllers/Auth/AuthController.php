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
            ->with(['scope' => 'bot', 'permissions' => '0x0020808'])
            ->redirect();
    }

    /**
     * Obtain the user information from Discord.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {

        $discord = new Discord('MTc0NjE0MTQ5Mjk5NTY4NjQw.CgFmsQ.lLD3xkeQXYgZ9gBQiS231bFDCoc');
        $ws = new WebSocket($discord);

        $ws->on('ready', function ($discord) use ($ws) {
            // Here we will find the guild.
            $guild = $discord->guilds->first();
            // And now the user to change.
            $member = $guild->members->first();
            // And the role to remove.
            $role = $member->roles->first();

            echo "{$member->username} has {$role->name}.";
        });
        // Now we will run the ReactPHP Event Loop!
        $ws->run();


        die();


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
