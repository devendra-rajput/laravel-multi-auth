<?php

namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\User;
use App\Models\Associate;

class SocialAccountsService
{
    public function findOrCreate(ProviderUser $providerUser, $providerName, $userType)
    {
        if($userType == 'user'){
            $user = User::findOrCreateUserByProvider($providerUser, $providerName);
            return $user;
        }

        if($userType == 'associate'){
            $associate = Associate::findOrCreateAssociateByProvider($providerUser, $providerName);
            return $associate;
        }
    }
}