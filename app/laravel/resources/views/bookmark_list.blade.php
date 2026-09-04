@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h1 class="mb-4">ブックマーク一覧</h1>

    @foreach ($bookmarks as $bookmark)

        <div class="card mb-3">
            <div class="card-body">

                <h2 class="h5">
                    {{ $bookmark->post->title }}
                </h2>

                <p>
                    店舗名：
                    {{ $bookmark->post->title }}
                </p>

                <p>
                    店舗住所：
                    {{ $bookmark->post->address }}
                </p>

                <a
                    href="{{ route('post', $bookmark->post->id) }}"
                    class="btn btn-outline-primary"
                >
                    詳細
                </a>

            </div>
        </div>

    @endforeach

</div>

@endsection