<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Guild;

use Auth;
use Socialite;

class AuthController extends Controller
{

    protected $redirectTo = '/';
    protected $guild;
    protected $discord;

    public function __construct(Guild $guild)
    {
        $this->guild = $guild;
        $this->discord = Socialite::with('discord');
    }

    /**
     * Redirect the user to the Discord authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return $this->discord
            ->with(['scope' => 'identify'])
            ->redirect();
    }

    /**
     * Obtain the user information from Discord.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        $token = $this->discord->getAccessToken($this->discord->getCode());

        // get the Discord user object
        $discordUser = $this->discord->api($token)
            ->get('users/@me')
            ->getBody();
        $discordUser = json_decode($discordUser);

        if ( $this->guild->isApprovedMember($discordUser->id) ) {
            $user = User::firstOrCreate(['discord_id' => $discordUser->id]); // create the user if they dont exist
            Auth::login($user);
            return redirect()->intended(route('app::dashboard'));
        }
        else {
            return redirect(route('splash'))
                ->with('status', 'Sorry, this area is for guild members only! If you were recently added to the guild, please wait for a GM to approve your account.');
        }
    }

    /**
     * Destroy the authenticated user session
     *
     * @return Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect(route('splash'));
    }
}
