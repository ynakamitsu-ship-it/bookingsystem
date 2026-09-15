@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="text-center mb-5">
        投稿一覧
    </h2>

    @forelse($posts as $post)

        <div class="border p-3 mb-3">

            <div class="row align-items-center">

                {{-- 画像 --}}
                <div class="col-md-3 text-center">

                    @if($post->image_path)
                        <img src="{{ asset('storage/' . $post->image_path) }}"
                             alt="投稿画像"
                             class="img-fluid"
                             style="max-height: 120px;">
                    @else
                        <div class="border d-flex align-items-center justify-content-center"
                             style="height: 100px;">
                            画像
                        </div>
                    @endif

                </div>

                {{-- 投稿情報 --}}
                <div class="col-md-6">

                    <p class="mb-1">
                        タイトル：{{ $post->title }}
                    </p>

                    <p class="mb-1">
                        店舗名：{{ $post->user->name }}
                    </p>

                    <p class="mb-1">
                        店舗住所：{{ $post->address }}
                    </p>

                    <p class="mb-0">
                        通報件数：{{ $post->reports_count }}件
                    </p>

                </div>

                {{-- 詳細 --}}
                <div class="col-md-3 text-center">

                    <a href="{{ route('delete_post', $post->id) }}"
                         class="btn btn-outline-dark">
                        詳細
                    </a>

                </div>

            </div>

        </div>

    @empty

        <p class="text-center">
            投稿がありません。
        </p>

    @endforelse


    {{-- 管理者ページへ戻る --}}
    <div class="text-center mt-4">

        <a href="{{ route('admin_main') }}"
           class="btn btn-outline-dark px-5">
            管理者ページに戻る
        </a>

    </div>

</div>

@endsection