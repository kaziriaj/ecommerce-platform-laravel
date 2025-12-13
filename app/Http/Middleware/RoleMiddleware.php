<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // $user = Auth::guard('admin')->user();

        // if(!$user || $user->role->name !== $role){
        //     abort(403, 'Unauthorized');
        // }

        // Not logged in

        if (!Auth::guard('admin')->check()){
            return redirect('/admin/login');
        }

        // Role mismatch
        $userRole = trim(strtolower(Auth::guard('admin')->user()->role->name));
        $expectedRole = trim(strtolower($role));

        if ($userRole !== $expectedRole){
            dd('Role Mismatch', $userRole, $expectedRole);
        }
        // if(!Auth::guard('admin')->user()->role->name !== $role){
        //    // abort(403, 'Unauthorized');

        //    dd('Role mismatch', Auth::guard('admin')->user()->role->name, $role);
        // }


        return $next($request);
    }
}
