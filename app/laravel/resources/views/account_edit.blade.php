@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="card p-4">

        <form action="{{ route('account_edit_conf') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- アイコン --}}
            <div class="mb-4">
                <label class="form-label">アイコン</label>

                @if(auth()->user()->icon)
                    <div class="mb-2">
                        <img
                            src="{{ asset('storage/' . auth()->user()->icon) }}"
                            alt="現在のアイコン"
                            style="width: 100px; height: 100px; object-fit: cover;"
                            class="rounded-circle"
                        >
                    </div>
                @endif

                <input
                    type="file"
                    name="icon"
                    class="form-control"
                >

                @error('icon')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            {{-- ユーザ名 --}}
            <div class="mb-4">
                <label class="form-label">ユーザ名</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', auth()->user()->name) }}"
                >

                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            {{-- メールアドレス --}}
            <div class="mb-4">
                <label class="form-label">メールアドレス</label>

                <input
                    type="text"
                    name="email"
                    class="form-control"
                    value="{{ old('email', auth()->user()->email) }}"
                >

                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            {{-- ボタン --}}
            <div class="d-flex justify-content-center gap-4 mt-5">

                <a
                    href="{{ route('general_mypage') }}"
                    class="btn btn-secondary"
                >
                    戻る
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    編集内容確認
                </button>

            </div>

        </form>


        {{-- アカウント削除 --}}
        <div class="text-end mt-4">
            <a
                href="{{ route('delete_account') }}"
                class="btn btn-danger"
            >
                アカウント削除
            </a>
        </div>

    </div>
</div>

@endsection