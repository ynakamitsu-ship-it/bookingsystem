@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header text-center">
            投稿削除
        </div>

        <div class="card-body">

            <div class="row">

                {{-- 投稿情報 --}}
                <div class="col-md-8">

                    {{-- タイトル --}}
                    <div class="mb-4">
                        <label class="fw-bold">
                            タイトル
                        </label>

                        <div class="border p-2">
                            {{ $post->title }}
                        </div>
                    </div>


                    {{-- 画像 --}}
                    <div class="text-center mb-4">

                        @if($post->image_path)

                            <img
                                src="{{ asset('storage/' . $post->image_path) }}"
                                alt="投稿画像"
                                style="width: 200px; height: 150px; object-fit: cover;"
                            >

                        @else

                            <div
                                class="border d-inline-flex align-items-center justify-content-center"
                                style="width: 200px; height: 150px;"
                            >
                                画像
                            </div>

                        @endif

                    </div>


                    {{-- 金額 --}}
                    <div class="mb-4">
                        <label class="fw-bold">
                            金額
                        </label>

                        <div class="border p-2">
                            {{ $post->price }}円
                        </div>
                    </div>


                    {{-- 予約可能日 --}}
                    <div class="mb-4">
                        <label class="fw-bold">
                            予約可能日
                        </label>

                        <div class="border p-2">
                            {{ $post->reserve_date }}
                        </div>
                    </div>


                    {{-- 予約可能人数 --}}
                    <div class="mb-4">
                        <label class="fw-bold">
                            予約可能人数
                        </label>

                        <div class="border p-2">
                            {{ $post->max_people }}人
                        </div>
                    </div>


                    {{-- 内容 --}}
                    <div class="mb-4">
                        <label class="fw-bold">
                            内容
                        </label>

                        <div class="border p-3" style="min-height: 120px;">
                            {{ $post->content }}
                        </div>
                    </div>

                </div>


                {{-- 通報理由 --}}
                <div class="col-md-4">

                    <div class="border p-3 h-100">

                        <h5 class="text-center mb-4">
                            通報理由
                        </h5>

                        @forelse($reports as $report)

                            <div class="border p-2 mb-2">
                                {{ $report->report_reason }}
                            </div>

                        @empty

                            <p class="text-center text-muted">
                                通報理由はありません。
                            </p>

                        @endforelse

                    </div>

                </div>

            </div>


            {{-- 戻る・削除 --}}
            <div class="row mt-4">

                <div class="col-md-6 mb-2">

                    <a
                        href="{{ route('post_list') }}"
                        class="btn btn-outline-dark w-100"
                    >
                        戻る
                    </a>

                </div>


                <div class="col-md-6 mb-2">

                    <form
                        method="POST"
                        action="{{ route('delete_post.post', $post->id) }}"
                        onsubmit="return confirm('この投稿を削除しますか？');"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-danger w-100"
                        >
                            投稿削除
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection