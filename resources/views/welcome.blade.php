<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÉLYSÉE VOYAGES | Numazu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400&family=Montserrat:wght@200;300;400&display=swap"
        rel="stylesheet">
    <style>
        body { background-color: #FAF8F5; color: #2C2C2C; }
        .font-serif { font-family: 'Cormorant Garamond', serif; }
        .font-sans { font-family: 'Montserrat', sans-serif; }
        .font-jp { font-family: 'Shippori Mincho', serif; }
        
        /* 障子の網目（組子）パターンの作成（ヒノキ色） */
        .shoji-grid {
            /* 変更: ドア自体をヒノキの色味（薄い木目色）にする */
            background-color: #E7DCCA; /* 薄い木目/ベージュ */
            
            /* 変更: 組子（線）を濃い木目の茶色にする */
            background-image:
                linear-gradient(rgba(139, 69, 19, 0.2) 1px, transparent 1px),
                linear-gradient(90deg, rgba(139, 69, 19, 0.2) 1px, transparent 1px);
            background-size: 15px 25px; /* 網目の細かさを日本っぽく（縦長） */
            
            /* 障子の左右の太い木枠 */
            border-left: 3px solid rgba(139, 69, 19, 0.6);
            border-right: 3px solid rgba(139, 69, 19, 0.6);
            
            /* 質感向上のための薄い影 */
            box-shadow: 4px 0 15px rgba(0,0,0,0.03);
            
            transition: width 0.8s cubic-bezier(0.77, 0, 0.175, 1), left 0.8s cubic-bezier(0.77, 0, 0.175, 1);
        }

        /* ★追加: 仕事人の指先（動く縦カーソル） */
        .cursor-line::before {
            content: '';
            position: absolute;
            left: -12px; /* 文字の左側（serifフォント用に調整） */
            top: 15%;
            bottom: 15%;
            width: 2px;
            background-color: #2C2C2C; /* 墨色 */
            border-radius: 1px;
            opacity: 0; /* JSでclassがつくまで非表示 */
            z-index: 20; /* 障子(z-10)より手前に出す */
            transition: opacity 0.2s ease-in;
        }
        /* classがついたら表示 */
        .cursor-line.cursor-line::before {
            opacity: 1;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col selection:bg-[#2C2C2C] selection:text-[#FAF8F5]">

    <header class="w-full px-8 md:px-16 py-12 flex justify-between items-center">
        <div class="text-xs font-sans tracking-[0.4em] uppercase">Élysée</div>
        <button
            class="text-[10px] font-sans tracking-[0.3em] uppercase hover:opacity-50 transition-opacity">Menu</button>
    </header>

    <main class="flex-grow flex flex-col justify-center px-8 md:px-24 lg:px-32 max-w-screen-2xl mx-auto w-full">

        <span class="block text-xs md:text-sm font-sans tracking-[0.5em] text-[#2C2C2C]/50 uppercase mb-8 md:mb-12">
            The Untouched Japan
        </span>

      <h1 class="text-6xl md:text-8xl lg:text-[10rem] font-serif font-light leading-[1.2] tracking-tight flex flex-col gap-4 md:gap-6">
            
            <div class="relative inline-block w-max">
                <span id="text-1" class="relative z-0 transition-opacity duration-300">Silence.</span>
                <span id="door-1" class="shoji-grid absolute top-[-10px] bottom-[-10px] left-0 w-0 z-10"></span>
            </div>

            <div class="relative inline-block w-max">
                <span id="text-2" class="relative z-0 transition-opacity duration-300">Space.</span>
                <span id="door-2" class="shoji-grid absolute top-[-10px] bottom-[-10px] left-0 w-0 z-10"></span>
            </div>

            <div class="relative inline-block w-max">
                <span id="text-3" class="relative z-0 transition-opacity duration-300">Izu.</span>
                <span id="door-3" class="shoji-grid absolute top-[-10px] bottom-[-10px] left-0 w-0 z-10"></span>
            </div>
            
        </h1>

        <div
            class="mt-16 md:mt-32 flex flex-col md:flex-row md:items-end justify-between gap-12 border-t border-[#2C2C2C]/10 pt-12">
            <p class="max-w-md text-sm md:text-base font-sans tracking-widest leading-loose text-[#2C2C2C]/70">
                True luxury is found in the unsaid.
                Experience the untouched essence of the Izu Peninsula.
            </p>

            <a href="#discover" class="group flex items-center gap-6 pb-2">
                <span
                    class="text-xs font-sans tracking-[0.3em] uppercase group-hover:opacity-50 transition-opacity">Enter
                    the Experience</span>
                <div class="w-12 h-[1px] bg-[#2C2C2C] group-hover:w-24 transition-all duration-500"></div>
            </a>
        </div>
    </main>

    <section id="discover" class="max-w-7xl mx-auto px-8 md:px-16 lg:px-24 py-32 md:py-48">

        <div class="mb-32 text-center">
            <h2 class="text-3xl md:text-4xl font-serif font-light text-[#2C2C2C] tracking-wide">Curated Destinations
            </h2>
            <div class="w-16 h-[1px] bg-[#2C2C2C]/30 mx-auto mt-8"></div>
        </div>

        <div class="flex flex-col space-y-32 md:space-y-48">
            @foreach($spots as $spot)

                <div
                    class="fade-in-item opacity-0 translate-y-12 transition-all duration-[1500ms] ease-out flex flex-col md:flex-row {{ $loop->index % 2 != 0 ? 'md:flex-row-reverse' : '' }} items-center gap-12 lg:gap-24">

                    <a href="{{ route('spots.show', $spot->id) }}"
                        class="block w-full md:w-1/2 relative aspect-[4/5] overflow-hidden group">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-[2000ms] group-hover:scale-105"
                            style="background-image: url('{{ asset($spot->image_path) }}');"></div>
                        <div
                            class="absolute inset-0 bg-[#2C2C2C]/10 group-hover:bg-transparent transition-colors duration-1000">
                        </div>
                    </a>

                    <div
                        class="w-full md:w-1/2 flex flex-col justify-center {{ $loop->index % 2 != 0 ? 'md:items-end md:text-right' : 'md:items-start md:text-left' }} text-center">
                        <span class="text-[10px] font-sans tracking-[0.3em] text-[#2C2C2C]/50 uppercase mb-4">Shizuoka,
                            Japan</span>
                        <h3 class="text-3xl lg:text-5xl font-serif font-light text-[#2C2C2C] tracking-wide mb-8">
                            {{ $spot->name }}</h3>
                        <p
                            class="text-sm md:text-base font-sans tracking-widest leading-loose text-[#2C2C2C]/70 mb-12 max-w-md">
                            {{ $spot->description }}
                        </p>
                        <a href="{{ route('spots.show', $spot->id) }}" class="group flex items-center gap-4 pb-2">
                            <span
                                class="text-xs font-sans tracking-[0.2em] uppercase group-hover:opacity-50 transition-opacity">Explore
                                Detail</span>
                            <div class="w-8 h-[1px] bg-[#2C2C2C] group-hover:w-16 transition-all duration-500"></div>
                        </a>
                    </div>

                </div>
            @endforeach
        </div>
    </section>

    <section id="discover" class="max-w-7xl mx-auto px-8 md:px-16 lg:px-24 py-32 md:py-48">

        <div class="mb-24 text-center">
            <h2 class="text-3xl md:text-4xl font-serif font-light text-[#2C2C2C] tracking-wide">Curated Destinations
            </h2>
            <div class="w-16 h-[1px] bg-[#2C2C2C]/30 mx-auto mt-8"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 lg:gap-24">
            @foreach($spots as $spot)
 
                <a href="{{ route('spots.show', $spot->id) }}"
                    class="fade-in-item block group opacity-0 translate-y-12 transition-all duration-[1500ms] ease-out">

                    <div class="relative aspect-[4/5] overflow-hidden mb-6">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-[2000ms] group-hover:scale-105"
                            style="background-image: url('{{ asset($spot->image_path) }}');"></div>
                        <div
                            class="absolute inset-0 bg-[#2C2C2C]/10 group-hover:bg-transparent transition-colors duration-1000">
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-center">
                        <span class="text-[10px] font-sans tracking-[0.3em] text-[#2C2C2C]/50 uppercase mb-3">Shizuoka,
                            Japan</span>
                        <h3 class="text-2xl lg:text-3xl font-serif font-light text-[#2C2C2C] tracking-wide">
                            {{ $spot->name }}
                        </h3>
                    </div>
                </a>

            @endforeach
        </div>
    </section>

   <script>
        document.addEventListener('DOMContentLoaded', () => {
            // === 1. 障子ワイプ（呼吸アニメーション & 仕事人カーソル） ===
            let isEnglish = true;
            // 小さい〇の設定は維持
            const words = [
                { id: 1, en: 'Silence.', jp: '静寂<span class="text-[0.5em] inline-block align-baseline -ml-2 opacity-80">。</span>' },
                { id: 2, en: 'Space.', jp: '余白<span class="text-[0.5em] inline-block align-baseline -ml-2 opacity-80">。</span>' },
                { id: 3, en: 'Izu.', jp: '伊豆<span class="text-[0.5em] inline-block align-baseline -ml-2 opacity-80">。</span>' }
            ];

            const toggleLanguage = () => {
                words.forEach((item, index) => {
                    // 上から順に1秒ずつ遅らせてワイプを開始
                    setTimeout(() => {
                        const textEl = document.getElementById(`text-${item.id}`);
                        const doorEl = document.getElementById(`door-${item.id}`);

                        // ★追加: 「実現する直前（日本語へ変わる前）」だけ、縦カーソルを表示
                        if (isEnglish) {
                            textEl.classList.add('cursor-line');
                        }

                        // 1. 障子を閉める（左から右へカバー）
                        doorEl.style.left = '0';
                        doorEl.style.width = '100%';

                        // 2. 障子が完全に閉まった裏側で、文字を入れ替える（0.8秒後）
                        setTimeout(() => {
                            if (isEnglish) {
                                // HTMLタグ（小さい〇）を有効にする
                                textEl.innerHTML = item.jp;
                                textEl.className = 'relative z-0 font-jp font-normal text-[0.9em] tracking-[0.15em] pt-[0.05em]';
                            } else {
                                textEl.innerHTML = item.en;
                                textEl.className = 'relative z-0 font-serif';
                            }

                            // 3. 障子を開ける（右へ抜けていく）
                            doorEl.style.left = '100%';
                            doorEl.style.width = '0';

                            // ★追加: アニメーション完了後、カーソルを消す
                            // 障子が開くアニメーションが完全に終わったタイミングで消す（0.8秒後）
                            // transitionendイベントを使うのが最も正確
                            doorEl.addEventListener('transitionend', function handler() {
                                textEl.classList.remove('cursor-line'); // カーソル削除
                                doorEl.removeEventListener('transitionend', handler); // イベントを1回だけ実行
                            });

                            // 4. 次の動作のために障子の位置をこっそり左に戻す
                            setTimeout(() => {
                                doorEl.style.transition = 'none';
                                doorEl.style.left = '0';
                                setTimeout(() => {
                                    // 質感向上のCSS transitionを再適用
                                    doorEl.style.transition = 'width 0.8s cubic-bezier(0.77, 0, 0.175, 1), left 0.8s cubic-bezier(0.77, 0, 0.175, 1)';
                                }, 50);
                            }, 800); // doorElのtransition duration(800ms)と合わせる
                        }, 800);
                    }, index * 1000); 
                });

                isEnglish = !isEnglish;
            };

            // ページ読み込み後、2秒後に初回起動（気持ち早めに）
            setTimeout(() => {
                toggleLanguage();
                // 18秒の呼吸サイクル
                setInterval(toggleLanguage, 18000);
            }, 2000);


            // === 2. スクロール検知（スポットのフワッと表示） ===
            const fadeItems = document.querySelectorAll('.fade-in-item');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-12');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });

            fadeItems.forEach(item => observer.observe(item));
        });
    </script>
</body>

</html>