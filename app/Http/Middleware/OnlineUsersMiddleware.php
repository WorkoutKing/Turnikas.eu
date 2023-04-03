<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OnlineUser;

class OnlineUsersMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            $onlineUser = OnlineUser::where('name', $user->name)->first();

            if (!$onlineUser) {
                $onlineUser = new OnlineUser;
                $onlineUser->name = $user->name;
                $onlineUser->ip_address = request()->ip();
                $onlineUser->last_seen = now();
                $onlineUser->save();
            } else {
                $onlineUser->last_seen = now();
                $onlineUser->save();
            }
        }

        return $next($request);
    }
}

