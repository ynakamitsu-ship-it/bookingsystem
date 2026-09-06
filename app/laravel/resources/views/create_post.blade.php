@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="text-center mb-4">
        新規投稿
    </h1>

<form method="POST" action="{{ route('post.confirm') }}" enctype="multipart/form-data">
    @csrf
        {{-- ① タイトル --}}
        <div class="mb-3">
            <label for="title" class="form-label">
                ① タイトル
            </label>

            <input
                type="text"
                id="title"
                name="title"
                class="form-control"
            >
        </div>

        {{-- ② 画像 --}}
        <div class="mb-3">
            <label for="image" class="form-label">
                ② 画像
            </label>

            <input
                type="file"
                id="image"
                name="image"
                class="form-control"
            >
        </div>
        
        {{-- 住所 --}}
<div class="mb-3">
    <label for="address" class="form-label">
        ③ 住所
    </label>

    <input
        type="text"
        id="address"
        name="address"
        class="form-control"
    >
</div>

        {{-- ③ 金額 --}}
        <div class="mb-3">
            <label for="price" class="form-label">
                ③ 金額
            </label>

            <input
                type="text"
                id="price"
                name="price"
                class="form-control"
            >
        </div>

        {{-- ④ 予約可能日 --}}
        <div class="mb-3">
            <label for="reserve_date" class="form-label">
                ④ 予約可能日
            </label>

            <input
                type="date"
                id="reserve_date"
                name="reserve_date"
                class="form-control"
            >
        </div>

        {{-- ⑤ 予約可能人数 --}}
        <div class="mb-3">
            <label for="max_people" class="form-label">
                ⑤ 予約可能人数
            </label>

            <input
                type="number"
                id="max_people"
                name="max_people"
                class="form-control"
            >
        </div>

        {{-- ⑥ 内容 --}}
        <div class="mb-4">
            <label for="content" class="form-label">
                ⑥ 内容
            </label>

            <textarea
                id="content"
                name="content"
                class="form-control"
                rows="5"
            ></textarea>
        </div>

        {{-- ⑦ 戻る・⑧ 投稿内容確認 --}}
        <div class="d-flex justify-content-center gap-5">

            <a
                href="{{ route('inn_main') }}"
                class="btn btn-outline-secondary px-5"
            >
                ⑦ 戻る
            </a>

            <button
                type="submit"
                class="btn btn-outline-primary px-5"
            >
                ⑧ 投稿内容確認
            </button>

        </div>

    </form>

</div>

@endsection