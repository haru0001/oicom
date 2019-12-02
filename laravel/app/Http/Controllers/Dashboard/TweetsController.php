<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TweetStoreRequest;
use Auth;
use App\Tweet;
use App\Cron;

class TweetsController extends Controller
{    
    public function index(Tweet $tweet)
    {
        $user_info = Auth::user();
        
        // ユーザーツイート情報取得
        $tweets = $tweet->getUserTweets($user_info['id']);

        return view('dashboard.tweets.index', compact('user_info', 'tweets'));
    }

    public function create()
    {
        $user_info = Auth::user();

        return view('dashboard.tweets.create', compact('user_info'));
    }

    public function store(TweetStoreRequest $request, Tweet $tweet, Cron $cron)
    {
        $user_info = Auth::user();

        // ユーザーIDとツイート内容を配列に格納
        $tweet_data = [
            'user_id' => $user_info['id'],
            'text'    => $request->text
        ];

        $tweet_id = $tweet->tweetStore($tweet_data);

        // ユーザーIDとツイート内容を配列に格納
        $cron_data = [
            'tweet_id'           => $tweet_id,
            'reservation_at'     => $request->reservation_at,
            'tweet_complate_flg' => 0
        ];

        $cron->cronStore($cron_data);  

        return redirect('dashboard/tweets');
    }
}
