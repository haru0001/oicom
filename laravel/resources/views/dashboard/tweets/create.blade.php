@extends('dashboard.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">追い込みツイート</h3>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card z-depth-1">
                <div class="card-haeder d-flex p-4 w-100">
                    <img src="{{ $user_info['profile_image_url'] }}" class="rounded-circle" width="50" height="50">
                    <div class="ml-2 d-flex flex-column">
                        <p class="text-darkmb-0">{{ str_limit($user_info['name'], $limit = 30, $end = '...') }}</p>
                        <span class="text-secondary">{{ str_limit($user_info['screen_name'], $limit = 20, $end = '...') }}</span>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tweets.store') }}">
                        @csrf

                        <div class="row mb-0">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="reservation" class="font-weight-bold text-dark">追い込む予定日時</label>
                                        <input type="text" name="reservation_at" data-toggle="datetimepicker" data-target="#reservation" id="reservation" class="form-control datetimepicker-input radius @error('reservation_at') is-invalid @enderror">
                                        @error('reservation_at')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="text" class="font-weight-bold text-dark">追い込むツイート内容</label>
                                    <textarea name="text" autocomplete="text" rows="7" class="form-control @error('text') is-invalid @enderror">{{ old('text') }}</textarea>
                                    @error('text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center p-3">
                            <button type="submit" class="btn btn-danger radius">
                                ツイートする
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $('#reservation').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            locale: 'ja'
        });
    });
</script>

@endsection