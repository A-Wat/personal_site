@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規投稿 - 入力内容確認</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/dashboard/posts/create/done') }}">
                        {{ csrf_field() }}
                        <div class="form_input_groups">
                            <div class="form-group">
                                <label for="form-item-title">タイトル</label>
                                <input type="text" class="form-control" name="title" id="form-item-title" value="{{ $title }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="form-item-content">本文</label>
                                <div>{!! $content !!}</div>
                            </div>

                        @if($eyecatch_path)
                            <div class="form-group">
                                <label>アイキャッチ画像</label>
                                <figure>
                                    <img src="{{ asset($eyecatch_path) }}">
                                </figure>
                            </div>
                        @endif

                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ url('/dashboard/posts/create') }}" class="btn btn-secondary btn-lg">戻る</a>
                            <button type="submit" class="btn btn-primary submit_button btn-lg">この内容で投稿</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
