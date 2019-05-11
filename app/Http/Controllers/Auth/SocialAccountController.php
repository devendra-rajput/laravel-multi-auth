<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SocialAccountsService;
use Socialite;

class SocialAccountController extends Controller
{
    public function redirectToProvider($provider, Request $request)
    {
        $userType = $request->route()->getPrefix();
        $redirectUrl = url($userType.'/login/google/callback');
       
        return Socialite::driver($provider)->redirectUrl($redirectUrl)->redirect();
    }

    /**
     * Obtain the user information
     *
     * @return Response
     */
    public function handleProviderCallback(SocialAccountsService $socialAccountService, Request $request, $provider)
    {
        $userType = $request->route()->getPrefix();
        $redirectUrl = url($userType.'/login/google/callback');
        
        try {
            $user = Socialite::driver($provider)->redirectUrl($redirectUrl)->user();
        } catch (\Exception $e) {
            return redirect($userType.'/login');
        }

        $authUser = $socialAccountService->findOrCreate($user, $provider, $userType);

        if($userType == 'user'){
            auth('user')->login($authUser, true);
            return redirect()->route('user.index');
        }

        if($userType == 'associate'){
            auth('associate')->login($authUser, true);
            return redirect()->route('associate.index');
        }
        
    }

}
