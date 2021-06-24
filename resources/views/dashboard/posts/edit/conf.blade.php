@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規投稿 - 入力内容確認</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/dashboard/posts/edit/'. $id .'/done') }}">
                        {{ csrf_field() }}
                        <div class="form_input_groups">
                            <div class="form-group">
                                <label for="form-item-title">タイトル</label>
                                <input type="text" class="form-control" name="title" id="form-item-title" value="{{ $title }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="form-item-content">本文</label>
                                {!! $content !!}
                                <textarea name="content" style="opacity:0;height:0;width:0;padding:0;margin:0;">{{ $content }}</textarea>
                            </div>

                        @if($eyecatch_path)
                            <div class="form-group">
                                <label>アイキャッチ画像</label>
                                <figure>
                                    <img src="{{ asset($eyecatch_path) }}">
                                    <input type="hidden" name="eyecatch_path" value="{{ $eyecatch_path }}">
                                </figure>
                            </div>
                        @endif

                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <button name="action" href="{{ url('/dashboard/posts/create') }}" class="btn btn-secondary btn-lg" value="back">戻る</a>
                            <button name="action" type="submit" class="btn btn-primary submit_button btn-lg" value="submit">この内容で投稿</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
