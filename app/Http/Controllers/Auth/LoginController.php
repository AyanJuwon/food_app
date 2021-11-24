<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;


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
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        Session::put('backUrl', URL::previous());
    }

    public function logout(Request $request) {
        $role = Auth::user()->role;
        switch ($role){
            case 'admin':
                Auth::logout();
                return redirect('/login');
                break;
            default:
                Auth::logout();
                return redirect('/index');
                break;
        }
    }

    public function redirectTo(){
        $role = Auth::user()->role;
        switch ($role){
            case 'admin':
                return '/admin';
                break;
            default:
                return Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo;
                break;
        }
    }
}