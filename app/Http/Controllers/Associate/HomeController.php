<?php

namespace App\Http\Controllers\Associate;

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
        $this->middleware('auth:associate');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('associate/home');
    }

    /**
     * Show user account details
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        $associate = \Auth::user();
        return view('associate/account', compact('associate'));
    }
}
