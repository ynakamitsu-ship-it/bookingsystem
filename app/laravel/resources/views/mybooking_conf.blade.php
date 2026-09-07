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
                    ①名前
                </div>
                <div class="col-md-8">
                    {{ $booking->name }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">
                    ②電話番号
                </div>
                <div class="col-md-8">
                    {{ $booking->tel }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">
                    ③チェックイン日
                </div>
                <div class="col-md-8">
                    {{ $booking->checkin_date }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">
                    ④チェックアウト日
                </div>
                <div class="col-md-8">
                    {{ $booking->checkout_date }}
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4 fw-bold">
                    ⑤予約人数
                </div>
                <div class="col-md-8">
                    {{ $booking->booking_people }}人
                </div>
            </div>

            <hr>

            <div class="mb-3">
                <h3>⑥{{ $booking->post->title }}</h3>
            </div>

            <div class="mb-3">
                <strong>⑦金額</strong>
                <div>
                    {{ $booking->post->price }}円
                </div>
            </div>

            <div class="border rounded p-4">
                <strong>⑧内容</strong>

                <p class="mt-3 mb-0">
                    {{ $booking->post->content }}
                </p>
            </div>

        </div>

        <div class="card-footer">

            <div class="d-flex justify-content-center gap-3">

                <a href="{{ url('/mybooking') }}"
                   class="btn btn-secondary">
                    ⑨戻る
                </a>

                <a href="{{ route('booking.delete', $booking->id) }}"
                    class="btn btn-danger">
                        ⑩キャンセル
                </a>

            </div>

        </div>

    </div>

</div>

@endsection