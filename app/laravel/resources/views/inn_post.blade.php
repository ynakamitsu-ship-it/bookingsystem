@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="text-center mb-5">投稿詳細</h1>

    <div class="border p-4">

        <div class="row">

            {{-- 画像 --}}
            <div class="col-md-6 text-center mb-4">

                <div class="border"
                     style="
                        height: 250px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                     ">

                    @if(!empty($post->image_path))

                        <img
                            src="{{ asset('storage/' . $post->image_path) }}"
                            alt="投稿画像"
                            style="
                                max-width: 100%;
                                max-height: 240px;
                            "
                        >

                    @else

                        <span>画像</span>

                    @endif

                </div>

            </div>


            {{-- 投稿情報 --}}
            <div class="col-md-6">

                {{-- タイトル --}}
                <div class="mb-4">

                    <h4>タイトル</h4>

                    <div class="border p-2">
                        {{ $post->title }}
                    </div>

                </div>

                {{-- 住所 --}}
                <div class="mb-4">

                        <h4>住所</h4>

                    <div class="border p-2">
                            {{ $post->address }}
                     </div>

                </div>

                {{-- 金額 --}}
                <div class="mb-3">

                    <div class="border p-2">
                        金額：{{ $post->price }}円
                    </div>

                </div>


                {{-- 予約可能日 --}}
                <div class="mb-3">

                    <div class="border p-2">
                        予約可能日：{{ $post->reserve_date }}
                    </div>

                </div>


                {{-- 予約可能人数 --}}
                <div class="mb-3">

                    <div class="border p-2">
                        予約可能人数：{{ $post->max_people }}人
                    </div>

                </div>

            </div>

        </div>


        {{-- 内容 --}}
        <div class="mt-3 mb-4">

            <h4>内容</h4>

            <div class="border p-4"
                 style="min-height: 150px;">

                {!! nl2br(e($post->content)) !!}

            </div>

        </div>


        {{-- ボタン --}}
        <div class="d-flex justify-content-center gap-5">

            {{-- 投稿削除 --}}
            <form action="{{ route('post_delete', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger px-5">
                     投稿削除
                </button>
            </form>

            {{-- 投稿編集 --}}
                <a href="{{ route('edit_post', $post->id) }}"
                    class="btn btn-outline-primary px-5">
                    投稿編集
                </a>
                
                <a href="{{ route('inn_main') }}"
                        class="btn btn-outline-secondary px-5">
                 旅館運営ユーザーページへ戻る
                </a>

        </div>

    </div>

</div>

@endsection