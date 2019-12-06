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
        $tweet_latest = $tweet->getTweetLatest($user_info['id']);

        if ($tweet_count <= 0) {
            $rank = "自分に甘い腑抜け。常に養ってくれる人を求めている";
        } elseif ($tweet_count <= 2) {
            $rank = "期末テスト前の中学生位には頑張ってる";
        } elseif ($tweet_count <= 4) {
            $rank = "周りの目も変わってきた（良い意味なのかは分からない）";
        } elseif ($tweet_count <= 8) {
            $rank = "スタバでドヤ顔出来るくらいには意識高くなった";
        } elseif ($tweet_count <= 10) {
            $rank = "意識高すぎてもはやマルチっぽい";
        } elseif ($tweet_count <= 15) {
            $rank = "OICOMER（追い込マー）の称号を讃える";
        } elseif ($tweet_count <= 30) {
            $rank = "ここまで来るともう追い込んでるのか分からない";
        }

        return view('dashboard.index', compact('user_info', 'tweet_count', 'tweet_latest', 'rank'));
    }
}
