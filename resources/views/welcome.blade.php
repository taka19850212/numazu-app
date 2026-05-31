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
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@400;500;600&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-color: #FAF8F5;
            color: #2C2C2C;
        }

        .font-serif {
            font-family: 'Cormorant Garamond', serif;
        }

        .font-sans {
            font-family: 'Montserrat', sans-serif;
        }

        .font-jp {
            font-family: 'Shippori Mincho', serif;
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

        <span class="block text-xs md:text-sm font-sans tracking-[0.5em] text-[#2C2C2C]/50 uppercase mb-12 md:mb-20">
            The Untouched Japan
        </span>

        <h1
            class="text-5xl md:text-7xl lg:text-[8rem] font-serif font-light leading-none tracking-tight flex flex-col gap-8 md:gap-16">

            <div class="relative inline-block w-max">
                <span id="text-1" class="relative z-0 transition-opacity duration-300">Silence.</span>
            </div>

            <div class="relative inline-block w-max">
                <span id="text-2" class="relative z-0 transition-opacity duration-300">Space.</span>
            </div>

            <div class="relative inline-block w-max">
                <span id="text-3" class="relative z-0 transition-opacity duration-300">Izu.</span>
            </div>

        </h1>

    </main>

    <section id="discover" class="w-full max-w-full mx-auto px-6 md:px-12 lg:px-16 py-32 md:py-48">

        <div class="mb-32 text-center">
            <h2 class="text-3xl md:text-4xl font-serif font-light text-[#2C2C2C] tracking-wide">Curated Destinations
            </h2>
            <div class="w-16 h-[1px] bg-[#2C2C2C]/30 mx-auto mt-8"></div>
        </div>

        <div class="flex flex-col space-y-40 md:space-y-60 lg:space-y-80">
            @foreach($spots as $spot)

                <div
                    class="fade-in-item opacity-0 translate-y-12 transition-all duration-[1500ms] ease-out flex flex-col md:flex-row {{ $loop->index % 2 != 0 ? 'md:flex-row-reverse' : '' }} items-center justify-between gap-12 lg:gap-20 w-full">

                    <a href="{{ route('spots.show', $spot->id) }}"
                        class="block w-full md:w-[58%] lg:w-[60%] relative aspect-[16/9] overflow-hidden rounded-xl group shadow-sm">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-[2000ms] group-hover:scale-105"
                            style="background-image: url('{{ asset($spot->image_path) }}');"></div>
                        <div
                            class="absolute inset-0 bg-[#2C2C2C]/5 group-hover:bg-transparent transition-colors duration-1000">
                        </div>
                    </a>

                    <div
                        class="w-full md:w-[38%] lg:w-[35%] flex flex-col justify-center {{ $loop->index % 2 != 0 ? 'md:items-end md:text-right md:pl-12' : 'md:items-start md:text-left md:pr-12' }} text-center md:text-left">

                        <span
                            class="text-sm md:text-base font-sans tracking-[0.3em] text-[#2C2C2C]/60 uppercase mb-6">Shizuoka,
                            Japan</span>

                        <h3 class="text-4xl lg:text-6xl font-serif font-light text-[#2C2C2C] tracking-wide mb-8">
                            {{ $spot->name }}</h3>

                        <p
                            class="text-lg md:text-xl lg:text-2xl font-serif font-light tracking-wide leading-relaxed text-[#2C2C2C]/85 mb-14 max-w-md md:max-w-none mx-auto md:mx-0">
                            {{ $spot->description }}
                        </p>

                        <a href="{{ route('spots.show', $spot->id) }}"
                            class="group flex items-center gap-6 pb-2 mx-auto md:mx-0">
                            <span
                                class="text-sm md:text-base font-sans tracking-[0.2em] uppercase group-hover:opacity-50 transition-opacity">Explore
                                Detail</span>
                            <div class="w-12 h-[1px] bg-[#2C2C2C] group-hover:w-20 transition-all duration-500"></div>
                        </a>
                    </div>

            </div> @endforeach
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // === 1. 隠密スクロール言語切り替え（仕事人仕様） ===
            let isEnglish = true;
            const words = [
                { id: 1, en: 'Silence.', jp: '静寂<span class="text-[0.4em] inline-block align-baseline -ml-4 opacity-60">。</span>' },
                { id: 2, en: 'Space.', jp: '余白<span class="text-[0.4em] inline-block align-baseline -ml-4 opacity-60">。</span>' },
                { id: 3, en: 'Izu.', jp: '伊豆<span class="text-[0.4em] inline-block align-baseline -ml-4 opacity-60">。</span>' }
            ];

            // メインのタイトル(h1)を監視対象にする
            const mainTitle = document.querySelector('h1');

            const titleObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    // ★ entry.isIntersecting が false（＝画面から完全にハミ出して消えた）の瞬間
                    if (!entry.isIntersecting) {

                        // ユーザーの目に見えない裏側で、文字とデザインを一瞬で入れ替える
                        words.forEach(item => {
                            const textEl = document.getElementById(`text-${item.id}`);

                            if (isEnglish) {
                                textEl.innerHTML = item.jp;
                                // Takaさんこだわりの美しい黄金比サイズを適用
                                textEl.className = 'relative z-0 font-jp font-light text-4xl md:text-5xl lg:text-[5rem] tracking-[0.4em] py-4 text-[#2C2C2C]/90';
                            } else {
                                textEl.innerHTML = item.en;
                                textEl.className = 'relative z-0 font-serif font-light text-[1em] tracking-tight';
                            }
                        });

                        // 状態を反転（次に消えたらまた戻るようにする）
                        isEnglish = !isEnglish;
                    }
                });
            }, {
                // threshold: 0 は「1画素でも画面にはみ出したら消えたとみなす（完全に外に出たら発火）」という設定
                threshold: 0
            });

            if (mainTitle) {
                titleObserver.observe(mainTitle);
            }


            // === 2. スクロール検知（写真のフワッと表示） ===
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