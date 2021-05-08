<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;


class AdminMiddelware
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
        if(Auth::User() == true )
        {
            if(Auth::User()->email_verified_at != null)
            {
               return $next($request);
        }
            else
            {
                return redirect(route('verify.index'))->with('message_fales', 'check your email' );
            }
        }
        else
        {
            Auth::logout();

        }
    }
}
