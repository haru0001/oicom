@extends('dashboard.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">追い込んだツイート一覧</h3>
        </div>
        <div class="row">
            @if (!empty($tweets))
                @foreach ($tweets as $tweet)
                    <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-haeder d-flex p-4 w-100">
                                <img src="{{ $user_info['profile_image_url'] }}" class="rounded-circle" width="50" height="50">
                                <div class="ml-2 d-flex flex-column">
                                    <p class="mb-0">{{ str_limit($user_info['name'], $limit = 30, $end = '...') }}</p>
                                    <span class="text-secondary">{{ str_limit($user_info['screen_name'], $limit = 20, $end = '...') }}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                {!! nl2br(e($tweet['text'])) !!}
                            </div>
                            <div class="card-footer bg-white text-right">
                                @if ($tweet['cron'])
                                    <span class="font-weight-bold text-secondary">追い込み予定日時</span>
                                    <span class="font-weight-bold text-dark ml-2">{{ $tweet['cron']['reservation_at'] }}</span>
                                @else
                                    {{-- テスト --}}
                                    <span class="font-weight-bold text-secondary">追い込み予定日時</span>
                                    <span class="font-weight-bold text-dark ml-2">2019-12-31 00:00</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12 grid-margin stretch-card">
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

