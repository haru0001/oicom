<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    public function getUserTweets(int $user_id)
    {
        // sqlのwhere句
        return $this->where('user_id', $user_id)->get()->toArray();
    }
}
