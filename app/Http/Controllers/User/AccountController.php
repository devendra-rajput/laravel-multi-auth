<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use Auth;
use Socialite;

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
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function callback()
    {
        try {
            
        
            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('email',$googleUser->email)->first();
            

            if($existUser) {
                Auth::loginUsingId($existUser->id);
            }
            else {
                $user = new User;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->google_id = $googleUser->id;
                $user->password = md5(rand(1,10000));
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect()->to('/home');
        } 
        catch (Exception $e) {
            return 'error';
        }
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
