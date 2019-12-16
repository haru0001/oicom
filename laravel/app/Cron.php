<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cron extends Model
{
    protected $fillable = [
        'tweet_id',
        'reservation_at',
        'tweet_complate_flg'
    ];

    public $timestamps = false;

    // cronsとtweetsのリレーションは一対一の関係
    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }

    public function findReservationTweet(String $now) : Object
    {
        return $this->with('tweet')
                    ->where('reservation_at', $now)
                    ->where('tweet_complate_flg', 0)
                    ->get();
    }
}
