<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $spot->name }} - VIP Local Guide</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Noto Serif JP', serif; background-color: #121212; color: #e0e0e0; margin: 0; padding: 0; }
        
        /* ★ 修正1: 写真が引き伸ばされないように「contain」に変更し、黒背景でシネマティックに */
        .hero { width: 100%; max-height: 450px; object-fit: contain; background-color: #050505; display: block; margin: 0 auto; }
        
        /* コンテナの配置を調整 */
        .container { max-width: 800px; margin: 30px auto 50px; background-color: #1e1e1e; padding: 40px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.8); position: relative; }
    </style>
</head>
<body>
    <!-- 写真エリア -->
    <img src="{{ asset($spot->image_path) }}" class="hero" alt="{{ $spot->name }}">
    
    <div class="container">
        <!-- ★ 修正2: お気に入りボタンを右上に配置 -->
        <button class="bookmark-btn" data-spot-id="{{ $spot->id }}" onclick="toggleBookmark({{ $spot->id }}, this)"
                style="position: absolute; top: 30px; right: 30px; background: rgba(255,255,255,0.05); border: 1px solid #444; border-radius: 50%; width: 50px; height: 50px; font-size: 1.5em; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.5);">
            🤍
        </button>

        <!-- カテゴリとタイトル -->
        <p style="color: #d4af37; font-weight: bold; letter-spacing: 2px; margin-bottom: 5px;">{{ $spot->category->name ?? 'Category' }}</p>
        <h1 style="font-size: 2.5em; margin-top: 0; color: #fff;">{{ $spot->name }}</h1>
        
        <!-- VIPバッジ -->
        <div style="margin-bottom: 30px;">
            @if($spot->is_halal_friendly)<span style="background: #d4af37; color: #111; padding: 5px 12px; border-radius: 15px; font-weight: bold; margin-right: 10px;">🕌 Halal</span>@endif
            @if($spot->is_private_booking)<span style="background: #d4af37; color: #111; padding: 5px 12px; border-radius: 15px; font-weight: bold; margin-right: 10px;">🗝️ Private</span>@endif
            @if($spot->is_english_friendly)<span style="background: #d4af37; color: #111; padding: 5px 12px; border-radius: 15px; font-weight: bold;">🗣️ English</span>@endif
        </div>

        <!-- 説明文 -->
        <p style="font-size: 1.2em; line-height: 1.8; color: #ccc; margin-bottom: 40px;">
            {!! nl2br(e($spot->description)) !!}
        </p>

        <!-- マップボタン -->
        <div style="text-align: center;">
            @if($spot->map_url)
                <a href="{{ $spot->map_url }}" target="_blank" style="display: inline-block; background-color: #4285F4; color: white; padding: 15px 40px; border-radius: 30px; text-decoration: none; font-size: 1.1em; font-weight: bold; box-shadow: 0 4px 10px rgba(0,0,0,0.4);">📍 Open in Google Maps</a>
            @endif
        </div>

        <!-- 一覧へ戻るボタン -->
        <div style="text-align: center; margin-top: 50px;">
            <a href="{{ route('spots.index') }}" style="color: #888; text-decoration: none; border-bottom: 1px solid #888; padding-bottom: 2px;">← Back to Discovery (一覧へ戻る)</a>
        </div>
    </div>

    <!-- ★ 修正3: 詳細ページにもブックマークの魔法（JavaScript）を追加 -->
    <script>
        function toggleBookmark(spotId, btnElement) {
            let bookmarks = JSON.parse(localStorage.getItem('numazu_bookmarks')) || [];
            let index = bookmarks.indexOf(spotId);
            
            if (index === -1) {
                bookmarks.push(spotId);
                btnElement.innerText = '❤️';
            } else {
                bookmarks.splice(index, 1);
                btnElement.innerText = '🤍';
            }
            localStorage.setItem('numazu_bookmarks', JSON.stringify(bookmarks));
        }

        document.addEventListener("DOMContentLoaded", function() {
            let bookmarks = JSON.parse(localStorage.getItem('numazu_bookmarks')) || [];
            document.querySelectorAll('.bookmark-btn').forEach(btn => {
                let spotId = parseInt(btn.getAttribute('data-spot-id'));
                if (bookmarks.includes(spotId)) {
                    btn.innerText = '❤️';
                }
            });
        });
    </script>
</body>
</html>