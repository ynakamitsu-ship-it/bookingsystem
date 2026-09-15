@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h1 class="mb-4">ブックマーク一覧</h1>

    <div class="text-center mt-4 mb-4">
    <a href="{{ route('general_mypage') }}" class="btn btn-secondary">
        マイページへ戻る
    </a>
</div>

    @foreach ($bookmarks as $bookmark)

        <div class="card mb-3">
            <div class="card-body">

               <div class="row">
    <div class="col-md-10">
        <h2 class="h5">
            {{ $bookmark->post->title }}
        </h2>

        <p>
            店舗名：
            {{ $bookmark->post->title }}
        </p>

        <p>
            店舗住所：
            {{ $bookmark->post->address }}
        </p>
    </div>

    <div class="col-md-2 d-flex align-items-center justify-content-end">
        <a href="{{ route('post', $bookmark->post->id) }}"
           class="btn btn-primary">
            詳細
        </a>
    </div>
</div>

            </div>
        </div>

    @endforeach
    

</div>

@endsection