@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- ページタイトル --}}
    <h1 class="text-center mb-4">
        予約情報確認
    </h1>

    <div class="row justify-content-center">

        {{-- 左側：予約者情報 --}}
        <div class="col-md-4">

            <h2 class="text-center mb-4">
                予約者情報
            </h2>

            {{-- 名前 --}}
            <div class="border border-2 border-dark rounded p-3 mb-3 text-center">
                <strong>名前</strong>

                <div class="mt-2">
                    {{ $booking['name'] }}
                </div>
            </div>

            {{-- 電話番号 --}}
            <div class="border border-2 border-dark rounded p-3 mb-3 text-center">
                <strong>電話番号</strong>

                <div class="mt-2">
                    {{ $booking['tel'] }}
                </div>
            </div>

            {{-- チェックイン日 --}}
            <div class="border border-2 border-dark rounded p-3 mb-3 text-center">
                <strong>チェックイン日</strong>

                <div class="mt-2">
                    {{ $booking['checkin_date'] }}
                </div>
            </div>

            {{-- チェックアウト日 --}}
            <div class="border border-2 border-dark rounded p-3 mb-3 text-center">
                <strong>チェックアウト日</strong>

                <div class="mt-2">
                    {{ $booking['checkout_date'] }}
                </div>
            </div>

            {{-- 予約人数 --}}
            <div class="border border-2 border-dark rounded p-3 mb-3 text-center">
                <strong>予約人数</strong>

                <div class="mt-2">
                    {{ $booking['booking_people'] }}人
                </div>
            </div>

        </div>


        {{-- 右側：予約内容 --}}
        <div class="col-md-6">

            <h2 class="text-center mb-4">
                予約内容情報
            </h2>

            <div class="border border-2 border-dark rounded p-4">

                         {{-- 投稿画像 --}}
@if ($post->image_path)
    <div class="text-center mb-4">
        <img src="{{ asset('storage/' . $post->image_path) }}"
             alt="{{ $post->title }}"
             class="img-fluid rounded"
             style="max-height: 250px; object-fit: cover;">
    </div>
@endif

                {{-- 旅館名 --}}
                <div class="mb-3">
                    <h4 class="mb-1">旅館名</h4>

                    <p class="mb-0">
                        {{ $post->user->name }}
                    </p>
                </div>

               

   


                {{-- タイトル --}}
                <div class="mb-3">
                    <h4 class="mb-1">タイトル</h4>

                    <p class="mb-0">
                        {{ $post->title }}
                    </p>
                </div>

                 {{-- 住所 --}}
                <div class="mb-3">
                    <h4 class="mb-1">住所</h4>

                    <p class="mb-0">
                        {{ $post->address }}
                    </p>
                </div>

                {{-- 金額 --}}
                <div class="mb-3">
                    <h4 class="mb-1">金額</h4>

                    <p class="mb-0">
                        {{ number_format($post->price) }}円
                    </p>
                </div>

                {{-- 内容 --}}
                <div class="border border-2 border-dark rounded p-4 mt-3">
                    <p class="text-center mb-0">
                        {{ $post->content }}
                    </p>
                </div>

            </div>

        </div>

    </div>


    {{-- 戻る・予約ボタン --}}
    <div class="d-flex justify-content-center gap-4 mt-4">

        {{-- 戻る --}}
        <a href="{{ url('/booking/' . $post->id) }}"
           class="btn btn-secondary">
            戻る
        </a>


        {{-- 予約確定 --}}
        <form action="{{ url('/booking/' . $post->id . '/reserve') }}"
              method="POST">

            @csrf

            {{-- 名前 --}}
            <input type="hidden"
                   name="name"
                   value="{{ $booking['name'] }}">

            {{-- 電話番号 --}}
            <input type="hidden"
                   name="tel"
                   value="{{ $booking['tel'] }}">

            {{-- チェックイン日 --}}
            <input type="hidden"
                   name="checkin_date"
                   value="{{ $booking['checkin_date'] }}">

            {{-- チェックアウト日 --}}
            <input type="hidden"
                   name="checkout_date"
                   value="{{ $booking['checkout_date'] }}">

            {{-- 予約人数 --}}
            <input type="hidden"
                   name="booking_people"
                   value="{{ $booking['booking_people'] }}">

            <button type="submit"
                    class="btn btn-primary">
                予約
            </button>

        </form>

    </div>

</div>

@endsection