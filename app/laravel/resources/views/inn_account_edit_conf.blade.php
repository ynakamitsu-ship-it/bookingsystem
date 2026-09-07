<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アカウント情報編集確認</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1 class="text-center mb-5">
        アカウント情報編集確認
    </h1>

    <div class="card p-5">

        <div class="mb-4">
            <h5>ユーザ名</h5>
            <p>{{ $name }}</p>
        </div>

        <div class="mb-4">
            <h5>メールアドレス</h5>
            <p>{{ $email }}</p>
        </div>

        <div class="mb-4">
            <h5>アイコン</h5>

            @if($icon)
                <p>変更あり</p>
            @else
                <p>変更なし</p>
            @endif
        </div>

        <div class="d-flex justify-content-center gap-3">

            <a href="{{ route('inn_account_edit') }}"
               class="btn btn-secondary">
                戻る
            </a>

            <form action="{{ route('inn_account_update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <input type="hidden"
                       name="name"
                       value="{{ $name }}">

                <input type="hidden"
                       name="email"
                       value="{{ $email }}">

                <button type="submit"
                        class="btn btn-primary">
                    変更を確定
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>