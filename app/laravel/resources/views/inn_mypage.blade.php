@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h1 class="text-center mb-5">旅館運営用マイページ</h1>

    <div class="card p-5">

        <!-- アカウント情報編集 -->
        <div class="text-end mb-4">
            <a href="{{ route('inn_account_edit') }}"
               class="btn btn-primary">
                アカウント情報編集
            </a>
        </div>

        <!-- アイコン・ユーザー名 -->
        <div class="text-center mb-5">

        

@if($user->icon)
    <img src="{{ asset('storage/' . $user->icon) }}"
         alt="アイコン"
         class="rounded-circle mb-3"
         style="width: 100px; height: 100px; object-fit: cover;">
@else
    <p>アイコン未登録</p>
@endif

<h2>
    {{ $user->name }}
</h2>
        </div>

        <!-- 予約確認 -->
        <div class="text-center">

            <a href="{{ route('innbooking_list') }}"
               class="btn btn-primary">
                予約確認
            </a>

        </div>

        <div class="text-center mt-4">
    <a href="{{ route('inn_main') }}" class="btn btn-secondary">
        旅館メインページに戻る
    </a>
</div>

    </div>

</div>

@endsection