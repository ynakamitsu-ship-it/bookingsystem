@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="text-center mb-5">
        予約確認
    </h1>

    <div class="card">

        <div class="card-header text-center">
            <h2>予約内容情報</h2>
        </div>

        <div class="card-body">

            <div class="row mb-3">
                <div class="col-md-4">
                    ①名前
                </div>

                <div class="col-md-8">
                    {{ $data['name'] }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    ②電話番号
                </div>

                <div class="col-md-8">
                    {{ $data['tel'] }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    ③チェックイン日
                </div>

                <div class="col-md-8">
                    {{ $data['checkin_date'] }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    ④チェックアウト日
                </div>

                <div class="col-md-8">
                    {{ $data['checkout_date'] }}
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    ⑤予約人数
                </div>

                <div class="col-md-8">
                    {{ $data['booking_people'] }}人
                </div>
            </div>

            <hr>

            <h3 class="mb-3">
                ⑥{{ $booking->post->title }}
            </h3>

            <div class="mb-3">
                ⑦金額
            </div>

            <div class="mb-4">
                ⑧内容
                <div class="border p-3 mt-2">
                    {{ $booking->post->content }}
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