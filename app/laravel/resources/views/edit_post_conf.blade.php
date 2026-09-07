@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="card p-4">

        <h2 class="text-center mb-4">
            投稿内容編集確認
        </h2>

        <div class="row">

            {{-- 画像 --}}
            <div class="col-md-5">
                <div class="border p-3 text-center">

                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}"
                             class="img-fluid"
                             alt="投稿画像">
                    @else
                        <div class="py-5">
                            画像
                        </div>
                    @endif

                </div>
            </div>

            {{-- 投稿情報 --}}
            <div class="col-md-7">

                {{-- タイトル --}}
                <div class="mb-3">
                    <h5>タイトル</h5>
                    <div class="border p-2">
                        {{ $title }}
                    </div>
                </div>

                {{-- 金額 --}}
                <div class="mb-3">
                    <div class="border p-2">
                        金額：{{ $price }}円
                    </div>
                </div>

                {{-- 予約可能日 --}}
                <div class="mb-3">
                    <div class="border p-2">
                        予約可能日：{{ $reserve_date }}
                    </div>
                </div>

                {{-- 予約可能人数 --}}
                <div class="mb-3">
                    <div class="border p-2">
                        予約可能人数：{{ $max_people }}人
                    </div>
                </div>

            </div>

        </div>

        {{-- 内容 --}}
        <div class="mt-4">

            <div class="border p-4">
                {{ $content }}
            </div>

        </div>

        {{-- ボタン --}}
        <div class="d-flex justify-content-center gap-5 mt-4">

            {{-- 戻る --}}
            <a href="{{ route('edit_post', $post->id) }}"
               class="btn btn-outline-secondary px-5">
                戻る
            </a>

            {{-- 登録 --}}
    <form action="{{ route('edit_post.update', $post->id) }}" method="POST">
        @csrf

        <input type="hidden" name="title" value="{{ $title }}">
        <input type="hidden" name="price" value="{{ $price }}">
        <input type="hidden" name="reserve_date" value="{{ $reserve_date }}">
        <input type="hidden" name="max_people" value="{{ $max_people }}">
        <input type="hidden" name="content" value="{{ $content }}">

        <button type="submit"
                class="btn btn-primary px-5">
            登録
        </button>
    </form>


        </div>

    </div>

</div>

@endsection