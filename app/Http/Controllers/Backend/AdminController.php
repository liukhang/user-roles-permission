<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create AdminController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Dashboard admin
     *
     * @return view
     */
    public function index()
    {
        if (Auth::user()->hasPermissionTo('login-admin')) {
            return view('backend.index');
        } else {
            Auth::logout();
            return redirect()->route('auth.login')->withErrors(['email' => 'Email hoặc password không đúng.']);
        }
    }
}
