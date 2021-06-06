@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Blog</div>

                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{{ url('/dashboard/posts/create') }}">新規投稿</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/dashboard/posts/list') }}">投稿記事一覧</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Work</div>

                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{{ url('/dashboard/posts/create') }}">新規投稿</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/dashboard/posts/') }}">投稿記事一覧</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
