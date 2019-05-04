<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        switch (user_type()) {
            case 'admin':
                if(Auth::guard(user_type())->check()){
                    return redirect()->route('admin.index');
                }
                break;

            case 'user':
                if(Auth::guard(user_type())->check()){
                    return redirect()->route('user.index');
                }
                break;

            case 'associate':
                if(Auth::guard(user_type())->check()){
                    return redirect()->route('associate.index');
                }
                break;
            
            default:
                if (Auth::guard(user_type())->check()) {
                    return redirect()->route('home');
                }
                break;
        }
        

        return $next($request);
    }
}
