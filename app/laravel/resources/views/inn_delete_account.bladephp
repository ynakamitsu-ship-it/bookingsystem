<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>退会確認</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1 class="text-center mb-5">
        退会確認
    </h1>

    <div class="card p-5">

        <div class="mb-4">
            <h5>アイコン</h5>
            <p>現在のアイコン</p>
        </div>

        <div class="mb-4">
            <h5>ユーザ名</h5>
            <p>{{ $user->name }}</p>
        </div>

        <div class="mb-4">
            <h5>メールアドレス</h5>
            <p>{{ $user->email }}</p>
        </div>

        <div class="d-flex justify-content-center gap-3">

            <a href="{{ route('inn_account_edit') }}"
               class="btn btn-secondary">
                ④ 戻る
            </a>

            <form action="{{ route('inn_delete_account_post') }}"
                  method="POST">

                @csrf

                <button type="submit"
                        class="btn btn-danger">
                    ⑤ 削除
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>