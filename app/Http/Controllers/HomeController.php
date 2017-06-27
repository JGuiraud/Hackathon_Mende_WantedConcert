<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
}
