<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if (!$user || ($user->type !== 'superadmin' && $user->type !== 'super admin' && $user->type !== 'company')) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        return $next($request);
    }
}