<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>予約一覧</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1 class="text-center mb-5">
        予約一覧
    </h1>

    @foreach($bookings as $booking)

        <div class="card p-4 mb-4">

            <h4>{{ $booking->name }}</h4>

            <p>
                電話番号：{{ $booking->tel }}
            </p>

            <p>
                チェックイン：
                {{ $booking->checkin_date }}
            </p>

            <p>
                チェックアウト：
                {{ $booking->checkout_date }}
            </p>

            <a href="#"
               class="btn btn-primary">
                ① 確認
            </a>

        </div>

    @endforeach

    <div class="text-center mt-4">

        <a href="{{ route('inn_mypage') }}"
           class="btn btn-secondary">
            マイページに戻る
        </a>

    </div>

</div>

</body>
</html>