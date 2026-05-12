<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>沼津ローカルガイド - スポット一覧</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Serif JP', serif;
            background-color: #121212;
            color: #e0e0e0;
        }
    </style>
</head>

<body style="padding: 50px; text-align: center;">

    <h1>おすすめ観光スポット一覧</h1>

    <div style="margin-bottom: 30px;">
        <a href="{{ route('spots.create') }}"
            style="background-color: #0056b3; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">＋
            新しいスポットを登録</a>

        <div style="margin: 20px 0; text-align: center;">
            <button id="btn-favorites"
                style="display: inline-block; padding: 6px 20px; margin-right: 10px; background-color: #b85c5c; color: white; border: none; border-radius: 20px; font-size: 0.9em; letter-spacing: 1px; cursor: pointer; font-family: inherit; transition: 0.3s;">
                ❤️ お気に入り
            </button>

            <a href="{{ route('spots.index') }}"
                style="display: inline-block; padding: 6px 20px; margin-right: 10px; text-decoration: none; border-radius: 20px; font-size: 0.9em; letter-spacing: 1px; transition: 0.3s;
                {{ !request()->has('category_id') ? 'background-color: #e0e0e0; color: #121212; font-weight: bold;' : 'background-color: transparent; color: #e0e0e0; border: 1px solid #777;' }}">
                すべて
            </a>

            @foreach($categories as $category)
                <a href="{{ route('spots.index', ['category_id' => $category->id]) }}"
                    style="display: inline-block; padding: 6px 20px; margin-right: 10px; text-decoration: none; border-radius: 20px; font-size: 0.9em; letter-spacing: 1px; transition: 0.3s;
                                {{ request('category_id') == $category->id ? 'background-color: #e0e0e0; color: #121212; font-weight: bold;' : 'background-color: transparent; color: #e0e0e0; border: 1px solid #777;' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>

    <div
        style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 40px; max-width: 1000px; margin: 40px auto; padding: 0 20px;">

        @foreach($spots as $spot)
            <div class="spot-card-container" data-spot-id="{{ $spot->id }}"
                style="background-color: #1e1e1e; border: 1px solid #333; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.5); overflow: hidden; display: flex; flex-direction: column; position: relative;">

                <button class="bookmark-btn" data-spot-id="{{ $spot->id }}" onclick="toggleBookmark({{ $spot->id }}, this)"
                    style="position: absolute; top: 10px; right: 10px; background: rgba(255,255,255,0.8); border: none; border-radius: 50%; width: 40px; height: 40px; font-size: 1.5em; cursor: pointer; z-index: 10; box-shadow: 0 2px 5px rgba(0,0,0,0.3);">
                    🤍
                </button>

                <a href="{{ route('spots.show', $spot->id) }}" style="display: block; text-decoration: none;">
                    <img src="{{ asset($spot->image_path) }}" alt="{{ $spot->name }}"
                        style="width: 100%; height: 200px; object-fit: cover; transition: 0.3s;"
                        onmouseover="this.style.opacity=0.7" onmouseout="this.style.opacity=1">
                </a>
                <button class="bookmark-btn" data-spot-id="{{ $spot->id }}" onclick="toggleBookmark({{ $spot->id }}, this)"
                    style="position: absolute; top: 10px; right: 10px; background: rgba(255,255,255,0.8); border: none; border-radius: 50%; width: 40px; height: 40px; font-size: 1.5em; cursor: pointer; z-index: 10; box-shadow: 0 2px 5px rgba(0,0,0,0.3);">
                    {{-- ★ここが魔法：DBのリストに含まれていれば最初から❤️にする --}}
                    {{ in_array($spot->id, $bookmarkedSpotIds) ? '❤️' : '🤍' }}
                </button>
                <div
                    style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1; background-color: #2c3e50; border-radius: 0 0 8px 8px;">

                    <p style="font-size: 0.8em; color: #aaa; margin-bottom: 8px;">
                        {{ $spot->category->name ?? '未分類' }}
                    </p>

                    <h3 style="margin: 0 0 15px 0; font-size: 1.2em; color: #e0e0e0;">
                        <div style="margin-bottom: 15px;">
                            @if($spot->is_halal_friendly) <span
                                style="display: inline-block; background-color: #d4af37; color: #111; padding: 4px 10px; border-radius: 12px; font-size: 0.75em; font-weight: bold; margin-right: 5px; margin-bottom: 5px;">🕌
                            Halal</span> @endif
                            @if($spot->is_private_booking) <span
                                style="display: inline-block; background-color: #d4af37; color: #111; padding: 4px 10px; border-radius: 12px; font-size: 0.75em; font-weight: bold; margin-right: 5px; margin-bottom: 5px;">🗝️
                            Private</span> @endif
                            @if($spot->is_english_friendly) <span
                                style="display: inline-block; background-color: #d4af37; color: #111; padding: 4px 10px; border-radius: 12px; font-size: 0.75em; font-weight: bold; margin-right: 5px; margin-bottom: 5px;">🗣️
                            English</span> @endif
                        </div>
                        {{ $spot->name }}
                    </h3>

                    <div style="margin-top: auto;"></div>

                    @if ($spot->map_url)
                        <div style="text-align: center; margin-bottom: 15px;">
                            <a href="{{ $spot->map_url }}" target="_blank" rel="noopener noreferrer"
                                style="display: inline-block; background-color: #4285F4; color: white; padding: 8px 20px; border-radius: 20px; text-decoration: none; font-size: 0.9em; font-weight: bold; box-shadow: 0 2px 5px rgba(0,0,0,0.3);">
                                📍 Google Maps
                            </a>
                        </div>
                    @endif

                    <div
                        style="display: flex; justify-content: center; gap: 15px; border-top: 1px solid #333; padding-top: 15px;">
                        <a href="{{ route('spots.edit', $spot->id) }}"
                            style="display: inline-block; padding: 8px 24px; background-color: #444; color: white; text-decoration: none; border-radius: 4px; font-size: 0.9em;">編集</a>
                        <form action="{{ route('spots.destroy', $spot->id) }}" method="POST" style="margin: 0;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('本当に削除しますか？')"
                                style="padding: 8px 24px; background-color: transparent; color: #b85c5c; border: 1px solid #b85c5c; border-radius: 4px; font-size: 0.9em; cursor: pointer;">削除</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <script>
        // 1. お気に入りボタン（ハート）が押された時の処理（DB連携版）
        function toggleBookmark(spotId, btnElement) {
            fetch(`/bookmarks/toggle/${spotId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'added') {
                        btnElement.innerText = '❤️';
                        updateLocalBookmarks(spotId, 'add');
                    } else if (data.status === 'removed') {
                        btnElement.innerText = '🤍';
                        updateLocalBookmarks(spotId, 'remove');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('通信に失敗しました。ログイン状態などを確認してください。');
                });
        }

        // 絞り込み機能と同期させるための補助関数
        function updateLocalBookmarks(spotId, action) {
            let bookmarks = JSON.parse(localStorage.getItem('numazu_bookmarks')) || [];
            if (action === 'add') {
                if (!bookmarks.includes(spotId)) bookmarks.push(spotId);
            } else {
                bookmarks = bookmarks.filter(id => id !== spotId);
            }
            localStorage.setItem('numazu_bookmarks', JSON.stringify(bookmarks));

            if (isShowingFavorites && action === 'remove') {
                applyFavoriteFilter();
            }
        }

        // 2. お気に入り絞り込み機能の設定
        const btnFavorites = document.getElementById('btn-favorites');
        const allSpotCards = document.querySelectorAll('.spot-card-container');

        let isShowingFavorites = sessionStorage.getItem('numazu_is_showing_favorites') === 'true';

        // 絞り込みを実行する魔法の関数
        function applyFavoriteFilter() {
            let bookmarks = JSON.parse(localStorage.getItem('numazu_bookmarks')) || [];

            if (isShowingFavorites) {
                // 【お気に入りモード】
                allSpotCards.forEach(card => {
                    let spotId = parseInt(card.getAttribute('data-spot-id'));
                    if (!bookmarks.includes(spotId)) {
                        card.style.display = 'none';
                    } else {
                        card.style.display = 'block';
                    }
                });
                btnFavorites.innerText = '❌ お気に入り解除';
                btnFavorites.style.backgroundColor = '#e0e0e0';
                btnFavorites.style.color = '#121212';
                btnFavorites.style.fontWeight = 'bold';
            } else {
                // 【通常モード】
                allSpotCards.forEach(card => {
                    card.style.display = 'block';
                });
                btnFavorites.innerText = '❤️ お気に入り';
                btnFavorites.style.backgroundColor = '#b85c5c';
                btnFavorites.style.color = 'white';
                btnFavorites.style.fontWeight = 'normal';
            }
        }

        // 3. 画面が開かれた時の処理
        document.addEventListener("DOMContentLoaded", function () {
            // PHPから渡されたお気に入りリストをJavaScriptで受け取る
            const dbBookmarks = @json($bookmarkedSpotIds);

            // LocalStorageに最新の状態を保存
            localStorage.setItem('numazu_bookmarks', JSON.stringify(dbBookmarks));

            // 絞り込み状態であればフィルターを適用
            applyFavoriteFilter();
        });

        // 4. トップのお気に入りボタンが押された時の処理
        btnFavorites.addEventListener('click', function () {
            isShowingFavorites = !isShowingFavorites;
            sessionStorage.setItem('numazu_is_showing_favorites', isShowingFavorites);
            applyFavoriteFilter();
        });
    </script>
</body>

</html>