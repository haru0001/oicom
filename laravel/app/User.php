<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'twitter_token'
    ];

    public function getUserInfo(string $twitter_token)
    {
        // sqlのwhere句
        return $this->where('twitter_token', $twitter_token)->first()->toArray();
    }
}
