@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                {{-- ログイン --}}
                <div class="card-header text-center">
                    <h2 class="mb-0">
                        {{ __('ログイン') }}
                    </h2>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- ①メールアドレス入力 --}}
                        <div class="mb-4 text-center">

                            <label for="email" class="form-label">
                                メールアドレス入力
                            </label>
                        <div class="col-md-8 mx-auto">
                            <input
                                id="email"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                autofocus
                            >

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>


                        {{-- ②パスワード入力 --}}
                        <div class="mb-3 text-center">

                            <label for="password" class="form-label">
                                パスワード入力
                            </label>
                    <div class="col-md-8 mx-auto">
                            <input
                                id="password"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                required
                                autocomplete="current-password"
                            >

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

<div class="d-flex justify-content-center mb-3">
    <div class="form-check">
        <input
            class="form-check-input"
            type="checkbox"
            name="remember"
            id="remember"
            {{ old('remember') ? 'checked' : '' }}
        >

        <label class="form-check-label" for="remember">
            ログイン状態を維持する
        </label>
    </div>
</div>
                    
                        {{-- ③パスワードを忘れた場合 --}}
                        @if (Route::has('password.request'))

                            <div class="text-center mb-4">

                                <a
                                    class="btn btn-link"
                                    href="{{ route('password.request') }}"
                                >
                                    ※パスワードを忘れた方
                                </a>

                            </div>

                        @endif


                        {{-- ログインボタン --}}
                        <div class="row mb-4">

                            <div class="col-md-6 offset-md-3 text-center">

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    ログイン
                                </button>

                            </div>

                        </div>


                        {{-- 新規登録 --}}
                        <div class="row mt-3">

                            <div class="col-md-6 text-center">

                                <a
                                    href="{{ route('register') }}"
                                    class="btn btn-link"
                                >
                                    新規登録はこちら
                                </a>

                            </div>


                            {{-- 新規店舗アカウント登録 --}}
                            <div class="col-md-6 text-center">

                                <a
                                    href="{{ route('store.register') }}"
                                    class="btn btn-link"
                                >
                                    新規店舗アカウント登録はこちら
                                </a>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
