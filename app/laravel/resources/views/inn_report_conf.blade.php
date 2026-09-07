@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="border p-4">

        <!-- ヘッダー -->
        <div class="mb-4">
            <h1 class="text-center">通報内容確認</h1>
        </div>

        <!-- 通報内容 -->
        <div class="d-flex justify-content-center mb-4">
            <div class="border p-4" style="width: 320px; min-height: 150px;">

                <p class="mb-2">① 通報理由</p>

                <div>
                    {{ $reason }}
                </div>

            </div>
        </div>

        <!-- ボタン -->
        <div class="d-flex justify-content-center gap-4">

            <!-- 戻る -->
            <a
                href="{{ route('inn_report', $booking->id) }}"
                class="btn btn-secondary px-5"
            >
                戻る
            </a>

            <!-- 確認 -->
            <form
                method="POST"
                action="{{ route('inn_report_comp', $booking->id) }}"
            >
                @csrf

                <input
                    type="hidden"
                    name="reason"
                    value="{{ $reason }}"
                >

                <button
                    type="submit"
                    class="btn btn-primary px-5"
                >
                    確認
                </button>

            </form>

        </div>

    </div>

</div>

@endsection
