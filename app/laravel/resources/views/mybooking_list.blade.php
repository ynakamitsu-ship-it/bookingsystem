@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="text-center mb-5">予約一覧</h1>

    @foreach($bookings as $booking)

        <div class="card mb-4">

            <div class="card-body">

                <div class="row align-items-center">

                    {{-- 画像 --}}
                    <div class="col-md-3 text-center">
                        @if($booking->post->image_path)
                            <img
                                src="{{ asset('storage/' . $booking->post->image_path) }}"
                                class="img-fluid"
                                alt="画像"
                            >
                        @else
                            <div class="border p-5">
                                画像
                            </div>
                        @endif
                    </div>

                    {{-- 店舗情報 --}}
                    <div class="col-md-6">

                        <h3>
                            {{ $booking->post->title }}
                        </h3>

                        <p class="mb-1">
                            <strong>店舗名：</strong>
                            {{ $booking->post->title }}
                        </p>

                        <p class="mb-0">
                            <strong>店舗住所：</strong>
                            {{ $booking->post->address }}
                        </p>

                    </div>

                    {{-- 確認ボタン --}}
                    <div class="col-md-3 text-center">

                        <a
                            href="{{ url('/booking/' . $booking->id . '/conf') }}"
                            class="btn btn-primary"
                        >
                            ①確認
                        </a>

                    </div>

                </div>

            </div>

        </div>

    @endforeach

</div>

@endsection