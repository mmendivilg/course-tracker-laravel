<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Abilities
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $model, $action)
    {
        $company_id = $request->header('Company');
        $user = Auth::user();

        if ($user) {
            if (!$user->tokenCan("$company_id:$model:$action")) {
                return response(["message" => __('auth.unauthenticated')], 403);
                
            }
        }

        return $next($request);
    }
}
