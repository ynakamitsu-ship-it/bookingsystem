@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mb-4">宿泊者情報</h1>

    <form action="{{ url('/booking/' . $post->id . '/conf') }}" method="POST">
        @csrf

        {{-- 名前 --}}
        <div class="mb-3">
            <label for="name" class="form-label">
                名前
            </label>

            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="{{ old('name') }}"
            >

            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- 電話番号 --}}
        <div class="mb-3">
            <label for="tel" class="form-label">
                電話番号
            </label>

            <input
                type="text"
                name="tel"
                id="tel"
                class="form-control"
                value="{{ old('tel') }}"
            >

            @error('tel')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- チェックイン日 --}}
        <div class="mb-3">
            <label for="checkin_date" class="form-label">
                チェックイン日
            </label>

            <input
                type="date"
                name="checkin_date"
                id="checkin_date"
                class="form-control"
                value="{{ old('checkin_date') }}"
            >

            @error('checkin_date')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- チェックアウト日 --}}
        <div class="mb-3">
            <label for="checkout_date" class="form-label">
                チェックアウト日
            </label>

            <input
                type="date"
                name="checkout_date"
                id="checkout_date"
                class="form-control"
                value="{{ old('checkout_date') }}"
            >

            @error('checkout_date')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- 予約人数 --}}
        <div class="mb-3">
            <label for="booking_people" class="form-label">
                予約人数
            </label>

            <input
                type="number"
                name="booking_people"
                id="booking_people"
                class="form-control"
                value="{{ old('booking_people') }}"
                min="1"
            >

            @error('booking_people')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- ボタン --}}
        <div class="mt-4">

            {{-- 戻る --}}
            <a
                href="{{ url('/post/' . $post->id) }}"
                class="btn btn-secondary"
            >
                戻る
            </a>

            {{-- 予約確認 --}}
            <button
                type="submit"
                class="btn btn-primary"
            >
                予約
            </button>

        </div>

    </form>

</div>

@endsection