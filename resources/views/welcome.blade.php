<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÉLYSÉE VOYAGES | Numazu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400&family=Montserrat:wght@200;300;400&display=swap" rel="stylesheet">
    <style>
        body { background-color: #FAF8F5; color: #2C2C2C; }
        .font-serif { font-family: 'Cormorant Garamond', serif; }
        .font-sans { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex flex-col selection:bg-[#2C2C2C] selection:text-[#FAF8F5]">

    <header class="w-full px-8 md:px-16 py-12 flex justify-between items-center">
        <div class="text-xs font-sans tracking-[0.4em] uppercase">Élysée</div>
        <button class="text-[10px] font-sans tracking-[0.3em] uppercase hover:opacity-50 transition-opacity">Menu</button>
    </header>

    <main class="flex-grow flex flex-col justify-center px-8 md:px-24 lg:px-32 max-w-screen-2xl mx-auto w-full">
        
        <span class="block text-xs md:text-sm font-sans tracking-[0.5em] text-[#2C2C2C]/50 uppercase mb-8 md:mb-12">
            The Untold Japan
        </span>
        
        <h1 class="text-6xl md:text-8xl lg:text-[10rem] font-serif font-light leading-[0.9] tracking-tight">
            Silence.<br>
            Space.<br>
            Numazu.
        </h1>
        
        <div class="mt-16 md:mt-32 flex flex-col md:flex-row md:items-end justify-between gap-12 border-t border-[#2C2C2C]/10 pt-12">
            <p class="max-w-md text-sm md:text-base font-sans tracking-widest leading-loose text-[#2C2C2C]/70">
                True luxury is found in the unsaid. 
                Experience the untouched essence of the Izu Peninsula.
            </p>
            
            <a href="#discover" class="group flex items-center gap-6 pb-2">
                <span class="text-xs font-sans tracking-[0.3em] uppercase group-hover:opacity-50 transition-opacity">Enter the Experience</span>
                <div class="w-12 h-[1px] bg-[#2C2C2C] group-hover:w-24 transition-all duration-500"></div>
            </a>
        </div>
    </main>
<section id="discover" class="max-w-7xl mx-auto px-8 md:px-16 lg:px-24 py-32 md:py-48">
        
        <div class="mb-24 text-center">
            <h2 class="text-3xl md:text-4xl font-serif font-light text-[#2C2C2C] tracking-wide">Curated Destinations</h2>
            <div class="w-16 h-[1px] bg-[#2C2C2C]/30 mx-auto mt-8"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 lg:gap-24">
            @foreach($spots as $spot)
            
            <a href="{{ route('spots.show', $spot->id) }}" class="fade-in-item block group opacity-0 translate-y-12 transition-all duration-[1500ms] ease-out">
                
                <div class="relative aspect-[4/5] overflow-hidden mb-6">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-[2000ms] group-hover:scale-105" 
                         style="background-image: url('{{ asset($spot->image_path) }}');"></div>
                    <div class="absolute inset-0 bg-[#2C2C2C]/10 group-hover:bg-transparent transition-colors duration-1000"></div>
                </div>
                
                <div class="flex flex-col items-center text-center">
                    <span class="text-[10px] font-sans tracking-[0.3em] text-[#2C2C2C]/50 uppercase mb-3">Shizuoka, Japan</span>
                    <h3 class="text-2xl lg:text-3xl font-serif font-light text-[#2C2C2C] tracking-wide">{{ $spot->name }}</h3>
                </div>
            </a>
            
            @endforeach
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // fade-in-item クラスを持つすべての要素を取得
            const fadeItems = document.querySelectorAll('.fade-in-item');

            // 画面に入ったかどうかを判定する仕組み（Intersection Observer）
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // 画面に入ったら、透明度と位置を元に戻すクラスを追加
                        entry.target.classList.remove('opacity-0', 'translate-y-12');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        // 一度表示されたら監視を解除（ずっと表示したままにする）
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                // 要素が画面の20%くらい見えたらアニメーション開始
                threshold: 0.2
            });

            // それぞれのアイテムを監視対象にする
            fadeItems.forEach(item => {
                observer.observe(item);
            });
        });
    </script>
    </body>
</html>