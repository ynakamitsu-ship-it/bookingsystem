@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="text-center mb-5">
        投稿一覧
    </h2>

    <div class="text-center mt-4 mb-4">
        <a href="{{ route('admin_main') }}"
           class="btn btn-outline-dark px-5">
            管理者ページに戻る
        </a>
    </div>

    <div id="post-list"
         data-infinite-scroll
         data-url="{{ route('post_list') }}"
         data-page-name="page">

        @forelse($posts as $post)

            @include('partials.post_list_item', ['post' => $post])

        @empty

            <p class="text-center">
                投稿がありません。
            </p>

        @endforelse

    </div>

</div>

@endsection