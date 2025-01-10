<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check the user role
            $user = Auth::user();

            // If the user does not have the required role
            if ($user->role !== $role) {
                return redirect('/'); // Redirect them to home or an appropriate page
            }

            // If the user has the correct role, allow the request to proceed
            return $next($request);
        }

        // If the user is not authenticated, redirect to login
        return redirect()->route('login');
    }
}
