<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Associate extends Authenticatable
{
    use Notifiable;

    protected $guard = 'associate';

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
     * Use mutator to convert password into hash while creating new associate
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    public static function findOrCreateAssociateByProvider($providerUser, $providerName)
    {
        // Retrieve associate by provider name and provider id
        $associateObj = self::where('provider_name', $providerName)
                        ->where('provider_id', $providerUser->getId())
                        ->first();

        if(!$associateObj) {
            // Retrieve associate by provider email
            $associateObj = self::where('email', $providerUser->getEmail())->first();
            if (! $associateObj) {
                // If associate doesn't exist then create new one
                $associateObj = self::create([  
                                    'uid' => \Uuid::generate()->string,
                                    'email' => $providerUser->getEmail(),
                                    'name'  => $providerUser->getName(),
                                    'provider_id' => $providerUser->getId(),
                                    'provider_name' => $providerName
                                ]);
            } else {
                // If associate exist then update it's provider id and provider name
                $associateObj->update([
                                'provider_id' => $providerUser->getId(),
                                'provider_name' => $providerName
                            ]);
            }

        }
        return $associateObj;
    }
}
