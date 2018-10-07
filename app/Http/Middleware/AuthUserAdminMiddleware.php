<?php

namespace App\Http\Middleware;

use Closure;
use App\Shop\Entity\User;

class AuthUserAdminMiddleware
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
            $User = User::findOrFail($user_id);

            if($User->type == 'A'){
                $is_allow_acess = true;
            }
        }

        if(!$is_allow_acess){
            return redirect()->to('/');
        }
        return $next($request);
    }
}
