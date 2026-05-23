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
    <div id="inquireModal" class="fixed inset-0 z-50 hidden opacity-0 transition-opacity duration-500 ease-in-out">
        <div class="absolute inset-0 bg-charcoal/80 backdrop-blur-sm" id="modalBackdrop"></div>
        
        <div class="absolute inset-0 flex items-center justify-center p-4 md:p-8">
            <div id="modalContent" class="bg-ivory w-full max-w-2xl p-8 md:p-16 relative transform scale-95 transition-transform duration-500 ease-out">
                
                <button id="closeModalBtn" class="absolute top-6 right-6 md:top-8 md:right-8 text-charcoal/50 hover:text-charcoal transition-colors duration-300">
                    <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="mb-10 text-center">
                    <span class="block text-xs font-montserrat tracking-[0.3em] text-charcoal/50 uppercase mb-3">Private Inquiry</span>
                    <h3 class="text-3xl md:text-4xl font-light text-charcoal">{{ $spot->name }}</h3>
                </div>

                <form action="#" method="POST" class="space-y-8">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="relative">
                            <input type="text" id="name" name="name" class="w-full bg-transparent border-b border-charcoal/20 py-2 text-charcoal font-montserrat text-sm focus:outline-none focus:border-charcoal transition-colors duration-300 peer" placeholder=" " required>
                            <label for="name" class="absolute left-0 top-2 text-charcoal/50 font-montserrat text-xs tracking-wider uppercase transition-all duration-300 peer-focus:-top-4 peer-focus:text-[10px] peer-valid:-top-4 peer-valid:text-[10px]">Full Name</label>
                        </div>
                        <div class="relative">
                            <input type="email" id="email" name="email" class="w-full bg-transparent border-b border-charcoal/20 py-2 text-charcoal font-montserrat text-sm focus:outline-none focus:border-charcoal transition-colors duration-300 peer" placeholder=" " required>
                            <label for="email" class="absolute left-0 top-2 text-charcoal/50 font-montserrat text-xs tracking-wider uppercase transition-all duration-300 peer-focus:-top-4 peer-focus:text-[10px] peer-valid:-top-4 peer-valid:text-[10px]">Email Address</label>
                        </div>
                    </div>

                    <div class="relative">
                        <textarea id="message" name="message" rows="3" class="w-full bg-transparent border-b border-charcoal/20 py-2 text-charcoal font-montserrat text-sm focus:outline-none focus:border-charcoal transition-colors duration-300 peer resize-none" placeholder=" " required></textarea>
                        <label for="message" class="absolute left-0 top-2 text-charcoal/50 font-montserrat text-xs tracking-wider uppercase transition-all duration-300 peer-focus:-top-4 peer-focus:text-[10px] peer-valid:-top-4 peer-valid:text-[10px]">Special Requests or Questions</label>
                    </div>

                    <div class="pt-4 text-center">
                        <button type="submit" class="w-full md:w-auto px-12 py-4 bg-charcoal text-white text-xs font-montserrat tracking-[0.2em] uppercase hover:bg-black transition-colors duration-300">
                            Send Inquiry
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 要素の取得
            const modal = document.getElementById('inquireModal');
            const modalContent = document.getElementById('modalContent');
            const backdrop = document.getElementById('modalBackdrop');
            const closeBtn = document.getElementById('closeModalBtn');
            
            // ページ内にある「Inquire About This Experience」ボタンにIDを追加するか、クラスで取得します
            // （※元のボタンに id="openModalBtn" を追加してください）
            const openBtn = document.getElementById('openModalBtn');

            // 開く処理
            openBtn.addEventListener('click', function(e) {
                e.preventDefault();
                modal.classList.remove('hidden');
                // 少しだけ遅らせてopacityを1にすることで、CSSのtransitionを効かせる
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modalContent.classList.remove('scale-95');
                    modalContent.classList.add('scale-100');
                }, 10);
            });

            // 閉じる処理の関数
            const closeModal = function() {
                modal.classList.add('opacity-0');
                modalContent.classList.remove('scale-100');
                modalContent.classList.add('scale-95');
                // アニメーションが終わってからhiddenを追加する
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 500); // duration-500 と合わせる
            };

            // 閉じるボタンと背景クリックで閉じるようにする
            closeBtn.addEventListener('click', closeModal);
            backdrop.addEventListener('click', closeModal);
        });
    </script>
</body>
</html>