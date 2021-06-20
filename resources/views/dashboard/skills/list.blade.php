@extends('layouts.app')

<!-- @section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard.skills.list') }}
@endsection -->

@section('content')
<div class="container">
    <div class="row justify-content-start">
    @forelse($skills as $skill)
        <div class="col-md-4">
            <a href="{{ url('/dashboard/skills/edit/' . $skill->id) }}">
                <div class="card">
                    <img src="{{ asset($skill->image) }}" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title">{{ $skill->name }}</div>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="col-md-12">
            スキルが登録されていません。
        </div>
    @endforelse
    </div>
</div>
@endsection
