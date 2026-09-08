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

                    <h2 class="mb-5">
                        パスワード再設定が完了しました
                    </h2>

                    <a href="{{ route('login') }}" class="btn btn-primary">
                        ログイン画面へ
                    </a>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection