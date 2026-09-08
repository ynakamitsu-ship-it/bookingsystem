@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    パスワード再設定
                </div>

                <div class="card-body text-center">

                    <h2 class="mb-4">メールを送信しました</h2>

                    <p>
                        入力されたメールアドレスに
                        <br>
                        パスワード再設定用のURLを送信しました。
                    </p>

                    <p class="mt-4">
                        メールをご確認いただき、
                        <br>
                        メールに記載されたURLから
                        <br>
                        パスワードを再設定してください。
                    </p>

                    <a href="{{ route('login') }}" class="btn btn-primary mt-3">
                        ログイン画面へ
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection