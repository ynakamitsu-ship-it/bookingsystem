@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">

        {{-- ②画像 --}}
        <div class="col-md-5">
            @if ($post->image_path)
                <img src="{{ asset('storage/' . $post->image_path) }}"
                     class="img-fluid"
                     alt="{{ $post->title }}">
            @else
                <p>画像なし</p>
            @endif
        </div>

        {{-- 投稿情報 --}}
        <div class="col-md-7">

            {{-- ①タイトル --}}
            <h1>{{ $post->title }}</h1>

            {{-- ③金額 --}}
            <p>金額：{{ $post->price }}円</p>

            {{-- ④予約可能日 --}}
            <p>予約可能日：{{ $post->reserve_date }}</p>

            {{-- ⑤予約可能人数 --}}
            <p>予約可能人数：{{ $post->max_people }}人</p>

            {{-- ⑦ブックマーク --}}
           <form action="{{ url('/post/' . $post->id . '/bookmark') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-secondary">
        ブックマーク
        </button>
            </form>

            {{-- 予約 --}}
@if($isBooked)
    <button type="button" class="btn btn-secondary" disabled>
        予約済み
    </button>
@else
    <a href="{{ url('/booking/' . $post->id) }}" class="btn btn-primary">
        予約
    </a>
@endif

            {{-- ⑨通報 --}}
            <form action="{{ url('/report/' . $post->id) }}" method="GET">
    @csrf
    <button
                        type="submit"
                        class="btn btn-danger">
                        通報
                    </button>
</form>

        </div>

    </div>

    {{-- ⑥内容 --}}
    <div class="mt-4">
        <h3>内容</h3>
        <p>{{ $post->content }}</p>
    </div>

</div>

@endsection