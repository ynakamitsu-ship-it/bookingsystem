<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>通報内容確認</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container mt-5">

        <div class="card mx-auto" style="max-width: 600px;">

            <!-- タイトル -->
            <div class="card-header text-center">
                <h2 class="mb-0">通報内容確認</h2>
            </div>

            <!-- 内容 -->
            <div class="card-body">

                <div class="mb-4">
                    <label class="form-label fw-bold">
                        通報理由
                    </label>

                    <div class="border rounded p-3 bg-light">
                        {{ $reason }}
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">
                        通報対象
                    </label>

                    <div class="border rounded p-3 bg-light">
                        {{ $post->title }}
                    </div>
                </div>

                <!-- ボタン -->
                <div class="d-flex justify-content-center gap-3">

                    <a href="{{ url()->previous() }}"
                       class="btn btn-secondary">
                        戻る
                    </a>

                   <form action="{{ route('report_comp', $post->id) }}" method="POST" class="d-inline">
    @csrf

    <input type="hidden" name="reason" value="{{ $reason }}">

    <button type="submit" class="btn btn-danger">
        通報
    </button>

                </div>

            </div>
        </div>

    </div>
</body>
</html>