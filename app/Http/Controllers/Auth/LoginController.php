<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    protected function authenticated(Request $request, $user)
    {
        $slugUser = Auth::User()->roles->implode('slug');

        $idUser = Auth::User()->id;
        if ($slugUser == 'admin') {
            return Redirect()->route('admin');
        } elseif ($slugUser == 'pro') {
            return Redirect()->route('pro');
        } elseif ($slugUser == 'user') {
            return Redirect()->route('user');
        }
    }

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
}
