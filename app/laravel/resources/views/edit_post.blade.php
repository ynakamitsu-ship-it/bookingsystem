@extends('layouts.app')

@section('content')
<form action="{{ route('edit_post_conf', $post->id) }}" method="POST">
    @csrf
<div class="container mt-5">

    {{-- タイトル --}}
    <h1 class="text-center mb-5">
        投稿内容編集
    </h1>

    <div class="card p-4">

        {{-- 上段 --}}
        <div class="row">

            {{-- 画像 --}}
            <div class="col-md-5 d-flex align-items-center justify-content-center">
                <div class="border w-100"
                     style="height: 250px;">

                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}"
                             class="img-fluid w-100 h-100"
                             style="object-fit: cover;">
                    @else
                        <div class="d-flex justify-content-center align-items-center h-100">
                            画像
                        </div>
                    @endif

                </div>
            </div>


            {{-- 入力項目 --}}
            <div class="col-md-7">

                {{-- タイトル --}}
                <div class="mb-3">
                    <label class="form-label">
                        タイトル
                    </label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ $post->title }}">
                </div>


                {{-- 画像 --}}
                <div class="mb-3">
                    <label class="form-label">
                        画像
                    </label>

                    <input type="file"
                           name="image"
                           class="form-control">
                </div>


                {{-- 金額 --}}
                <div class="mb-3">
                    <label class="form-label">
                        金額
                    </label>

                    <input type="text"
                           name="price"
                           class="form-control"
                           value="{{ $post->price }}">
                </div>


                {{-- 予約可能日 --}}
                <div class="mb-3">
                    <label class="form-label">
                        予約可能日
                    </label>

                    <input type="date"
                           name="reserve_date"
                           class="form-control"
                           value="{{ $post->reserve_date }}">
                </div>


                {{-- 予約可能人数 --}}
                <div class="mb-3">
                    <label class="form-label">
                        予約可能人数
                    </label>

                    <input type="number"
                           name="max_people"
                           class="form-control"
                           value="{{ $post->max_people }}">
                </div>

            </div>

        </div>


        {{-- 内容 --}}
        <div class="mt-4">

            <label class="form-label">
                内容
            </label>

            <textarea name="content"
                      class="form-control"
                      rows="6">{{ $post->content }}</textarea>

        </div>


        {{-- ボタン --}}
        <div class="d-flex justify-content-center gap-5 mt-4">

            {{-- 戻る --}}
            <a href="{{ route('inn_post', $post->id) }}"
               class="btn btn-outline-secondary px-5">
                戻る
            </a>


            {{-- 編集内容確認 --}}
            <button type="submit"
                class="btn btn-primary px-5">
                    編集内容確認
            </button>

        </div>

    </div>

</div>
</form>
@endsection