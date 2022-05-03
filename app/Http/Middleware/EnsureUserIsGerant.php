<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EnsureUserIsGerant
{
    //Ensure user is gerant or admin to continue

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
    if ($request->user()->gerant() || $request->user()->admin()) {
        dd($request->user());
        return $next($request);
        }
        return new RedirectResponse(url('etablissements'));
        }
}
