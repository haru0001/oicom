<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'user_id',
        'text'
    ];

    public function user()
    {
        return $this->belongsTo(Cron::class);
    }

    // tweetsとcronのリレーションは一対一の関係
    public function cron()
    {
        return $this->hasOne(Cron::class);
    }

    public function getUserTweets(int $user_id)
    {
        // sqlのwhere句
        return $this->where('user_id', $user_id)
                    ->with('cron')
                    ->orderBy('id', 'DESC')
                    ->get()
                    ->toArray();
    }

    // ツイートを保存して発行されたツイートIDを戻り値に渡す
    public function tweetStore(array $data)
    {
        $this->fill($data)->save();
        return $this->id;
    }
}
