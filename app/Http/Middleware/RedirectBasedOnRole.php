<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectBasedOnRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            if(auth()->user()->role === 'Pegawai') {
                return response()->view('pages/pegawai/home');
            }
            
            if(auth()->user()->role === 'Pembeli') {
                return response()->view('teacherDashboard');
            }
        }
        
        // Default redirect if not authenticated or role not matched
        return redirect('home');
    }
    
}
