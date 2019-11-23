<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Administrador
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if($user->admin)
            return $next($request);
        else
            return redirect('admin');
    }
}
