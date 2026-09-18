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

    @if($user->icon)
        <img src="{{ asset('storage/' . $user->icon) }}"
             alt="現在のアイコン"
             width="100"
             height="100"
             style="object-fit: cover; border-radius: 50%;">
    @else
        <p>アイコン未設定</p>
    @endif
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
                戻る
            </a>

            <form action="{{ route('inn_delete_account_post') }}"
                  method="POST">

                @csrf

                <button type="submit"
                        class="btn btn-danger">
                    削除
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>