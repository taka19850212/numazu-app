<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You | ÉLYSÉE VOYAGES</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400&family=Montserrat:wght@200;300;400&family=Shippori+Mincho:wght@400&display=swap" rel="stylesheet">
    <style>
        body { background-color: #FAF8F5; color: #2C2C2C; }
        .font-serif { font-family: 'Cormorant Garamond', serif; }
        .font-sans { font-family: 'Montserrat', sans-serif; }
        .font-jp { font-family: 'Shippori Mincho', serif; }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-center items-center px-8 selection:bg-[#2C2C2C] selection:text-[#FAF8F5]">

    <header class="w-full px-8 md:px-16 py-12 flex justify-between items-center absolute top-0 z-50">
        <span class="text-xs font-sans tracking-[0.4em] uppercase text-[#2C2C2C]/50">Élysée</span>
        <a href="{{ url('/') }}" class="text-[10px] font-sans tracking-[0.3em] uppercase text-[#2C2C2C] hover:opacity-50 transition-opacity">Return to Home</a>
    </header>

    <main class="text-center fade-in-item opacity-0 translate-y-8 transition-all duration-[2000ms] ease-out">
        
        <span class="block text-xs md:text-sm font-sans tracking-[0.5em] text-[#2C2C2C]/50 uppercase mb-8">
            Request Received
        </span>

        <h1 class="text-4xl md:text-6xl font-serif font-light tracking-wide text-[#2C2C2C] mb-12">
            Thank you.
        </h1>

        <div class="w-12 h-[1px] bg-[#2C2C2C]/30 mx-auto mb-12"></div>

        <p class="text-base md:text-lg font-jp font-light tracking-[0.2em] leading-loose text-[#2C2C2C]/80 mb-16 max-w-lg mx-auto">
            ご相談リクエストを承りました。<br>
            後ほど、担当ガイドより<br>特別なご提案をお送りいたします。
        </p>

        <a href="{{ url('/') }}" class="inline-block border border-[#2C2C2C]/20 px-12 py-4 text-xs font-sans tracking-[0.3em] uppercase hover:bg-[#2C2C2C] hover:text-[#FAF8F5] transition-colors duration-500">
            Return to Home
        </a>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const mainEl = document.querySelector('main');
                mainEl.classList.remove('opacity-0', 'translate-y-8');
                mainEl.classList.add('opacity-100', 'translate-y-0');
            }, 100);
        });
    </script>
</body>
</html>