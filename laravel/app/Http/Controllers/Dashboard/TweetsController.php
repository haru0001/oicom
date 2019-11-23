<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Tweet;
use App\Cron;
use App\Http\Requests\TweetStoreRequest;

class TweetsController extends Controller
{

    private $twitter_token;

    public function __construct()
    {
        // 仮トークン
        $this->twitter_token = 'abcdefghi0';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Tweet $tweet)
    {
        // ユーザー情報取得
        $user_info = $user->getUserInfo($this->twitter_token);
        // ユーザーツイート情報取得
        $tweets = $tweet->getUserTweets($user_info['id']);

        return view('dashboard.tweets.index', compact('user_info', 'tweets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        // ユーザー情報取得
        $user_info = $user->getUserInfo($this->twitter_token);

        return view('dashboard.tweets.create', compact('user_info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TweetStoreRequest $request, User $user, Tweet $tweet, Cron $cron)
    {
        // ユーザー情報取得
        $user_info = $user->getUserInfo($this->twitter_token);

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
