@extends('dashboard.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header mb-5">
            <h1 class="page-title">追い込みツイート</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-sm-8 offset-sm-2 mb-5">
                <div class="card bg-gradient-danger">
                    <form method="POST" action="{{ route('tweets.store') }}">
                        @csrf

                        <div class="card-haeder bg-card-image d-flex flex-column align-items-center p-3">
                            <p class="font-weight-bold text-light">追い込み予定日時</p>
                            <h2 class="font-weight-bold text-white m-0">{{ $now }}</h2>
                            <input type="text" name="reservation_at" class="form-control datetimepicker-input radius @error('reservation_at') is-invalid @enderror">
                            @error('reservation_at')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="card-body bg-white">
                            <div class="row mb-0">
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
                        </div>
                    </form>
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