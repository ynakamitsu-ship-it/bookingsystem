@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="text-center mb-5">
        ユーザー一覧
    </h2>
<div class="text-center mt-4 mb-4">
    <a href="{{ route('admin_main') }}" class="btn btn-outline-dark px-5">
        管理者ページに戻る
    </a>
        </div>
    <div class="row">

        {{-- 一般ユーザー --}}
        <div class="col-md-6">
            

            <div class="border p-4 h-100">
               

                <h3 class="text-center mb-4">
                    一般ユーザー一覧
                </h3>
<div id="general-user-list"
     data-infinite-scroll
     data-url="{{ route('user_list') }}"
     data-page-name="general_page"
     data-type="general">

    @forelse($generalUsers as $user)

        @include('partials.general_user_item')

    @empty

        <p class="text-center">
            一般ユーザーはいません。
        </p>

    @endforelse

</div>
            </div>

        </div>


        {{-- 旅館運営ユーザー --}}
        <div class="col-md-6">

            <div class="border p-4 h-100">

                <h3 class="text-center mb-4">
                    旅館運営ユーザー一覧
                </h3>

                <div id="inn-user-list"
     data-infinite-scroll
     data-url="{{ route('user_list') }}"
     data-page-name="inn_page"
     data-type="inn">

    @forelse($innUsers as $user)

        @include('partials.inn_user_item')

    @empty

        <p class="text-center">
            旅館運営ユーザーはいません。
        </p>

    @endforelse

</div>


            </div>

        </div>

    </div>
 
</div>

@endsection