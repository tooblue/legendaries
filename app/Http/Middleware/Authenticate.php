<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\Guild;

class Authenticate
{

    protected $guild;

    public function __construct(Guild $guild)
    {
        $this->guild = $guild;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if the user is not authenticated
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest(route('login'));
            }
        }

        // if the user is authenticated, but not a guild member (ie. they were deleted)
        if ( !$this->guild->member(Auth::user()->discord_id) ) {
            Auth::logout();
            return redirect(route('splash'));
        }

        return $next($request);
    }
}
