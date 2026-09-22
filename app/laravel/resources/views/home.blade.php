@extends('layouts.app')

@section('content')

<div class="container">


    
<form method="GET" action="{{ url('/home') }}" class="mb-4">

    <div class="row align-items-center g-3">

        {{-- ① ワード検索 --}}
        <div class="col-md-3">
            <label class="form-label">&nbsp;</label>
             <input
            type="text"
            name="keyword"
            class="form-control"
            placeholder="タイトル・住所・内容を検索"
            value="{{ request('keyword') }}">
        </div>

        {{-- 開始日 --}}
<div class="col-md-2">
    <label class="form-label">チェックイン</label>
    <input
        type="date"
        name="start_date"
        class="form-control"
        value="{{ request('start_date') }}">
</div>

<div class="col-auto px-1">
    <label class="form-label">&nbsp;</label>
    <div class="form-control border-0 px-0">
        ～
    </div>
</div>

{{-- 終了日 --}}
<div class="col-md-2">
    <label class="form-label">チェックアウト</label>
    <input
        type="date"
        name="end_date"
        class="form-control"
        value="{{ request('end_date') }}">
</div>
{{-- 金額 --}}
<div class="col-auto">
    <label class="form-label">&nbsp;</label>
    <select name="price" class="form-control" style="width: 160px;">
        <option value="">金額</option>

        <option value="10000" {{ request('price') == '10000' ? 'selected' : '' }}>
            1万円未満
        </option>

        <option value="10000-20000" {{ request('price') == '10000-20000' ? 'selected' : '' }}>
            1万円～2万円
        </option>

        <option value="20000-30000" {{ request('price') == '20000-30000' ? 'selected' : '' }}>
            2万円～3万円
        </option>

        <option value="30000-" {{ request('price') == '30000-' ? 'selected' : '' }}>
            3万円以上
        </option>
    </select>
</div>

        {{-- ④ 検索 --}}
       <div class="col-md-2">
    <label class="form-label">&nbsp;</label>
    <div>
        <button type="submit" class="btn btn-primary">
            検索
        </button>
    </div>
</div>
    </div>

</form>
    {{-- 旅館一覧 --}}
<div
    id="post-list"
    data-infinite-scroll
    data-url="{{ route('home') }}"
    data-page-name="page"
>
    @include('partials.welcome_post_item', [
    'posts' => $posts
])
</div>

</div>

@endsection