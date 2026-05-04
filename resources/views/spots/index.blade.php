<!DOCTYPE html>
<html lang="ja">
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Noto Serif JP', serif;
        background-color: #121212;
        color: #e0e0e0;
    }
</style>

<head>
    <meta charset="UTF-8">
    <title>沼津ローカルガイド - スポット一覧</title>
</head>

<body style="padding: 50px; text-align: center;">

    <h1>おすすめ観光スポット一覧</h1>

    <div style="margin-bottom: 30px;">
        <a href="{{ route('spots.create') }}"
            style="background-color: #0056b3; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">＋
            新しいスポットを登録</a>
        <div style="margin: 20px 0; text-align: center;">
            <a href="{{ route('spots.index') }}"
                style="display: inline-block; padding: 6px 20px; margin-right: 10px; background-color: transparent; color: #e0e0e0; text-decoration: none; border: 1px solid #777; border-radius: 20px; font-size: 0.9em; letter-spacing: 1px;">
                すべて
            </a>

            @foreach($categories as $category)
                <a href="{{ route('spots.index', ['category_id' => $category->id]) }}"
                    style="display: inline-block; padding: 6px 20px; margin-right: 10px; background-color: transparent; color: #e0e0e0; text-decoration: none; border: 1px solid #777; border-radius: 20px; font-size: 0.9em; letter-spacing: 1px;">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>

    <div
        style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 40px; max-width: 1000px; margin: 40px auto; padding: 0 20px;">


        @foreach($spots as $spot)
            <!-- カード全体（position: relative を追加して、お気に入りボタンを右上に配置できるようにします） -->
            <div
                style="background-color: #1e1e1e; border: 1px solid #333; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.5); overflow: hidden; display: flex; flex-direction: column; position: relative;">

                <!-- ★新規追加：お気に入り（ブックマーク）ボタン -->
                <button class="bookmark-btn" data-spot-id="{{ $spot->id }}" onclick="toggleBookmark({{ $spot->id }}, this)"
                    style="position: absolute; top: 10px; right: 10px; background: rgba(255,255,255,0.8); border: none; border-radius: 50%; width: 40px; height: 40px; font-size: 1.5em; cursor: pointer; z-index: 10; box-shadow: 0 2px 5px rgba(0,0,0,0.3);">
                    🤍
                </button>

                <!-- ★修正：写真をクリック可能に（display: block を追加して隙間をなくします） -->
                <a href="{{ route('spots.show', $spot->id) }}" style="display: block; text-decoration: none;">
                    <img src="{{ asset($spot->image_path) }}" alt="{{ $spot->name }}"
                        style="width: 100%; height: 200px; object-fit: cover; transition: 0.3s;"
                        onmouseover="this.style.opacity=0.7" onmouseout="this.style.opacity=1">
                </a>

                <!-- 下半分の情報エリア -->
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

                    <!-- 編集・削除ボタン -->
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
    <!-- ★ここからJavaScript（ブックマークの魔法） -->
    <script>
        // 1. お気に入りボタンが押された時の処理
        function toggleBookmark(spotId, btnElement) {
            // スマホ（ブラウザ）の記憶領域から、保存済みのリストを取り出す
            let bookmarks = JSON.parse(localStorage.getItem('numazu_bookmarks')) || [];
            let index = bookmarks.indexOf(spotId);

            if (index === -1) {
                // まだお気に入りされていなかったら、追加して赤ハートにする！
                bookmarks.push(spotId);
                btnElement.innerText = '❤️';
            } else {
                // すでにお気に入りされていたら、削除して白ハートに戻す！
                bookmarks.splice(index, 1);
                btnElement.innerText = '🤍';
            }
            // 変更したリストを、再びスマホに保存し直す
            localStorage.setItem('numazu_bookmarks', JSON.stringify(bookmarks));
        }

        // 2. 画面が開かれた時に、すでにお気に入り済みのものを赤ハートにする処理
        document.addEventListener("DOMContentLoaded", function () {
            let bookmarks = JSON.parse(localStorage.getItem('numazu_bookmarks')) || [];
            document.querySelectorAll('.bookmark-btn').forEach(btn => {
                let spotId = parseInt(btn.getAttribute('data-spot-id'));
                if (bookmarks.includes(spotId)) {
                    btn.innerText = '❤️';
                }
            });
        });
    </script>
    <!-- ★ここまでJavaScript -->
</body>

</html>