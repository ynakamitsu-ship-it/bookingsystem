@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                {{-- ヘッダー --}}
                <div class="card-header text-center">
                    <h3 class="mb-0">パスワード再設定</h3>
                </div>

                <div class="card-body">

                    {{-- メールアドレス入力 --}}
                    <form method="POST"
                          action="{{ route('password.email') }}"
                          novalidate>
                        @csrf

                        <div class="row mb-4">

                            <div class="col-md-6 offset-md-3">

                                <label for="email" class="form-label">
                                    メールアドレス
                                </label>

                                <input
                                    id="email"
                                    type="text"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    autocomplete="email"
                                    autofocus
                                >

                                {{-- バリデーションエラー --}}
                                @error('email')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                        {{-- 説明 --}}
                        <div class="text-center mb-5">

                            <p class="mb-1">
                                ※入力いただいたメールアドレスに、
                            </p>

                            <p class="mb-1">
                                再設定用のURLが届きます。
                            </p>

                            <p>
                                届いたURLから再設定を行って下さい。
                            </p>

                        </div>

                        {{-- 送信ボタン --}}
                        <div class="text-center">

                            <button type="submit"
                                    class="btn btn-primary px-5">
                                送信
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection