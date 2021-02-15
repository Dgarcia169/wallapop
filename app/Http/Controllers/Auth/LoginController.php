<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function login(Request $request)
    {
        $this->validateLogin($request);
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            $user = \Illuminate\Support\Facades\Auth::user();
            if($user->hasVerifiedEmail()) {
                //Creo sesion con la id del usuario
                $this -> createSession($user);
                return $this->sendLoginResponse($request);
            } else {
                $user->sendEmailVerificationNotification();
                \Illuminate\Support\Facades\Auth::logout();
                Session::flash('login', true);
                $this -> closeSession($request);
            }
        }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }
    
    
    /**
     * Se cierra la sesión del usuario con los datos pasados en el request
     *
     * @access private
     *
     * @param Illuminate\Http\Request $request
     *
     */
    private function closeSession(Request $request) {
        // Se obtienen los datos de la sesión
        $session = $request -> session();
        
        // Se borran los datos de la sesión
        $session -> flush();
    }
    
    
    /**
     * Crea una sesion para el usuario
     *
     * @param User $usuario
     */
    private function createSession($usuario){
        session([
            'id'   => $usuario -> id,
            'name' => $usuario -> name
        ]);
    }
}
