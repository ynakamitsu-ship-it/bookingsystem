@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header text-center">
            削除確認
        </div>

        <div class="card-body">

            <div class="row">

                {{-- ユーザー情報 --}}
                <div class="col-md-8">

                    {{-- アイコン --}}
                    <div class="text-center mb-4">

                        @if($user->icon)
                            <img src="{{ asset('storage/' . $user->icon) }}"
                                 alt="アイコン"
                                 style="width: 80px; height: 80px; object-fit: cover;">
                        @else
                            <div class="border d-inline-flex align-items-center justify-content-center"
                                 style="width: 80px; height: 80px;">
                                アイコン
                            </div>
                        @endif

                    </div>

                    {{-- ユーザー名 --}}
                    <div class="mb-3">
                        <label class="fw-bold">
                            ユーザ名
                        </label>

                        <div class="border p-2">
                            {{ $user->name }}
                        </div>
                    </div>

                    {{-- メールアドレス --}}
                    <div class="mb-4">
                        <label class="fw-bold">
                            メールアドレス
                        </label>

                        <div class="border p-2">
                            {{ $user->email }}
                        </div>
                    </div>

                    {{-- 戻る・削除 --}}
                    <div class="row">

                        <div class="col-md-6 mb-2">
                            <a href="{{ route('user_list') }}"
                               class="btn btn-outline-dark w-100">
                                ③戻る
                            </a>
                        </div>

                        <div class="col-md-6 mb-2">

                            <form method="POST"
                                  action="{{ route('delete_user.post', $user->id) }}"
                                  onsubmit="return confirm('このユーザーを削除しますか？');">

                                @csrf

                                <button type="submit"
                                        class="btn btn-danger w-100">
                                    ④削除
                                </button>

                            </form>

                        </div>

                    </div>

                </div>


                {{-- 通報理由 --}}
                <div class="col-md-4">

                    <div class="border p-3 h-100">

                        <h5 class="text-center mb-3">
                            ⑤通報理由
                        </h5>

                        @forelse($reports as $report)

                            <div class="border p-2 mb-2">
                                {{ $report->report_reason }}
                            </div>

                        @empty

                            <p class="text-center text-muted">
                                通報理由はありません。
                            </p>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection