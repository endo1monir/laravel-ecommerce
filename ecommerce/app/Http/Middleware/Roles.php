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
        // ddd($routeName);
        $rout=explode('/',$routeName);
        $roleRoutes=Role::distinct()->whereNotNull('allowed_route')->pluck('allowed_route')->toArray();
        if(auth()->check()):
            if(!in_array($rout[0],$roleRoutes)):
                return $next($request);
            else:
                    if($rout[0] != auth()->user()->roles[0]->allowed_route):
                        $path=$rout[0]==auth()->user()->roles[0]->allowed_route? $rout[0].'.login':auth()->user()->roles[0]->allowed_route.'.index';
                        return redirect()->route($path);
                    else:
                        return $next($request);
                    endif;
            endif;
        else:
            $routeDestination=in_array($rout[0],$roleRoutes)?$rout[0].'.login':'login';
            $path=$rout[0]!=''?$routeDestination:auth()->user()->roles[0]->allowed_route.'.index';
            return redirect()->route($path);
        endif;
        return $next($request);
    }
}
