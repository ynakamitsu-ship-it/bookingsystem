<div class="card mb-3">
    <div class="card-body">

        {{-- 旅館名 --}}
        <h5 class="card-title">
            {{ $post->title }}
        </h5>

        {{-- 住所 --}}
        <p class="card-text">
            {{ $post->address }}
        </p>

        {{-- 予約可能日 --}}
        <p class="card-text">
            <small class="text-muted">
                予約可能日：
                {{ $post->reserve_date }}
            </small>
        </p>

        <a href="{{ route('inn_post', ['id' => $post->id]) }}"
           class="btn btn-outline-primary">
            投稿詳細
        </a>

    </div>
</div>