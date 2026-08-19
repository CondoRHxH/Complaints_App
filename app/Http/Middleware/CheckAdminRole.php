<?php
//  bevvee
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'accès est actif
        $accessActive = Cache::get('accessActive', false);

        // Vérifier si l'utilisateur est authentifié et s'il n'est pas administrateur
        if ($request->user() && $request->user()->role !== 'admin' && $accessActive) {
            // Rediriger l'utilisateur vers une page d'erreur
            // abort(403, 'Accès interdit. Seuls les administrateurs sont autorisés à accéder au site.');
            return redirect()->route('Error');
        }

        // Laisser passer les administrateurs ou les utilisateurs non administrateurs si l'accès est désactivé
        return $next($request);
    }
}
//  bevvee
