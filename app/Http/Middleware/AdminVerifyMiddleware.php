<?php

namespace App\Http\Middleware;

use App\Enums\ProfilesEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminVerifyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == ProfilesEnum::admin) {
            return $next($request);
        }

        return redirect()->route('portal');
//        return $next($request);
    }
}
