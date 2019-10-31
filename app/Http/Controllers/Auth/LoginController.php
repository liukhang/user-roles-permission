<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\MessageBag;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function postLogin(Request $request) 
    {
    	if ( Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')])) {
            if (Auth::user()->hasPermissionTo('login-admin')) {
                return redirect()->intended('/admin');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Bạn không đủ quyền truy cập.']);
            }
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Email hoặc password không đúng.']);
        }
    }
}
