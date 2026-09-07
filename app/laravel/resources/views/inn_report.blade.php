<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>違反報告</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <div class="border p-4">

        <h1 class="text-center mb-5">
            違反報告
        </h1>

        <div class="mb-4">
            <h3>通報理由</h3>

            <form method="POST" action="{{ route('inn_report_conf', $booking->id) }}">

                @csrf

                <div class="mb-4">

                    <textarea
                        name="reason"
                        class="form-control"
                        rows="6"
                        placeholder="通報理由を入力してください"
                    ></textarea>

                </div>

                <div class="d-flex justify-content-center gap-4">

                    <a
                        href="{{ route('booking_conf', $booking->id) }}"
                        class="btn btn-secondary px-5"
                    >
                        戻る
                    </a>

                    <button
                        type="submit"
                        class="btn btn-danger px-5"
                    >
                        通報
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>