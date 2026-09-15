@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- ページタイトル --}}
    <h1 class="text-center mb-4">
        予約情報確認
    </h1>

    {{-- 予約者情報 --}}
    <div class="row justify-content-center">

        {{-- 左側 --}}
        <div class="col-md-4">

            <h2 class="text-center mb-4">
                予約者情報
            </h2>

            <div class="border rounded p-3 mb-3 text-center">
                <strong>名前</strong>
                <div class="mt-2">
                    {{ $booking['name'] }}
                </div>
            </div>

            <div class="border rounded p-3 mb-3 text-center">
                <strong>電話番号</strong>
                <div class="mt-2">
                    {{ $booking['phone'] }}
                </div>
            </div>

            <div class="border rounded p-3 mb-3 text-center">
                <strong>チェックイン日</strong>
                <div class="mt-2">
                    {{ $booking['checkin'] }}
                </div>
            </div>

            <div class="border rounded p-3 mb-3 text-center">
                <strong>チェックアウト日</strong>
                <div class="mt-2">
                    {{ $booking['checkout'] }}
                </div>
            </div>

            <div class="border rounded p-3 mb-3 text-center">
                <strong>予約人数</strong>
                <div class="mt-2">
                    {{ $booking['people'] }}
                </div>
            </div>

        </div>


        {{-- 右側 --}}
        <div class="col-md-6">

            <h2 class="text-center mb-4">
                予約内容情報
            </h2>

            <div class="border rounded p-4">

                <div class="mb-3">
                    <h4 class="mb-1">タイトル</h4>
                    <p class="mb-0">
                        {{ $post->title }}
                    </p>
                </div>

                <div class="mb-3">
                    <h4 class="mb-1">金額</h4>
                    <p class="mb-0">
                        {{ $post->price }}
                    </p>
                </div>

                <div class="border rounded p-4 mt-3">
                    <p class="text-center mb-0">
                        {{ $post->content }}
                    </p>
                </div>

            </div>

        </div>

    </div>


    {{-- 戻る・予約ボタン --}}
    <div class="d-flex justify-content-center gap-4 mt-4">

        <a href="{{ url('/booking/' . $post->id) }}"
           class="btn btn-secondary">
            戻る
        </a>

        <form action="{{ url('/booking/' . $post->id . '/reserve') }}"
              method="POST">
            @csrf

            <input type="hidden"
                   name="name"
                   value="{{ $booking['name'] }}">

            <input type="hidden"
                   name="phone"
                   value="{{ $booking['phone'] }}">

            <input type="hidden"
                   name="checkin"
                   value="{{ $booking['checkin'] }}">

            <input type="hidden"
                   name="checkout"
                   value="{{ $booking['checkout'] }}">

            <input type="hidden"
                   name="people"
                   value="{{ $booking['people'] }}">

            <button type="submit"
                    class="btn btn-primary">
                予約
            </button>

        </form>

    </div>

</div>

@endsection