<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
    protected function redirectTo()
    {

        if(\Auth::user()->roles->first()->name=='superadmin'){
            return route('dashboard.index');
        }elseif(\Auth::user()->roles->first()->name=='owner'){
            return route('home.index');
        }elseif(\Auth::user()->roles->first()->name=='admin'){
            return route('dashboard.index');
        }

    }
}
