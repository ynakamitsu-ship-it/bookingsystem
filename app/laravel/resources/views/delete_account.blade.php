<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>退会確認</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1 class="text-center mb-5">退会確認</h1>

    <div class="card p-4">

        {{-- ① アイコン --}}
        <div class="text-center mb-4">
            @if($user->icon)
                <img src="{{ asset('storage/' . $user->icon) }}"
                     width="100"
                     height="100"
                     style="object-fit: cover;">
            @else
                アイコン
            @endif
        </div>

        {{-- ② ユーザ名 --}}
        <div class="row mb-3">
            <div class="col-md-4 text-end">
                <strong>ユーザ名</strong>
            </div>
            <div class="col-md-8">
                {{ $user->name }}
            </div>
        </div>

        {{-- ③ メールアドレス --}}
        <div class="row mb-4">
            <div class="col-md-4 text-end">
                <strong>メールアドレス</strong>
            </div>
            <div class="col-md-8">
                {{ $user->email }}
            </div>
        </div>

        {{-- ④ 戻る --}}
        <div class="text-center">

            <a href="{{ route('account_edit') }}"
               class="btn btn-secondary me-3">
                戻る
            </a>

            {{-- ⑤ 削除 --}}
            <form action="{{ route('delete_account.post') }}"
                  method="POST"
                  class="d-inline">
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