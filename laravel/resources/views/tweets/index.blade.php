{{-- <h1>{{ $tweets['id'] }}</h1> --}}
<div class="container">
    <div class="row">
        @if (isset($tweets))
            @foreach ($tweets as $tweet)
                <div class="col-md-12">
                    <p>{{ $tweet['text'] }}</p>
                </div>
            @endforeach
        @endif
    </div>
</div>