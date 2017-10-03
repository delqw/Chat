<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class BroadcastAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (is_null($request->user())) {
            $request->setUserResolver(function () {
                $user = new User([ 'name' => 'Guest' ]);
                $user->id = 0;
                return $user;
            });
        }
        return $next($request);
    }
}
