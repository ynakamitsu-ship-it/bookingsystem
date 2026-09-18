@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="card mx-auto" style="max-width: 600px;">

        {{-- タイトル --}}
        <div class="card-header text-center">
            <h2 class="mb-0">通報内容確認</h2>
        </div>

        {{-- 内容 --}}
        <div class="card-body">

            {{-- 通報理由 --}}
            <div class="mb-4">
                <label class="form-label fw-bold">
                    通報理由
                </label>

                <div class="border rounded p-3 bg-light">
                    {{ $reason }}
                </div>
            </div>

            {{-- 通報対象 --}}
            <div class="mb-4">
                <label class="form-label fw-bold">
                    通報対象
                </label>

                <div class="border rounded p-3 bg-light">
                    {{ $booking->name }}
                </div>
            </div>

            {{-- ボタン --}}
            <div class="d-flex justify-content-center gap-3">

                {{-- 戻る --}}
                <a href="{{ route('inn_report', $booking->id) }}"
                   class="btn btn-secondary">
                    戻る
                </a>

                {{-- 通報 --}}
                <form action="{{ route('inn_report_comp', $booking->id) }}"
                      method="POST">

                    @csrf

                    <input type="hidden"
                           name="reason"
                           value="{{ $reason }}">

                    <button type="submit"
                            class="btn btn-danger">
                        通報
                    </button>

                </form>

            </div>

        </div>
    </div>

</div>

@endsection
