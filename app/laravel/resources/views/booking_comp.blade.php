@extends('layouts.app')

@section('content')

<div class="container">

 

    <!-- 予約完了内容 -->
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="border border-top-0 text-center py-5">

                <h1 class="mb-5">
                    予約が完了しました
                </h1>

                <a href="{{ url('/home') }}"
                   class="btn btn-primary px-4">
                    メインページへ
                </a>

            </div>

        </div>
    </div>

</div>

@endsection