@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    {{ __('新規登録') }}
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('register.confirm') }}" novalidate>
                        @csrf

                        {{-- 名前 --}}
                        <div class="row mb-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-end">
                                {{ __('名前') }}
                            </label>

                            <div class="col-md-6">
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name') }}"
                                    autocomplete="name"
                                    autofocus
                                >

                                @error('name')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- メールアドレス --}}
                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">
                                {{ __('メールアドレス') }}
                            </label>

                            <div class="col-md-6">
                                <input
                                    id="email"
                                    type="text"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    autocomplete="email"
                                >

                                @error('email')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
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
                                    autocomplete="new-password"
                                >

                                @error('password')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- パスワード確認 --}}
                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">
                                {{ __('パスワード確認') }}
                            </label>

                            <div class="col-md-6">
                                <input
                                    id="password-confirm"
                                    type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation"
                                    autocomplete="new-password"
                                >

                                @error('password_confirmation')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('新規登録') }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
