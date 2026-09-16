let page = 1;
let loading = false;
let hasMore = true;

window.addEventListener('scroll', async () => {

    // まだ下まで来ていなければ何もしない
    if (
        window.innerHeight + window.scrollY
        < document.documentElement.scrollHeight - 200
    ) {
        return;
    }

    // 読み込み中・最後まで読み込み済みなら何もしない
    if (loading || !hasMore) {
        return;
    }

    loading = true;
    page++;

    try {
        const response = await fetch(`${window.location.pathname}?page=${page}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

       const data = await response.json();

// 投稿HTMLを追加
const container = document.querySelector('#post-list');

if (container && data.html) {
    container.insertAdjacentHTML('beforeend', data.html);
}

// 次のページがあるか確認
hasMore = data.hasMore;

    } catch (error) {
        console.error('投稿の読み込みに失敗しました。', error);
    } finally {
        loading = false;
    }
});