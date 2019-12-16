<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TweetStoreRequest;
use Auth;
use Carbon\Carbon;
use App\Tweet;

class TweetsController extends Controller
{
    public function index(Tweet $tweet)
    {
        $user_info = Auth::user();
        $tweets = $tweet->getUserTweets($user_info['id']);

        return view('dashboard.tweets.index', compact('user_info', 'tweets'));
    }

    public function create(Carbon $carbon)
    {
        $user_info = Auth::user();
        $now = $carbon->now()->format('Y-m-d H:i');

        return view('dashboard.tweets.create', compact('user_info', 'now'));
    }

    public function store(TweetStoreRequest $request, Tweet $tweet)
    {
        $user_info = Auth::user();
        $tweet->reservationTweetStore($user_info['id'], $request);

        return redirect('dashboard/tweets');
    }
}
