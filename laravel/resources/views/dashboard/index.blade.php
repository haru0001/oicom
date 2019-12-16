@extends('dashboard.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header mb-5">
            <h1 class="page-title">HOME</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-haeder d-flex pt-4 px-4">
                        <img src="{{ $user_info['profile_image_url'] }}" class="rounded-circle" width="50" height="50">
                        <div class="ml-2 d-flex flex-column">
                            <p class="font-weight-bold text-dark mb-0">{{ str_limit($user_info['name'], $limit = 30, $end = '...') }}</p>
                            <span class="text-secondary text-small">{{ str_limit($user_info['screen_name'], $limit = 20, $end = '...') }}</span>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="font-weight-bold text-secondary"><i class="fad fa-trophy-alt text-warning"></i> 現在の称号</p>
                        <div class="d-flex">
                            <div class="align-self-start">
                                <i class="fas fa-quote-left text-muted"></i>
                            </div>
                            <h2 class="display-5 font-weight-bold text-dark mb-0 mx-3 py-3">{{ $rank }}</h2>
                            <div class="align-self-end">
                                <i class="fas fa-quote-right text-muted"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 grid-margin stretch-card">
                <div class="card bg-gradient-danger text-white">
                    <div class="card-body bg-card-image">
                        <p class="font-weight-bold text-white">追い込みツイート数</p>
                        <div class="text-center">
                            <h2 class="display-1 font-weight-bold text-white">{{ $tweet_count }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 grid-margin stretch-card">
                <div class="card bg-gradient-success text-white">
                    <div class="card-body bg-card-image">
                        <p class="font-weight-bold text-white">直近追い込み予定</p>
                        <div class="text-center">
                            @if (!empty($tweet_latest['cron']))
                                <h2 class="display-4 text-white">{{ $tweet_latest['cron']['reservation_at'] }}</h2>
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
