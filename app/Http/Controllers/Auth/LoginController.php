<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Personaliza la ruta de redirección después de iniciar sesión
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Personaliza la vista del formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login'); // Coloca la vista personalizada aquí
    }
}
