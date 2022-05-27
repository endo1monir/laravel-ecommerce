<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadesRoute;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $routeName=FacadesRoute::getFacadeRoot()->current()->uri();
        ddd($routeName);
        $rout=explode('/',$routeName);
        $roleRoutes=Role::distinct()->whereNotNull('allowed_route')->pluck('allowed_route')->toArray();
        if(auth()->check()):
        else:
        endif;
        return $next($request);
    }
}
