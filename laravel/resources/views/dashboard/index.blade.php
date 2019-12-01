@extends('dashboard.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Form elements </h3>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('image/circle.svg') }}" class="card-img-absolute">
                        <p class="font-weight-bold text-white">追い込みツイート数</p>
                        <div class="text-center">
                            <h2 class="display-1 font-weight-bold text-white">{{ $tweet_count }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('image/circle.svg') }}" class="card-img-absolute">
                        <p class="font-weight-bold text-white">直近追い込み予定</p>
                        <div class="text-center">
                            @if (!empty($tweet_latest['cron']))
                                <h2 class="display-4 text-white"> {{ $tweet_latest['cron']['reservation_at'] }}</h2>
                            @else
                                <h2 class="display-1 font-weight-bold text-white">なし</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
