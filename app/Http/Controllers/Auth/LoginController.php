<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth\Custom\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::USER;
    public function redirectTo()
    {
        if(Auth::user()->role != 'User')
        {
            if(Auth::user()->checkStatusAdmin()){
                return RouteServiceProvider::ADMIN;
            } else {
                Session::flash('error','Akun Anda Non Aktif, Bila ini sebuah kesalahan coba hubungi Admin Dsyirkah');
                return $this->logout();
            }
        } else {
            if(Auth::user()->checkStatusAnggota())
            {
                return RouteServiceProvider::USER;
            } else {
                Session::flash('error','Akun Anda Non Aktif, Bila ini sebuah kesalahan coba hubungi Admin Dsyirkah');
                return $this->logout();
            }
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
