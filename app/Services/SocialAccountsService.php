<?php

namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\User;
use App\Models\Associate;

class SocialAccountsService
{
    public function findOrCreate(ProviderUser $providerUser, $provider, $userType)
    {
        if($userType == 'user'){
            $account = User::where('provider_name', $provider)
                            ->where('provider_id', $providerUser->getId())
                            ->first();

            if($account){

                return $account;

            } else {

                $user = User::where('email', $providerUser->getEmail())->first();

                if (! $user) {
                    $user = User::create([  
                        'uid' => \Uuid::generate()->string,
                        'email' => $providerUser->getEmail(),
                        'name'  => $providerUser->getName(),
                        'provider_id' => $providerUser->getId(),
                        'provider_name' => $provider
                    ]);
                } else {
                    $user->update([
                        'provider_id' => $providerUser->getId(),
                        'provider_name' => $provider
                    ]);
                }
                
                return $user;
            }
        }

        if($userType == 'associate'){
            $account = Associate::where('provider_name', $provider)
                                    ->where('provider_id', $providerUser->getId())
                                    ->first();

            if($account){

                return $account;

            } else {

                $associate = Associate::where('email', $providerUser->getEmail())->first();

                if (! $associate) {
                    $associate = Associate::create([  
                        'uid' => \Uuid::generate()->string,
                        'email' => $providerUser->getEmail(),
                        'name'  => $providerUser->getName(),
                        'provider_id' => $providerUser->getId(),
                        'provider_name' => $provider
                    ]);
                } else {
                    $associate->update([
                        'provider_id' => $providerUser->getId(),
                        'provider_name' => $provider
                    ]);
                }
                
                return $associate;
            }
        }

    }
}