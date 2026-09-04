@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card">

                <div class="card-header text-center">
                    {{ __('ログイン') }}
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- メールアドレス --}}
                        <div class="row mb-3">

                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">
                                {{ __('メールアドレス') }}
                            </label>

                            <div class="col-md-6">

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

                        {{-- パスワード --}}
                        <div class="row mb-3">

                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">
                                {{ __('パスワード') }}
                            </label>

                            <div class="col-md-6">

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

                        {{-- ログイン状態を保持 --}}
                        <div class="row mb-3">

                            <div class="col-md-6 offset-md-4">

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="remember"
                                        id="remember"
                                        {{ old('remember') ? 'checked' : '' }}
                                    >

                                    <label class="form-check-label" for="remember">
                                        {{ __('ログイン状態を保持') }}
                                    </label>

                                </div>

                            </div>
                        </div>
                        {{-- パスワードを忘れた場合 --}}
                        @if (Route::has('password.request'))

                            <div class="text-center mt-3">

                                <a class="btn btn-link"
                                    href="{{ route('password.request') }}">
                                    {{ __('パスワードを忘れた方はこちら') }}
                                </a>

                            </div>

                        @endif

                        {{-- ログインボタン --}}
                        <div class="row mb-0">

                            <div class="col-md-8 offset-md-4">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('ログイン') }}
                                </button>

                            </div>
                        </div>

                       

                        {{-- 新規アカウント登録 --}}
                        <div class="text-center mt-2">

                            <a href="{{ route('register') }}"
                                class="btn btn btn-link">
                                {{ __('新規アカウント登録') }}
                            </a>

                        </div>

                        {{-- 新規店舗アカウント登録 --}}
                        <div class="text-center mt-2">

                            <a href="{{ route('store.register') }}"
                                class="btn btn-link">
                                {{ __('新規店舗アカウント登録はこちら') }}
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
