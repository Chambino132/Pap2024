<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserIsClienteOrPersonal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if(Auth::user()->utype === "Cliente" || Auth::user()->utype === "Personal" )
            {
                return $next($request);
            }
        }

        session()->flash("failed", "Não tem permissão para aceder a esta pagina");
        return redirect()->route('login');
    }
}
