@extends('layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard.posts.list') }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-start">
    @forelse($posts as $post)
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="{{ url('/dashboard/posts/edit/' . $post->id) }}">
                <div class="card">
                    <img src="{{ asset($post->eyecatch_path) }}" class="card-img-top" onerror="this.src='https://pro-foto.jp/img/f_25_topimg.jpg';">
                    <div class="card-body">
                        <div class="card-title"><i class="fas fa-blog"></i> タイトル：{{ $post->title }}</div>
                        <div><i class="far fa-calendar-alt"></i> 投稿：{{ $post->created_at }}</div>
                        <div><i class="fas fa-redo-alt"></i> 更新：{{ $post->updated_at }}</div>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="col-md-12">
            記事が投稿されていません。
        </div>
    @endforelse
    </div>
</div>
@endsection
