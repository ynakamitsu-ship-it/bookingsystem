<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>予約一覧</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1 class="text-center mb-5">
        予約一覧
    </h1>

     {{-- マイページに戻る --}}
    <div class="text-center mt-4 mb-4">

        <a href="{{ route('inn_mypage') }}"
           class="btn btn-secondary">
            マイページに戻る
        </a>

    </div>

   <div id="booking-list"
    data-infinite-scroll
    data-url="{{ route('innbooking_list') }}"
    data-page-name="page">

    @foreach($bookings as $booking)

        @include('partials.innbooking_item', ['booking' => $booking])

    @endforeach

</div>

   

</div>
@vite('resources/js/infinite-scroll.js')
</body>
</html>