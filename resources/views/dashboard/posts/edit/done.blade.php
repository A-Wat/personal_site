@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規投稿 - 投稿完了</div>

                <div class="card-body">
                    <p>記事の投稿を完了しました。</p>
                    <a href="{{ url('/dashboard/posts/list') }}" class="btn btn-secondary btn-lg">一覧に戻る</a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
