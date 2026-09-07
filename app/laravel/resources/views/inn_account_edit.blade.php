<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アカウント情報編集</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1 class="text-center mb-5">
        アカウント情報編集
    </h1>

    <div class="card p-5">

        <form action="{{ route('inn_account_edit_conf') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <!-- アイコン -->
            <div class="mb-4">
                <label class="form-label">アイコン</label>

                <input type="file"
                       name="icon"
                       class="form-control">
            </div>

            <!-- ユーザ名 -->
            <div class="mb-4">
                <label class="form-label">ユーザ名</label>

                <input type="text"
                       name="name"
                       value="{{ $user->name }}"
                       class="form-control">
            </div>

            <!-- メールアドレス -->
            <div class="mb-4">
                <label class="form-label">メールアドレス</label>

                <input type="email"
                       name="email"
                       value="{{ $user->email }}"
                       class="form-control">
            </div>

            <div class="d-flex justify-content-between mt-5">

                <!-- 戻る -->
                <a href="{{ route('inn_mypage') }}"
                   class="btn btn-secondary">
                    ④ 戻る
                </a>

                <!-- 編集内容確認 -->
                <button type="submit"
                        class="btn btn-primary">
                    ⑤ 編集内容確認
                </button>

            </div>

        </form>

        <!-- アカウント削除 -->
        <div class="text-end mt-4">

            <a href="{{ route('inn_delete_account') }}"
               class="btn btn-danger">
                ⑥ アカウント削除
            </a>

        </div>

    </div>

</div>

</body>
</html>