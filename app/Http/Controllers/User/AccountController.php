<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
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
    protected $redirectTo = '/user';

    public function __construct()
    {
        $this->middleware('guest:user', ['except' => ['logout']]);
    }

    /**
     * Get the guard to be used during authentication.
     */
    protected function guard(){
        return Auth::guard("user");
    }

    /**
     * Show the user's login form.
     */
    public function showLoginForm(){
        return view('user.login');
    }

    /**
     * Show the user's signup form.
     */
    public function create(){
        return view('user.create');
    }

    /**
     * Store user's detail.
     */
    public function store(CreateUserRequest $request){
        $dataArr = $request->except('_token', 'confirm_password');
        $dataArr['uid'] = \Uuid::generate()->string;
        $user = \App\Models\User::create($dataArr);

        if($user){
            return redirect()->route('user.login')->with('success_message', 'Your account created successfully.');
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

        return redirect()->route('user.login');
    }

}
