@extends('dashboard.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header mb-5">
            <h1 class="page-title">追い込んだツイート一覧</h1>
        </div>
        <div class="row">
            @if (!empty($tweets))
                @foreach ($tweets as $tweet)
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 mb-5">
                        <div class="card bg-gradient-danger">
                            <div class="card-haeder bg-card-image d-flex flex-column align-items-center p-3">
                                <p class="font-weight-bold text-light">追い込み日時</p>
                                @if (!empty($tweet['cron']))
                                    <h2 class="font-weight-bold text-white m-0">{{ $tweet['cron']['reservation_at'] }}</h2>
                                @else
                                    <h2 class="font-weight-bold text-white m-0">2019-12-31 00:00</h2>
                                @endif
                            </div>
                            <div class="card-body bg-white">
                                <p class="font-weight-bold text-dark display-5">{!! nl2br(e($tweet['text'])) !!}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-end bg-white border-0 p-4">
                                <img src="{{ $user_info['profile_image_url'] }}" class="rounded-circle" width="50" height="50">
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            まだ投稿がありません
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

