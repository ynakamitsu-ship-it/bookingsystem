@extends('layouts.app')

@section('content')

<div class="container">

    <h1>宿泊者情報</h1>

    <form action="{{ url('/booking/' . $post->id . '/confirm') }}" method="POST">

        @csrf

        <!-- ① 名前 -->
        <div class="mb-3">
            <label for="name" class="form-label">
                名前
            </label>

            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
            >
        </div>


        <!-- ② 電話番号 -->
        <div class="mb-3">
            <label for="phone" class="form-label">
                電話番号
            </label>

            <input
                type="text"
                name="phone"
                id="phone"
                class="form-control"
            >
        </div>


        <!-- ③ チェックイン日 -->
        <div class="mb-3">
            <label for="checkin" class="form-label">
                チェックイン日
            </label>

            <input
                type="date"
                name="checkin"
                id="checkin"
                class="form-control"
            >
        </div>


        <!-- ④ チェックアウト日 -->
        <div class="mb-3">
            <label for="checkout" class="form-label">
                チェックアウト日
            </label>

            <input
                type="date"
                name="checkout"
                id="checkout"
                class="form-control"
            >
        </div>


        <!-- ⑤ 予約人数 -->
        <div class="mb-3">
            <label for="people" class="form-label">
                予約人数
            </label>

            <input
                type="number"
                name="people"
                id="people"
                class="form-control"
            >
        </div>


        <!-- ⑥ 戻る -->
        <a
            href="{{ url('/post/' . $post->id) }}"
            class="btn btn-secondary"
        >
            戻る
        </a>


        <!-- ⑦ 予約 -->
        <button
            type="submit"
            class="btn btn-primary"
        >
            予約
        </button>

    </form>

</div>

@endsection