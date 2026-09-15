@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="text-center mb-4">
        旅館検索
    </h2>

    {{-- 検索 --}}
    <form method="GET" action="{{ route('top') }}" class="mb-5">

        <div class="row g-2 justify-content-center">

            <div class="col-md-4">
                <input type="text"
                       name="keyword"
                       class="form-control"
                       value="{{ request('keyword') }}"
                       placeholder="タイトル・内容・住所・店舗名">
            </div>

            <div class="col-md-3">
                <input type="date"
                       name="reserve_date"
                       class="form-control"
                       value="{{ request('reserve_date') }}">
            </div>

            <div class="col-md-2">
                <input type="number"
                       name="price"
                       class="form-control"
                       value="{{ request('price') }}"
                       placeholder="金額">
            </div>

            <div class="col-md-2">
                <button type="submit"
                        class="btn btn-primary w-100">
                    検索
                </button>
            </div>

        </div>

    </form>


    {{-- 旅館一覧 --}}
    @forelse($posts as $post)

        <div class="card mb-4">

            <div class="card-body">

                <div class="row align-items-center">

                    {{-- 画像 --}}
                    <div class="col-md-3 text-center">

                        @if($post->image_path)

                            <img src="{{ asset('storage/' . $post->image_path) }}"
                                 class="img-fluid"
                                 style="max-height: 160px; object-fit: cover;">

                        @else

                            <div class="border p-5">
                                画像
                            </div>

                        @endif

                    </div>


                    {{-- 旅館情報 --}}
                    <div class="col-md-6">

                        <h4>
                            {{ $post->title }}
                        </h4>

                        <p class="mb-1">
                            店舗名：
                            {{ $post->user->name ?? '' }}
                        </p>

                        <p class="mb-1">
                            店舗住所：
                            {{ $post->address }}
                        </p>

                        <p class="mb-1">
                            金額：
                            {{ number_format($post->price) }}円
                        </p>

                        <p class="mb-1">
                            予約可能日：
                            {{ $post->reserve_date }}
                        </p>

                    </div>


                    {{-- 詳細 --}}
                    <div class="col-md-3 text-center">

                        <a href="{{ route('post', $post->id) }}"
                           class="btn btn-outline-primary">

                            詳細

                        </a>

                    </div>

                </div>

            </div>

        </div>

    @empty

        <p class="text-center">
            該当する旅館がありません。
        </p>

    @endforelse

</div>

@endsection