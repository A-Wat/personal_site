@extends('layouts.app')

@section('breadcrumbs')
    <!-- {{ Breadcrumbs::render('dashboard.posts.create.conf') }} -->
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規登録 - 入力内容確認</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/dashboard/skills/create/done') }}">
                        {{ csrf_field() }}
                        <div class="form_input_groups">
                            <div class="form-group">
                                <label for="form-item-title">スキル名</label>
                                <input type="text" class="form-control" name="name" id="form-item-title" value="{{ $inputs['name'] }}" readonly>
                            </div>

                        @if($inputs['image_path'])
                            <div class="form-group">
                                <label>ロゴ画像</label>
                                <figure>
                                    <img src="{{ asset($inputs['image_path']) }}">
                                    <input type="hidden" name="image_path" value="{{ $inputs['image_path'] }}">
                                </figure>
                            </div>
                        @endif

                            <div class="form-group">
                                <label for="form-item-title">並び順</label>
                                <div class="row">
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="order" id="form-item-title" value="{{ $inputs['order'] }}" readonly>                                
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <button class="btn btn-secondary btn-lg" type="submit" value="back">戻る</button>
                            <button type="submit" class="btn btn-primary submit_button btn-lg">この内容で投稿</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
