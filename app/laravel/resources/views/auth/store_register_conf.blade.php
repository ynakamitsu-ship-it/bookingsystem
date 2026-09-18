@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                
                <div class="card-body text-center py-4">

                    <h2 class="mb-5">
                        店舗アカウント登録内容確認
                    </h2>

                    <p class="mb-4">
                        店舗名：{{ $store_name }}
                    </p>

                    <p class="mb-4">
                        メールアドレス：{{ $email }}
                    </p>

                    <p class="mb-5">
                        パスワード：{{ $password }}
                    </p>

                    <form method="POST" action="{{ route('store-register.store') }}">
                        @csrf

                        <input type="hidden" name="store_name" value="{{ $store_name }}">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="password" value="{{ $password }}">

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