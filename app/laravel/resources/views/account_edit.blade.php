<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント情報編集</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1 class="text-center mb-5">アカウント情報編集</h1>

    <div class="card p-4">

        <form action="{{ route('account_edit_conf') }}" method="POST" enctype="multipart/form-data">

            @csrf

            {{-- ① アイコン --}}
            <div class="mb-4 text-center">
                <label class="form-label d-block">アイコン</label>

                <input type="file" name="icon" class="form-control">
            </div>

            {{-- ② ユーザ名 --}}
            <div class="mb-4">
                <label class="form-label">ユーザ名</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ auth()->user()->name }}"
                >
            </div>

            {{-- ③ メールアドレス --}}
            <div class="mb-4">
                <label class="form-label">メールアドレス</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ auth()->user()->email }}"
                >
            </div>

            {{-- ④ 戻る --}}
            <div class="d-flex justify-content-center gap-4 mt-5">

                <a href="{{ route('general_mypage') }}"
                   class="btn btn-secondary">
                    戻る
                </a>

                {{-- ⑤ 編集内容確認 --}}
                <button type="submit" class="btn btn-primary">
                    編集内容確認
                </button>

            </div>

        </form>

        {{-- ⑥ アカウント削除 --}}
        <div class="text-end mt-4">

            <a href="{{ route('delete_account') }}"
               class="btn btn-danger">
                アカウント削除
            </a>

        </div>

    </div>

</div>

</body>
</html>