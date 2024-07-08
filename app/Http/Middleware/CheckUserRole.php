<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('getLogin')->with('error', 'Unauthorized access. Please log in.');
        }

        if (in_array($user->user_role_id, $roles)) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
