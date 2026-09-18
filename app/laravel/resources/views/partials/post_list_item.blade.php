

<div class="card mb-3">
    <div class="row align-items-center">

        {{-- 画像 --}}
        <div class="col-md-3 text-center">
            @if ($post->image_path)
                <img
                    src="{{ asset('storage/' . $post->image_path) }}"
                    class="img-fluid"
                    alt="{{ $post->title }}"
                >
            @else
                <p>画像なし</p>
            @endif
        </div>

        {{-- 旅館情報 --}}
        <div class="col-md-7">

            <h2>{{ $post->title }}</h2>

            <p>
                店舗名：{{ $post->user->name }}
            </p>

            <p>
                住所：{{ $post->address }}
            </p>

            <p>
                金額：{{ number_format($post->price) }}円
            </p>

            <p>
                予約可能日：{{ $post->reserve_date }}以降
            </p>

            <p>内容：{{ $post->content }}</p>

           
        </div>

        {{-- 通報件数・詳細 --}}
<div class="col-md-2 text-center">

    <p class="mb-3">
        通報件数：{{ $post->reports_count }}件
    </p>

    <a
        href="{{ route('delete_post', $post->id) }}"
        class="btn btn-primary"
    >
        詳細
    </a>

</div>

    </div>
</div>
