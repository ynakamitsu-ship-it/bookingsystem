@extends('layouts.app')

@section('content')

<div class="container">


    <h1>旅館予約システム</h1>
<form method="GET" action="{{ url('/home') }}" class="mb-4">

    <div class="row">

        {{-- ① ワード検索 --}}
        <div class="col-md-3">
             <input
            type="text"
            name="keyword"
            placeholder="旅館名・住所を検索"
            value="{{ request('keyword') }}">
        </div>

        {{-- ② 開始日 --}}
        <div class="col-md-2">
            <input
            type="date"
            name="start_date"
            value="{{ request('start_date') }}">
        </div>

        {{-- ③ 終了日 --}}
        <div class="col-md-2">
           <input
            type="date"
            name="end_date"
            value="{{ request('end_date') }}"
        >
        </div>

        {{-- ⑥ 金額 --}}
        <div class="col-md-2">
            <select name="price" class="form-control">
                <option value="">金額</option>
            <option value="5000" {{ request('price') == '5000' ? 'selected' : '' }}>
                5,000円以下
            </option>
            <option value="10000" {{ request('price') == '10000' ? 'selected' : '' }}>
                10,000円以下
            </option>
            <option value="20000" {{ request('price') == '20000' ? 'selected' : '' }}>
                20,000円以下
            </option>
            <option value="30000" {{ request('price') == '30000' ? 'selected' : '' }}>
                30,000円以下
            </option>
            </select>
        </div>

        {{-- ④ 検索 --}}
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">
                検索
            </button>
        </div>

    </div>

</form>
    {{-- 旅館一覧 --}}
    @foreach ($posts as $post)

        <div class="card mb-3">

            <div class="row">

                {{-- 画像 --}}
                <div class="col-md-4">
                    @if ($post->image_path)
                        <img src="{{ asset('storage/' . $post->image_path) }}"
                             class="img-fluid"
                             alt="{{ $post->title }}">
                    @else
                        <p>画像なし</p>
                    @endif
                </div>

                {{-- 旅館情報 --}}
                <div class="col-md-8">

                    <h2>{{ $post->title }}</h2>

                    <p>店舗名：{{ $post->title }}</p>

                    <p>住所：{{ $post->address }}</p>

                    <a href="{{ url('/post/' . $post->id) }}" class="btn btn-primary">
                    詳細
                    </a>

                </div>

            </div>

        </div>

    @endforeach

</div>

@endsection