<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>旅館運営用マイページ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1 class="text-center mb-5">旅館運営用マイページ</h1>

    <div class="card p-5">

        <!-- アカウント情報編集 -->
        <div class="text-end mb-4">
            <a href="{{ route('inn_account_edit') }}"
               class="btn btn-primary">
                ① アカウント情報編集
            </a>
        </div>

        <!-- アイコン・ユーザー名 -->
        <div class="text-center mb-5">

            <p>アイコン</p>

            <h2>
                {{ $user->name }}
            </h2>

        </div>

        <!-- 予約確認 -->
        <div class="text-center">

            <a href="{{ route('innbooking_list') }}"
               class="btn btn-primary">
                ② 予約確認
            </a>

        </div>

        <div class="text-center mt-4">
    <a href="{{ route('inn_main') }}" class="btn btn-secondary">
        旅館メインページに戻る
    </a>
</div>

    </div>

</div>

</body>
</html>