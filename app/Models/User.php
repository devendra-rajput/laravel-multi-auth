<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guard = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Use mutator to convert password into hash while creating new user
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    public static function findOrCreateUserByProvider($providerUser, $providerName)
    {
        // Retrieve user by provider name and provider id
        $userObj = self::where('provider_name', $providerName)
                        ->where('provider_id', $providerUser->getId())
                        ->first();

        if(!$userObj) {
            // Retrieve user by provider email
            $userObj = self::where('email', $providerUser->getEmail())->first();
            if (! $userObj) {
                // If user doesn't exist then create new one
                $userObj = self::create([  
                                    'uid' => \Uuid::generate()->string,
                                    'email' => $providerUser->getEmail(),
                                    'name'  => $providerUser->getName(),
                                    'provider_id' => $providerUser->getId(),
                                    'provider_name' => $providerName
                                ]);
            } else {
                // If user exist then update it's provider id and provider name
                $userObj->update([
                                'provider_id' => $providerUser->getId(),
                                'provider_name' => $providerName
                            ]);
            }

        }
        return $userObj;
    }
}
