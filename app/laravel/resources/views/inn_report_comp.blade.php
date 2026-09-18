@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="border p-4">

        <!-- ヘッダー -->
        <div class="mb-4">
            <h1 class="text-center">通報が完了しました</h1>
        </div>

        

        <!-- ボタン -->
        <div class="d-flex justify-content-center">
            <a href="{{ route('innbooking_list') }}"
               class="btn btn-primary px-5">
                予約一覧へ
            </a>
        </div>

    </div>

</div>

@endsection