<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use DB;

class Tweet extends Model
{
    private $user_id;
    private $text;
    private $reservation_at;
    protected $fillable = [
        'user_id',
        'text'
    ];

    // tweetsとusersのリレーションは一対多の関係
    public function user()
    {
        return $this->belongsTo(Cron::class);
    }

    // tweetsとcronのリレーションは一対一の関係
    public function cron()
    {
        return $this->hasOne(Cron::class);
    }

    // ユーザーのツイートを取得
    public function getUserTweets(Int $user_id) : Array
    {
        return $this->where('user_id', $user_id)
                    ->with('cron')
                    ->orderBy('id', 'DESC')
                    ->get()
                    ->toArray();
    }

    // ツイート数のカウントを取得
    public function getTweetCount(Int $user_id) : String
    {
        return $this->where('user_id', $user_id)->count();
    }

    // 最新のツイートを取得
    public function getTweetLatest(Int $user_id) : ? Tweet
    {
        return $this->with('cron')->where('user_id', $user_id)->first();
    }

    // ツイートから投稿内容と予約時間を各テーブルに保存
    public function reservationTweetStore(Int $user_id, Request $request) : Void
    {
        $this->user_id        = $user_id;
        $this->text           = $request->text;
        $this->reservation_at = $request->reservation_at;

        DB::transaction(function () {
            $tweet = $this->create([
                'user_id' => $this->user_id,
                'text'    => $this->text 
            ]);

            $tweet->cron()->create([
                'tweet_id'           => $tweet->id,
                'reservation_at'     => $this->reservation_at,
                'tweet_complate_flg' => 0
            ]);
        });
    }
}
