<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

	public function __construct()
	{
		$this->middleware('guest:admin', ['except' => ['logout']]);
	}

    public function showLoginForm(){
    	return view('auth.login', ['url' => 'admin', 'user_type' => 'Admin']);
    }

    public function login(Request $request){
    	// Validate the form data
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	$credentials = ['email' => $request->email, 'password' => $request->password];
    	$remember = $request->remember;
    	// Attempt to log the user in
    	if(Auth::guard('admin')->attempt($credentials, $remember)){
    		// If successfull, then redirect to their intended location
    		return redirect()->intended(route('admin.index'));	
    	}
    	// If unsuccessfull, then redirect back to the login with form data
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    	
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect('/admin');
    }
}
