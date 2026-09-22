@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="text-center mb-5">
        予約変更内容確認
    </h1>

    <div class="card">

        <div class="card-header text-center">
            <h2>予約内容情報</h2>
        </div>

        <div class="card-body">

            <div class="row mb-3">
                <div class="col-md-4">
                    名前
                </div>

                <div class="col-md-8">
                    {{ $data['name'] }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    電話番号
                </div>

                <div class="col-md-8">
                    {{ $data['tel'] }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    チェックイン日
                </div>

                <div class="col-md-8">
                    {{ $data['checkin_date'] }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    チェックアウト日
                </div>

                <div class="col-md-8">
                    {{ $data['checkout_date'] }}
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    予約人数
                </div>

                <div class="col-md-8">
                    {{ $data['booking_people'] }}人
                </div>
            </div>

           <hr>

<div class="row">

    {{-- 左側：旅館情報 --}}
    <div class="col-md-7">

        <h3 class="mb-3">
            {{ $booking->post->title }}
        </h3>

        <div class="mb-3">
            <strong>店舗名</strong>
            <div>
                {{ $booking->post->user->name }}
            </div>
        </div>

        <div class="mb-3">
            <strong>住所</strong>
            <div>
                {{ $booking->post->address }}
            </div>
        </div>

        <div class="mb-3">
            <strong>予約可能日</strong>
            <div>
                {{ $booking->post->reserve_date }}以降
            </div>
        </div>

        <div class="mb-3">
            <strong>予約可能人数</strong>
            <div>
                {{ $booking->post->max_people }}人
            </div>
        </div>

        <div class="mb-3">
            <strong>金額</strong>
            <div>
                {{ number_format($booking->post->price) }}円
            </div>
        </div>

    </div>

    {{-- 右側：旅館画像 --}}
    <div class="col-md-5 d-flex align-items-center justify-content-center">

        @if($booking->post->image_path)
            <img
                src="{{ asset('storage/' . $booking->post->image_path) }}"
                class="img-fluid rounded"
                style="max-height: 300px;"
                alt="旅館画像"
            >
        @endif

    </div>

</div>

{{-- 内容 --}}
<div class="mb-4">
    <strong>内容</strong>

    <div class="border rounded p-3 mt-2">
        {{ $booking->post->content }}
    </div>
</div>
</div>

            <div class="text-center">

                <a href="{{ route('mybooking_edit', $booking->id) }}"
                   class="btn btn-secondary me-3">
                    戻る
                </a>

                <form action="{{ route('mybooking_update', $booking->id) }}"
                      method="POST"
                      class="d-inline">

                    @csrf

                    <input type="hidden"
                           name="name"
                           value="{{ $data['name'] }}">

                    <input type="hidden"
                           name="tel"
                           value="{{ $data['tel'] }}">

                    <input type="hidden"
                           name="checkin_date"
                           value="{{ $data['checkin_date'] }}">

                    <input type="hidden"
                           name="checkout_date"
                           value="{{ $data['checkout_date'] }}">

                    <input type="hidden"
                           name="booking_people"
                           value="{{ $data['booking_people'] }}">

                    <button type="submit"
                            class="btn btn-primary">
                        予約
                    </button>

                </form>

            </div>

        </div>
    </div>

</div>

@endsection