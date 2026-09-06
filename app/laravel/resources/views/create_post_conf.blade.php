@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="text-center mb-5">投稿内容確認</h1>

    <div class="border p-4">

        {{-- 投稿処理用フォーム --}}
        <form method="POST" action="{{ route('post.store') }}">
            @csrf

            <div class="row">

                {{-- ②画像 --}}
                <div class="col-md-5 text-center mb-4">

                    <div class="border"
                         style="height: 250px;
                                display: flex;
                                align-items: center;
                                justify-content: center;">

                        @if(!empty($image_path))
                            <img src="{{ asset('storage/' . $image_path) }}"
                                 alt="投稿画像"
                                 style="max-width: 100%;
                                        max-height: 240px;">
                        @else
                            <span>②画像</span>
                        @endif

                    </div>

                </div>


                {{-- ①タイトル～⑤予約可能人数 --}}
                <div class="col-md-7">

                    {{-- ①タイトル --}}
                    <div class="mb-4">
                        <h4>① タイトル</h4>

                        <div class="border p-2">
                            {{ $title }}
                        </div>
                    </div>


                    {{-- ③金額 --}}
                    <div class="mb-3">
                        <div class="border p-2">
                            ③ 金額：{{ $price }}円
                        </div>
                    </div>


                    {{-- ④予約可能日 --}}
                    <div class="mb-3">
                        <div class="border p-2">
                            ④ 予約可能日：{{ $reserve_date }}
                        </div>
                    </div>


                    {{-- ⑤予約可能人数 --}}
                    <div class="mb-3">
                        <div class="border p-2">
                            ⑤ 予約可能人数：{{ $max_people }}人
                        </div>
                    </div>

                </div>

            </div>


            {{-- 住所 --}}
            <div class="mt-3 mb-4">

                <h4>⑦ 住所</h4>

                <div class="border p-3">
                    {{ $address }}
                </div>

            </div>


            {{-- ⑥内容 --}}
            <div class="mb-5">

                <h4>⑥ 内容</h4>

                <div class="border p-4"
                     style="min-height: 150px;">
                    {!! nl2br(e($content)) !!}
                </div>

            </div>


            {{-- hidden --}}
            <input type="hidden" name="title" value="{{ $title }}">
            <input type="hidden" name="address" value="{{ $address }}">
            <input type="hidden" name="price" value="{{ $price }}">
            <input type="hidden" name="reserve_date" value="{{ $reserve_date }}">
            <input type="hidden" name="max_people" value="{{ $max_people }}">
            <input type="hidden" name="content" value="{{ $content }}">

            @if(!empty($image_path))
                <input type="hidden" name="image_path" value="{{ $image_path }}">
            @endif


            {{-- ⑧戻る・投稿 --}}
            <div class="d-flex justify-content-center gap-5">

                {{-- ⑧戻る --}}
                <button type="button"
                        class="btn btn-outline-secondary px-5"
                        onclick="history.back()">
                    ⑧ 戻る
                </button>


                {{-- ⑨投稿 --}}
                <button type="submit"
                        class="btn btn-outline-primary px-5">
                    ⑨ 投稿
                </button>

            </div>

        </form>

    </div>

</div>

@endsection