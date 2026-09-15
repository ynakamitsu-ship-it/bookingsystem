@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="text-center mb-5">
        ユーザー一覧
    </h2>

    <div class="row">

        {{-- 一般ユーザー --}}
        <div class="col-md-6">
            

            <div class="border p-4 h-100">
               

                <h3 class="text-center mb-4">
                    一般ユーザー一覧
                </h3>

                @forelse($generalUsers as $user)

                    <div class="border p-3 mb-3">

                        <div class="row align-items-center">

                            <div class="col">
                                <h5 class="mb-2">
                                    {{ $user->name }}
                                </h5>

                                <p class="mb-0">
                                    通報件数：
                                    {{ $user->reports_count }}件
                                </p>
                            </div>

                            <div class="col-auto">
                                <a href="{{ route('delete_user', $user->id) }}"
                                    class="btn btn-outline-danger">
                                     削除
                                </a>
                            </div>

                        </div>

                    </div>

                @empty

                    <p class="text-center">
                        一般ユーザーはいません。
                    </p>

                @endforelse

            </div>

        </div>


        {{-- 旅館運営ユーザー --}}
        <div class="col-md-6">

            <div class="border p-4 h-100">

                <h3 class="text-center mb-4">
                    旅館運営ユーザー一覧
                </h3>

                @forelse($innUsers as $user)

                    <div class="border p-3 mb-3">

                        <div class="row align-items-center">

                            <div class="col">
                                <h5 class="mb-2">
                                    {{ $user->name }}
                                </h5>

                                <p class="mb-0">
                                    投稿削除数：
                                    {{ $user->deleted_posts_count }}件
                                </p>
                            </div>

                            <div class="col-auto">
                                <a href="{{ route('delete_user', $user->id) }}"
                                    class="btn btn-outline-danger">
                                     削除
                                </a>
                            </div>

                        </div>

                    </div>

                @empty

                    <p class="text-center">
                        旅館運営ユーザーはいません。
                    </p>

                @endforelse

            </div>

        </div>

    </div>
 <div class="text-center mt-4">
    <a href="{{ route('admin_main') }}" class="btn btn-outline-dark px-5">
        管理者ページに戻る
    </a>
        </div>
</div>

@endsection