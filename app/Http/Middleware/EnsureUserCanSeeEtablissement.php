<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use Illuminate\Support\Facades\Auth;

class EnsureUserCanSeeEtablissement
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
        $user = Auth::user();
        //dd($request->path());
        $splitUrl = explode("/", $request->path());
        $etablissementId = $splitUrl[1];
        $usersAccessingEtablissement = Etablissement::findOrFail($etablissementId)->users()->get();

        $canAccess = ($usersAccessingEtablissement->contains($user));
        //dd($canAccess);
        if ($canAccess) {
            return $next($request);
        } else {
            dd("userdoesnt access (etablissement)");
        }
    }
}
