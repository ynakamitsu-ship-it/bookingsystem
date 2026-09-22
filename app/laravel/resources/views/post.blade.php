@extends('layouts.app')

@section('content')

<div class="container py-4">
     

    {{-- 投稿詳細 --}}
    <div class="card">

        <div class="card-body">

            {{-- 上半分 --}}
            <div class="row">

                {{-- ②画像 --}}
                <div class="col-md-5">

                    <div class="ratio ratio-4x3">

                        @if ($post->image_path)

                            <img src="{{ asset('storage/' . $post->image_path) }}"
                                 class="img-fluid object-fit-cover"
                                 alt="{{ $post->title }}">

                        @else

                            <div class="d-flex align-items-center justify-content-center border">
                                <span>画像なし</span>
                            </div>

                        @endif

                    </div>

                </div>


                {{-- 投稿情報 --}}
                <div class="col-md-7">

                    {{-- ①タイトル --}}
                    <h1 class="mb-4">
                        {{ $post->title }}
                    </h1>

                    


                    {{-- ⑦ブックマーク・⑨通報 --}}
                    <div class="d-flex justify-content-end gap-2 mb-4">

                      {{-- ブックマーク --}}
<form id="bookmark-form"
      action="{{ url('/post/' . $post->id . '/bookmark') }}"
      method="POST">
    @csrf

    <button type="submit"
            id="bookmark-button"
            class="btn btn-secondary">
        @if($isBookmarked)
            ブックマーク済み
        @else
            ブックマーク
        @endif
    </button>
</form>


                        {{-- 通報 --}}
                        <form action="{{ url('/report/' . $post->id) }}"
                              method="GET">

                            <button type="submit"
                                    class="btn btn-danger">
                                通報
                            </button>

                        </form>

                    </div>

                    {{-- 店舗名 --}}
<p class="mb-3">
    <strong>店舗名：</strong>
    {{ $post->user->name }}
</p>

{{-- 住所 --}}
<p class="mb-3">
    <strong>住所：</strong>
    {{ $post->address }}
</p>


                    {{-- ③金額 --}}
                    <p class="mb-3">
                        <strong>金額：</strong>
                        {{ number_format($post->price) }}円
                    </p>


                    {{-- ④予約可能日 --}}
                    <p class="mb-3">
                        <strong>予約可能日：</strong>
                        {{ $post->reserve_date }}以降
                    </p>


                    {{-- ⑤予約可能人数 --}}
                    <p class="mb-4">
                        <strong>予約可能人数：</strong>
                        {{ $post->max_people }}人
                    </p>


                    {{-- ⑧予約 --}}
                    <div class="text-end">

                        @if($isBooked)

                            <button type="button"
                                    class="btn btn-secondary"
                                    disabled>
                                予約済み
                            </button>

                        @else

                            <a href="{{ url('/booking/' . $post->id) }}"
                               class="btn btn-primary">
                                予約
                            </a>

                        @endif

                    </div>

                </div>

            </div>


            {{-- ⑥内容 --}}
            <div class="row mt-4">

                <div class="col-12">
                     <h3 class="mb-3">
                            内容
                        </h3>

                    <div class="border p-4">

                       

                        <p class="mb-0">
                            {{ $post->content }}
                        </p>

                    </div>

                </div>

            </div>

        </div>
        <div class="d-flex justify-content-end mb-3 me-3">
        <a href="{{ auth()->check() ? route('home') : route('top') }}"
   class="btn btn-secondary">
    ホームへ戻る
</a>
    </div>


    </div>


</div>


<script>
document.getElementById('bookmark-form').addEventListener('submit', function(e) {

    // 通常のフォーム送信を止める
    e.preventDefault();

    const form = this;
    const button = document.getElementById('bookmark-button');

    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {

        if (data.bookmarked) {
            button.textContent = 'ブックマーク済み';
        } else {
            button.textContent = 'ブックマーク';
        }

    })
    .catch(error => {
        console.error('エラー:', error);
    });

});
</script>
@endsection