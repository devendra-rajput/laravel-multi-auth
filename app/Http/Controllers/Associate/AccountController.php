<?php

namespace App\Http\Controllers\Associate;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAssociateRequest;
use Auth;

class AccountController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Account Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * After  log in redirect to admin home page
     */
    protected $redirectTo = '/associate';

    public function __construct()
    {
        $this->middleware('guest:associate', ['except' => ['logout']]);
    }

    /**
     * Get the guard to be used during authentication.
     */
    protected function guard(){
        return Auth::guard("associate");
    }

    /**
     * Show the user's login form.
     */
    public function showLoginForm(){
        return view('associate.login');
    }

    /**
     * Show the associate's signup form.
     */
    public function create(){
        return view('associate.create');
    }

    /**
     * Store associate's detail.
     */
    public function store(CreateAssociateRequest $request){
        $dataArr = $request->except('_token', 'confirm_password');
        $dataArr['uid'] = \Uuid::generate()->string;
        $associate = \App\Models\Associate::create($dataArr);
        
        if($associate){
            return redirect()->route('associate.login')->with('success_message', 'Your account created successfully.');
        }
        return redirect()->back()->with('error_message', 'Unable to create account. Please try again later.')->withInput();
    }

    /**
     * Logout the authenticated user
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect()->route('associate.login');
    }

}
