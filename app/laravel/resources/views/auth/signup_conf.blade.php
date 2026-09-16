@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

              

                <div class="card-body text-center">

                    <h2 class="mb-5">新規登録内容確認</h2>

                    <p class="mb-4">
                        ユーザー名：
                        <span>{{ $name }}</span>
                    </p>

                    <p class="mb-4">
                        メールアドレス：
                        <span>{{ $email }}</span>
                    </p>

                    <p class="mb-5">
                        パスワード：
                        <span>{{ $password }}</span>
                    </p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <input type="hidden" name="name" value="{{ $name }}">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="password" value="{{ $password }}">
                        <input type="hidden" name="password_confirmation" value="{{ $password }}">

                        <button type="submit" class="btn btn-primary">
                            登録
                        </button>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>

@endsection