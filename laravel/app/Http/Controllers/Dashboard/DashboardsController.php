<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Auth;
use App\Tweet;

class DashboardsController extends Controller
{
    public function index(Tweet $tweet)
    {
        $user_info = Auth::user();
        $tweet_count = $tweet->getTweetCount($user_info['id']);

        return view('dashboard.index', compact('user_info', 'tweet_count'));
    }
}
