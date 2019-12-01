<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'twitter_id', 
        'screen_name',
        'name',
        'profile_image_url',
        'twitter_token',
        'twitter_token_secret',
        'email'
    ];

    public function firstOrCreateUser(object $twitter_user) : User
    {
        return $this->firstOrCreate([
            'twitter_id'           => $twitter_user->id,
            'screen_name'          => $twitter_user->nickname,
            'name'                 => $twitter_user->name,
            'profile_image_url'    => $twitter_user->avatar,
            'twitter_token'        => $twitter_user->token,
            'twitter_token_secret' => $twitter_user->tokenSecret,
            'email'                => $twitter_user->email
        ]);
    }
}
