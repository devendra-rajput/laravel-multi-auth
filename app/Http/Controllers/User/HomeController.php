<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user/home');
    }

    /**
     * Show user account details
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        $user = \Auth::user();
        return view('user/account', compact('user'));
    }
}
