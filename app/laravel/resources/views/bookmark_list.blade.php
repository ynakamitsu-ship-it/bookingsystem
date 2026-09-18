@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h1 class="mb-4 text-center">ブックマーク一覧</h1>

    <div class="text-center mt-4 mb-4">
        <a href="{{ route('general_mypage') }}"
           class="btn btn-secondary">
            マイページへ戻る
        </a>
    </div>

    <div
        data-infinite-scroll
        data-url="{{ route('bookmark_list') }}"
        data-page-name="page"
    >
        @include('partials.bookmark_item', [
            'bookmarks' => $bookmarks
        ])
    </div>

</div>

@endsection