<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

// Supprimez cette ligne car l'espace de noms est déjà déclaré ci-dessus
// namespace App\Models;

class CheckRole
{


    public function handle(Request $request, Closure $next, $role)
    {
        // Vérifiez si l'utilisateur a le rôle requis
        if (!$request->user()->hasRole($role)) {
            // Redirigez l'utilisateur s'il n'a pas le bon rôle
            return redirect()->route('access.denied')->with('error', 'Vous n\'avez pas la permission d\'accéder à cette page.');
        }

        return $next($request);
    }
}
