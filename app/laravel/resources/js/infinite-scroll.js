document.addEventListener('DOMContentLoaded', () => {

    const containers = document.querySelectorAll('[data-infinite-scroll]');

    containers.forEach((targetContainer) => {

        let page = 1;
        let loading = false;
        let hasMore = true;

        const url = targetContainer.dataset.url;
        const pageName = targetContainer.dataset.pageName || 'page';
        const type = targetContainer.dataset.type || '';

        window.addEventListener('scroll', async () => {

            // まだページ下部まで来ていなければ何もしない
            if (
                window.innerHeight + window.scrollY <
                document.documentElement.scrollHeight - 200
            ) {
                return;
            }

            // 読み込み中、または最後まで読み込み済みなら何もしない
            if (loading || !hasMore) {
                return;
            }

            loading = true;
            page++;

            try {

                const params = new URLSearchParams(window.location.search);

                params.set(pageName, page);

                if (type) {
                    params.set('type', type);
                }

                const response = await fetch(
                    `${url}?${params.toString()}`,
                    {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    }
                );

                if (!response.ok) {
                    throw new Error(`HTTP error: ${response.status}`);
                }

                const data = await response.json();

                if (data.html) {
                    targetContainer.insertAdjacentHTML(
                        'beforeend',
                        data.html
                    );
                }

                hasMore = data.hasMore;

            } catch (error) {

                console.error(
                    '無限スクロールの読み込みに失敗しました。',
                    error
                );

            } finally {

                loading = false;

            }

        });

    });

});