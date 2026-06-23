<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $user is someone that is logged in   
        $user = auth()->user();

        // is the user NOT logged in?? OR is the user logged in but NOT an admin??
        if(!$user || !$user->isAdmin()){
            //abort(403, 'Unauthorised. Admin access only.');
            abort(redirect()->back()->with('error', 'Unauthorised. Admin access only.'));
        }
    
        return $next($request);
    }
}
