<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SocialAccountsService;
use Socialite;

class SocialAccountController extends Controller
{
    /**
     * Redirect to the provider
     */
    public function redirectToProvider($providerName, Request $request)
    {
        $userType = $request->route()->getPrefix();
        $request->session()->put('user_type', $userType);
       
        return Socialite::driver($providerName)->redirect();
    }

    /**
     * Obtain the user information
     *
     * @return Response
     */
    public function handleProviderCallback(SocialAccountsService $socialAccountService, Request $request, $providerName)
    {
        $userType = $request->session()->get('user_type');
        try {
            $providerUser = Socialite::driver($providerName)->user();
        } catch (\Exception $e) {
            return redirect($userType.'/login');
        }

        $authUser = $socialAccountService->findOrCreate($providerUser, $providerName, $userType);

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
