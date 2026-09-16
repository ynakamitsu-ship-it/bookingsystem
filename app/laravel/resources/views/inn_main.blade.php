@extends('layouts.app')

@section('content')

<div class="container">

    {{-- 旅館運営ユーザーページ --}}
    <h1 class="text-center fs-3 mb-4">
        旅館運営ユーザーページ
    </h1>

    {{-- 新規投稿ボタン --}}
    <div class="text-center mb-4">
        <a href="{{ route('create_post') }}"
           class="btn btn-outline-primary px-5">
            新規投稿
        </a>
    </div>


    {{-- 投稿一覧 --}}
    @if($posts->count() > 0)

        {{-- Ajaxで新しい投稿を追加する場所 --}}
        <div id="post-list">

            @foreach($posts as $post)

                @include('partials.inn_post_card', ['post' => $post])

            @endforeach

        </div>


        {{-- 無限スクロール検知場所 --}}
        <div id="scroll-sentinel" class="text-center py-3">

            <span id="loading" style="display: none;">
                読み込み中...
            </span>

        </div>

    @else

        <p class="text-center">
            投稿はありません。
        </p>

    @endif

</div>

@endsection