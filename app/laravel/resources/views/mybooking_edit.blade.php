@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="text-center mb-5">
        予約情報編集
    </h1>

    <div class="card">

        <div class="card-header text-center">
            <h2>宿泊者情報</h2>
        </div>

        <div class="card-body">

            <form method="POST"
                  action="{{ route('mybooking_edit_conf', $booking->id) }}">

                @csrf

                {{-- 名前 --}}
                <div class="mb-3">
                    <label class="form-label">
                        名前
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $booking->name) }}">

                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- 電話番号 --}}
                <div class="mb-3">
                    <label class="form-label">
                        電話番号
                    </label>

                    <input type="text"
                           name="tel"
                           class="form-control"
                           value="{{ old('tel', $booking->tel) }}">

                    @error('tel')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- チェックイン日 --}}
                <div class="mb-3">
                    <label class="form-label">
                        チェックイン日
                    </label>

                    <input type="date"
                           name="checkin_date"
                           class="form-control"
                           value="{{ old('checkin_date', $booking->checkin_date) }}">

                    @error('checkin_date')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- チェックアウト日 --}}
                <div class="mb-3">
                    <label class="form-label">
                        チェックアウト日
                    </label>

                    <input type="date"
                           name="checkout_date"
                           class="form-control"
                           value="{{ old('checkout_date', $booking->checkout_date) }}">

                    @error('checkout_date')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- 予約人数 --}}
                <div class="mb-3">
                    <label class="form-label">
                        予約人数
                    </label>

                    <input type="number"
                           name="booking_people"
                           class="form-control"
                           value="{{ old('booking_people', $booking->booking_people) }}">

                    @error('booking_people')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="text-center mt-4">

                    <a href="{{ route('mybooking_conf', $booking->id) }}"
                       class="btn btn-secondary me-3">
                        戻る
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        予約
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection