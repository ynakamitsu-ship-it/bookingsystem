@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header text-center">
                    サインアップ完了
                </div>

                <div class="card-body text-center py-5">

                    <h2 class="mb-5">
                        新規登録が完了しました
                    </h2>

                    <a href="{{ route('inn_main') }}"
                       class="btn btn-primary">
                        ホーム画面へ
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection