<?php

namespace App\Http\Middleware\Staff;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StaffMiddleware
{
    /**
     * handle user has role staff.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        if (in_array(Auth::user()->role, [UserRole::ADMIN, UserRole::STORE, UserRole::STAFF])) {
            return $next($request);
        }

        return redirect()->route('error-forbidden');
    }
}
