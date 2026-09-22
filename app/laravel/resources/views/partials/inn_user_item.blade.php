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
                非表示
            </a>
        </div>

    </div>
</div>