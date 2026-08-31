@extends('layouts.app')

@section('content')

<div class="container">

    <h1>予約情報確認</h1>

    <h2>予約者情報</h2>

    <p>名前：{{ $booking['name'] }}</p>

    <p>電話番号：{{ $booking['phone'] }}</p>

    <p>チェックイン日：{{ $booking['checkin'] }}</p>

    <p>チェックアウト日：{{ $booking['checkout'] }}</p>

    <p>予約人数：{{ $booking['people'] }}</p>


    <h2>予約内容情報</h2>

    <p>タイトル：{{ $post->title }}</p>

    <p>金額：{{ $post->price }}</p>

    <p>内容：{{ $post->content }}</p>


    <a href="{{ url('/booking/' . $post->id) }}"
       class="btn btn-secondary">
        戻る
    </a>

    <form action="/booking/{{ $post->id }}/reserve" method="POST">
    @csrf

    <input type="hidden" name="name" value="{{ $booking['name'] }}">
    <input type="hidden" name="phone" value="{{ $booking['phone'] }}">
    <input type="hidden" name="checkin" value="{{ $booking['checkin'] }}">
    <input type="hidden" name="checkout" value="{{ $booking['checkout'] }}">
    <input type="hidden" name="people" value="{{ $booking['people'] }}">

    <button type="submit" class="btn btn-primary">
        予約
    </button>
</form>

</div>

@endsection