@extends('layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard.posts.edit.index', $id) }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">投稿編集</div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

                <div class="card-body">
                    <form method="POST" action="{{ url('/dashboard/posts/edit/' . $id . '/conf') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form_input_groups">
                            <div>投稿：{{ $created_at }}</div>
                            <div>更新：{{ $updated_at }}</div>

                            <div class="form-group">
                                <label for="form-item-title">タイトル</label>
                                <input type="text" class="form-control" name="title" id="form-item-title" value="{{ old('title', $title) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="form-item-content">本文</label>
                                <textarea class="form-control" name="content" id="summernote" cols="30" rows="10" required>{{ old('content', $content) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>現在設定中のアイキャッチ画像</label>
                                <figure>
                                    <img src="{{ asset($eyecatch_path) }}" onerror="this.src='https://pro-foto.jp/img/f_25_topimg.jpg';">
                                </figure>
                            </div>

                            <div class="form-group">
                                <label>新しいアイキャッチ画像</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="eyecatch" id="validateCustomFile">
                                    <label for="validatedCustomFile" class="custom-file-label" data-browse="参照">選択されていません</label>
                                </div>

                                <!-- ファイル選択時にファイル名を表示する関連のやつ -->
                                <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
                                <script>
                                    bsCustomFileInput.init();
                                </script>
                            </div>

                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ url('/dashboard/posts/create') }}" class="btn btn-secondary btn-lg">クリア</a>
                            <button type="submit" class="btn btn-primary submit_button btn-lg">入力内容の確認</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
