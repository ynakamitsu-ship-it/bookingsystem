@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="text-center mb-5">予約一覧</h1>

    <div class="text-center mt-4 mb-4">
        <a href="{{ route('general_mypage') }}"
           class="btn btn-secondary">
            戻る
        </a>
    </div>

    <div id="mybooking-list"
         data-infinite-scroll
         data-url="{{ route('mybooking_list') }}"
         data-page-name="page">

        @foreach($bookings as $booking)
            @include('partials.mybooking_item', ['booking' => $booking])
        @endforeach

    </div>

</div>

@endsection