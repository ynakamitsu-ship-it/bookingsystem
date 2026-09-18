@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1 class="text-center mb-5">予約確認</h1>

    <div class="card mx-auto" style="max-width: 900px;">

        <div class="card-header text-center">
            <h2 class="mb-0">予約内容情報</h2>
        </div>

        <div class="card-body">

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">
                    名前
                </div>
                <div class="col-md-8">
                    {{ $booking->name }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">
                    電話番号
                </div>
                <div class="col-md-8">
                    {{ $booking->tel }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">
                    チェックイン日
                </div>
                <div class="col-md-8">
                    {{ $booking->checkin_date }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">
                    チェックアウト日
                </div>
                <div class="col-md-8">
                    {{ $booking->checkout_date }}
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4 fw-bold">
                    予約人数
                </div>
                <div class="col-md-8">
                    {{ $booking->booking_people }}人
                </div>
            </div>

            <hr>

<div class="row">

    {{-- 左側：旅館情報 --}}
    <div class="col-md-7">

        <div class="mb-3">
            <h3>{{ $booking->post->title }}</h3>
        </div>

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
                {{ $booking->post->price }}円
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
<div class="border rounded p-4">
    <strong>内容</strong>

    <p class="mt-3 mb-0">
        {{ $booking->post->content }}
    </p>
</div>
        </div>

        <div class="card-footer">

            <div class="d-flex justify-content-center gap-3">

                <a href="{{ url('/mybooking') }}"
                   class="btn btn-secondary">
                    戻る
                </a>

                <a href="{{ route('booking.delete', $booking->id) }}"
                    class="btn btn-danger">
                        キャンセル
                </a>

                 <a href="{{ route('mybooking_edit', $booking->id) }}"
                     class="btn btn-secondary me-3">
                     編集
                 </a>

            </div>

        </div>

    </div>

</div>

@endsection