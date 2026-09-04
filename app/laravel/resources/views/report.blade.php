<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>違反報告</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="container mt-5">

    <div class="card mx-auto" style="max-width: 600px;">

        <div class="card-header text-center">
            <h2 class="mb-0">違反報告</h2>
        </div>

        <div class="card-body">

            <form action="{{ route('report.conf', ['id' => $post->id]) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="reason" class="form-label">
                        通報理由
                    </label>

                    <textarea
                        id="reason"
                        name="reason"
                        class="form-control"
                        rows="5"
                        placeholder="通報理由を入力してください"
                    ></textarea>
                </div>

                <div class="d-flex justify-content-center gap-3">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        onclick="history.back()">
                        戻る
                    </button>

                    <button
                        type="submit"
                        class="btn btn-danger">
                        通報
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>