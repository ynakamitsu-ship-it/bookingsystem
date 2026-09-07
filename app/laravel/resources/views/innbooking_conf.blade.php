@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="card p-4">

        <h2 class="text-center mb-4">
            予約確認
        </h2>

        <h3 class="mb-3">
            予約内容情報
        </h3>

        <div class="row">

            {{-- ユーザー情報 --}}
            <div class="col-md-5">

                <div class="mb-3">
                    <h5>名前</h5>
                    <div class="border p-2">
                        {{ $booking->name }}
                    </div>
                </div>

                <div class="mb-3">
                    <h5>電話番号</h5>
                    <div class="border p-2">
                        {{ $booking->tel }}
                    </div>
                </div>

                <div class="mb-3">
                    <h5>チェックイン日</h5>
                    <div class="border p-2">
                        {{ $booking->checkin_date }}
                    </div>
                </div>

                <div class="mb-3">
                    <h5>チェックアウト日</h5>
                    <div class="border p-2">
                        {{ $booking->checkout_date }}
                    </div>
                </div>

                <div class="mb-3">
                    <h5>予約人数</h5>
                    <div class="border p-2">
                        {{ $booking->booking_people }}人
                    </div>
                </div>

            </div>


            {{-- 投稿情報 --}}
            <div class="col-md-7">

                <h5>タイトル</h5>
                <div class="border p-2 mb-3">
                    {{ $booking->post->title }}
                </div>

                <h5>金額</h5>
                <div class="border p-2 mb-3">
                    金額：{{ $booking->post->price }}円
                </div>

                <h5>内容</h5>
                <div class="border p-4">
                    {{ $booking->post->content }}
                </div>

            </div>

        </div>


        {{-- ボタン --}}
        <div class="d-flex justify-content-center gap-5 mt-4">

            {{-- 戻る --}}
            <a href="{{ route('innbooking_list') }}"
               class="btn btn-outline-secondary px-5">
                戻る
            </a>

            {{-- 通報 --}}
            <a
                href="{{ route('inn_report', $booking->id) }}"
                class="btn btn-outline-danger px-5">
                     通報
                    </a>

        </div>

    </div>

</div>

@endsection