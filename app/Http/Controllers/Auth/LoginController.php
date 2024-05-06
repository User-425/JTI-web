<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'Pegawai') {
            return redirect('/pegawai/dashboard');
        } elseif ($user->role === 'Pembeli') {
            return redirect('/pembeli/dashboard');
        }

        return redirect($this->redirectTo);
    }
}
