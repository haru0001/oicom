<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class TestsController extends Controller
{
    public function index()
    {
        $results = \Twitter::post("statuses/update", ['status'=> 'TwitterAPIテスト']);
        
        dd($results);
    }
}
