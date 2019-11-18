@extends('layouts.app')

@section('content')
<div class="container inner-container">
    <div class="row justify-content-center">
        @if (isset($tweets))
            @foreach ($tweets as $tweet)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-haeder p-3 w-100 d-flex">
                            <img src="https://placehold.jp/50x50.png" class="rounded-circle" width="50" height="50">
                            <div class="ml-2 d-flex flex-column">
                                <p class="mb-0">{{ $user_info['name'] }}</p>
                                <a href="" class="text-secondary">{{ $user_info['screen_name'] }}</a>
                            </div>
                            <div class="d-flex justify-content-end flex-grow-1">
                                <p class="mb-0 text-secondary">{{ $tweet['created_at'] }}</p>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! nl2br(e($tweet['text'])) !!}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection

