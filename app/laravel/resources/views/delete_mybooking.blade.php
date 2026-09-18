@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="text-center mb-5">
        予約キャンセル
    </h1>

    <div class="border rounded p-4">

        <h2 class="text-center mb-4">
            予約内容情報
        </h2>

        <div class="row">

            <div class="col-md-5">

                <p class="border-bottom pb-2">
                    名前
                </p>

                <p class="border-bottom pb-2">
                    電話番号
                </p>

                <p class="border-bottom pb-2">
                    チェックイン日
                </p>

                <p class="border-bottom pb-2">
                    チェックアウト日
                </p>

                <p class="border-bottom pb-2">
                    予約人数
                </p>

            </div>

            <div class="col-md-7">

                <p class="border-bottom pb-2">
                    {{ $booking->name }}
                </p>

                <p class="border-bottom pb-2">
                    {{ $booking->tel }}
                </p>

                <p class="border-bottom pb-2">
                    {{ $booking->checkin_date }}
                </p>

                <p class="border-bottom pb-2">
                    {{ $booking->checkout_date }}
                </p>

                <p class="border-bottom pb-2">
                    {{ $booking->booking_people }}人
                </p>

            </div>

        </div>

        <hr>

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
    <strong>金額</strong>
    <div>
        {{ $booking->post->price }}円
    </div>
</div>

<div class="mb-4">
    <strong>内容</strong>

    <div class="border p-3 mt-2">
        {{ $booking->post->content }}
    </div>
</div>

        <div class="text-center mt-4">

            <a href="{{ route('booking_conf', $booking->id) }}"
               class="btn btn-secondary me-3">
                戻る
            </a>

            <form action="{{ route('booking.delete.post', $booking->id) }}"
                  method="POST"
                  class="d-inline">

                @csrf

                <button type="submit"
                        class="btn btn-danger">
                    キャンセル
                </button>

            </form>

        </div>

    </div>

</div>

@endsection