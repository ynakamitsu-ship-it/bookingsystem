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
                    ①名前
                </p>

                <p class="border-bottom pb-2">
                    ②電話番号
                </p>

                <p class="border-bottom pb-2">
                    ③チェックイン日
                </p>

                <p class="border-bottom pb-2">
                    ④チェックアウト日
                </p>

                <p class="border-bottom pb-2">
                    ⑤予約人数
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

        <div class="border rounded p-4 mt-4">

            <h2>
                ⑥{{ $booking->post->title }}
            </h2>

            <p>
                ⑦金額
            </p>

            <p>
                {{ $booking->post->price }}円
            </p>

            <div class="border rounded p-3 mt-3">

                <p>
                    ⑧内容
                </p>

                <p>
                    {{ $booking->post->content }}
                </p>

            </div>

        </div>

        <div class="text-center mt-4">

            <a href="{{ route('booking_conf', $booking->id) }}"
               class="btn btn-secondary me-3">
                ⑨戻る
            </a>

            <form action="{{ route('booking.delete.post', $booking->id) }}"
                  method="POST"
                  class="d-inline">

                @csrf

                <button type="submit"
                        class="btn btn-danger">
                    ⑩キャンセル
                </button>

            </form>

        </div>

    </div>

</div>

@endsection