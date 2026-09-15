@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header text-center">
                    利用停止
                </div>

                <div class="card-body text-center">

                    <h4 class="mb-5">
                        このアカウントは利用停止されている為、<br>
                        利用することができません。
                    </h4>

                    <a href="{{ route('login') }}">
                        ログイン画面へ
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection