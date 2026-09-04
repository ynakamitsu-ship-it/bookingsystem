@extends('layouts.app')

@section('content')
<div class="card-header">
    メールアドレスの確認
</div>

<div class="card-body">

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            確認用のリンクをメールアドレスに送信しました。
        </div>
    @endif

    <p>
        続行する前に、メールアドレスに届いた確認リンクをクリックしてください。
    </p>

    <p>
        メールが届いていない場合
    </p>

    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf

        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
            こちらをクリックして再送信してください
        </button>
    </form>

</div>
@endsection
