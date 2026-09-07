@extends('layouts.app')

@section('content')

<div class="container">

    {{-- 旅館運営ユーザーページ --}}
    <h1 class="text-center fs-3 mb-4">
        旅館運営ユーザーページ
    </h1>

    {{-- 新規投稿ボタン --}}
    <div class="text-center mb-4">
    <a href="{{ route('create_post') }}" class="btn btn-outline-primary px-5">
        ① 新規投稿
    </a>
</div>
    </div>

    {{-- 投稿一覧 --}}
    @if($posts->count() > 0)

        @foreach($posts as $post)

            <div class="card mb-3">

                <div class="card-body">

                    {{-- 旅館名 --}}
                    <h5 class="card-title">
                        {{ $post->title }}
                    </h5>

                    {{-- 住所 --}}
                    <p class="card-text">
                        {{ $post->address }}
                    </p>

                    {{-- 予約可能日 --}}
                    <p class="card-text">
                        <small class="text-muted">
                            予約可能日：
                            {{ $post->reserve_date }}
                        </small>
                    </p>

                <a href="{{ route('inn_post', ['id' => $post->id]) }}"
                                class="btn btn-outline-primary">
                               投稿詳細
                </a>
                </div>

            </div>

        @endforeach

    @else

        <p class="text-center">
            投稿はありません。
        </p>

    @endif

</div>

@endsection