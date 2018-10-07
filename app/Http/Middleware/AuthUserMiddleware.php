<?php

namespace App\Http\Middleware;

use Closure;

class AuthUserMiddleware
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
        $is_allow_acess = false;
        $user_id = session()->get('user_id');
        if(!is_null($user_id)){
            $is_allow_acess = true;
        }

        if(!$is_allow_acess){
            return redirect()->to('/user/auth/sign-in');
        }
        return $next($request);
    }
}
