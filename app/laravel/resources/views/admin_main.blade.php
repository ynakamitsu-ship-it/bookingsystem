@extends('layouts.app')

@section('content')

<div class="container">

    <div class="text-center mb-5">
      

        <h3>{{ auth()->user()->name }}</h3>
    </div>

    <div class="row justify-content-center">

        <div class="col-md-4 mb-3">
           <a href="{{ route('user_list') }}" class="btn btn-outline-dark w-100 py-4">
                  ユーザー一覧
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="{{ route('post_list') }}" class="btn btn-outline-dark w-100 py-4">
                 投稿一覧
            </a>
        </div>

    </div>

</div>

@endsection