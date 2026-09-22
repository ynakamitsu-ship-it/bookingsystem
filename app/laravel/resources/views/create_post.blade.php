@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="text-center mb-4">
        新規投稿
    </h1>
    <p class="text-danger text-center mb-4">※は必須入力です</p>

<form method="POST" action="{{ route('post.confirm') }}" enctype="multipart/form-data">
    @csrf
        {{-- ① タイトル --}}
       <div class="mb-3">
    <label for="title" class="form-label">
        タイトル<span class="text-danger">※</span>
    </label>

    <input
        type="text"
        id="title"
        name="title"
        class="form-control"
        value="{{ old('title') }}"
    >

    @error('title')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>

        {{-- ② 画像 --}}
        <div class="mb-3">
            <label for="image" class="form-label">
                画像
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
        住所<span class="text-danger">※</span>
    </label>

    <input
        type="text"
        id="address"
        name="address"
        class="form-control"
        value="{{ old('address') }}"
    >

    @error('address')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>

        {{-- ③ 金額 --}}
        <div class="mb-3">
    <label for="price" class="form-label">
        金額<span class="text-danger">※</span>
    </label>

    <input
        type="text"
        id="price"
        name="price"
        class="form-control"
        value="{{ old('price') }}"
    >

    @error('price')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>

        {{-- ④ 予約可能日 --}}
        <div class="mb-3">
    <label for="reserve_date" class="form-label">
        予約可能日<span class="text-danger">※</span>
    </label>

    <input
        type="date"
        id="reserve_date"
        name="reserve_date"
        class="form-control"
        value="{{ old('reserve_date') }}"
    >

    @error('reserve_date')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>

        {{-- ⑤ 予約可能人数 --}}
        <div class="mb-3">
    <label for="max_people" class="form-label">
        予約可能人数<span class="text-danger">※</span>
    </label>

    <input
        type="number"
        id="max_people"
        name="max_people"
        class="form-control"
        value="{{ old('max_people') }}"
    >

    @error('max_people')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>

        {{-- ⑥ 内容 --}}
        <div class="mb-4">
    <label for="content" class="form-label">
        内容<span class="text-danger">※</span>
    </label>

    <textarea
        id="content"
        name="content"
        class="form-control"
        rows="5"
    >{{ old('content') }}</textarea>

    @error('content')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>

        {{-- ⑦ 戻る・⑧ 投稿内容確認 --}}
        <div class="d-flex justify-content-center gap-5">

            <a
                href="{{ route('inn_main') }}"
                class="btn btn-outline-secondary px-5"
            >
                戻る
            </a>

            <button
                type="submit"
                class="btn btn-outline-primary px-5"
            >
                投稿内容確認
            </button>

        </div>

    </form>

</div>

@endsection