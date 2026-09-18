@foreach ($bookmarks as $bookmark)

    <div class="card mb-3">
        <div class="card-body">

            <div class="row align-items-center">

                {{-- 左：画像 --}}
                <div class="col-md-3 text-center">

                    @if($bookmark->post->image_path)

                        <img
                            src="{{ asset('storage/' . $bookmark->post->image_path) }}"
                            class="img-fluid"
                            style="width: 180px; height: 130px; object-fit: cover;"
                            alt="投稿画像"
                        >

                    @else

                        <div class="border d-flex align-items-center justify-content-center"
                             style="width: 180px; height: 130px; margin: auto;">
                            画像なし
                        </div>

                    @endif

                </div>


                {{-- 中央：投稿情報 --}}
                <div class="col-md-7">

                    <h4 class="mb-3">
                        {{ $bookmark->post->title }}
                    </h4>

                    <p class="mb-2">
                        <strong>店舗名：</strong>
                        {{ $bookmark->post->user->name }}
                    </p>

                    <p class="mb-0">
                        <strong>住所：</strong>
                        {{ $bookmark->post->address }}
                    </p>

                </div>


                {{-- 右：詳細ボタン --}}
                <div class="col-md-2 text-center">

                    <a href="{{ route('post', $bookmark->post_id) }}"
                       class="btn btn-primary">
                        詳細
                    </a>

                </div>

            </div>

        </div>
    </div>

@endforeach