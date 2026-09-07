<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント情報編集確認</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1 class="text-center mb-5">アカウント情報編集確認</h1>

    <div class="card p-4">

        <div class="mb-4">
            <label class="form-label">ユーザ名</label>
            <p class="form-control">
                {{ $name }}
            </p>
        </div>

        <div class="mb-4">
            <label class="form-label">メールアドレス</label>
            <p class="form-control">
                {{ $email }}
            </p>
        </div>

        <div class="mb-4">
            <label class="form-label">アイコン</label>

            @if($icon)
                <p>新しいアイコンが選択されています</p>
            @else
                <p>変更なし</p>
            @endif
        </div>

        <div class="d-flex justify-content-center gap-4 mt-5">

            {{-- 編集ページに戻る --}}
            <a href="{{ route('account_edit') }}"
               class="btn btn-secondary">
                戻る
            </a>

            {{-- 変更確定 --}}
            <form action="{{ route('account_update') }}" method="POST">
                @csrf

                <input type="hidden" name="name" value="{{ $name }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <button type="submit" class="btn btn-primary">
                    変更を確定
                </button>
            </form>

        </div>

    </div>

</div>

</body>
</html>