@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- ページタイトル --}}
    <h1 class="mb-4">マイページ</h1>

    {{-- ユーザー情報 --}}
    <div class="card mb-4">
        <div class="card-body">

            <div class="row align-items-center">

                {{-- アイコン --}}
                <div class="col-md-3 text-center">

                         @if (auth()->user()->icon)
                        <img src="{{ asset('storage/' . auth()->user()->icon) }}"
                            alt="アイコン"
                            class="rounded-circle"
                            style="width: 100px; height: 100px; object-fit: cover;">
                     @else
                            <div class="border rounded-circle mx-auto d-flex align-items-center justify-content-center"
                          style="width: 100px; height: 100px;">
                             アイコン
                         </div>
                         @endif

                            </div>

                {{-- ユーザー名 --}}
                <div class="col-md-9">
                    <h2 class="h4 mb-3">
                        {{ Auth::user()->name }}
                    </h2>

                    <a href="{{ route('account_edit') }}"
                       class="btn btn-primary">
                        アカウント情報編集
                    </a>
                </div>

            </div>

        </div>
    </div>


    {{-- メニュー --}}
    <div class="row g-3">

        {{-- 予約確認 --}}
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="h5">予約</h2>

                    <a href="{{ route('mybooking_list') }}"
                       class="btn btn-outline-primary">
                        予約確認
                    </a>
                </div>
            </div>
        </div>


        {{-- ブックマーク一覧 --}}
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="h5">ブックマーク</h2>

                    <a href="{{ route('bookmark_list') }}"
                       class="btn btn-outline-primary">
                        ブックマーク一覧
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
    <a href="{{ route('home') }}" class="btn btn-secondary">
        ホームへ戻る
    </a>
</div>

    </div>

</div>

@endsection