<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Category;
use App\Setting;
use Illuminate\Support\Facades\Session;

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
     * @var string
     */
    protected $redirectTo = '/my-account';

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $categories = Category::orderBy('name', 'asc')->get();
        $settings = Setting::first();
        return redirect('/login')->with([
            'settings'   => $settings,
            'categories' => $categories,
        ]);
    }

    public function showLoginForm(Request $request)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $settings = Setting::first();
        return view('auth.login')->with([
            'settings'   => $settings,
            'categories' => $categories,
        ]);
    }
}
