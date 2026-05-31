<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $spot->name }} | ÉLYSÉE VOYAGES</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Montserrat:wght@200;300;400&family=Shippori+Mincho:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body { background-color: #FAF8F5; color: #2C2C2C; }
        .font-serif { font-family: 'Cormorant Garamond', serif; }
        .font-sans { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex flex-col selection:bg-[#2C2C2C] selection:text-[#FAF8F5]">

    <header class="w-full px-8 md:px-16 py-12 flex justify-between items-center absolute top-0 z-50">
        <a href="{{ url('/') }}" class="text-xs font-sans tracking-[0.4em] uppercase text-white hover:opacity-50 transition-opacity">Élysée</a>
        <a href="{{ url('/') }}" class="text-[10px] font-sans tracking-[0.3em] uppercase text-white hover:opacity-50 transition-opacity">Back to Top</a>
    </header>

    <div class="w-full h-[70vh] relative">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset($spot->image_path) }}');"></div>
        <div class="absolute inset-0 bg-black/20"></div>
    </div>

    <main class="max-w-4xl mx-auto px-8 py-32 md:py-48 text-center">
        <span class="text-sm md:text-base font-sans tracking-[0.3em] text-[#2C2C2C]/60 uppercase mb-8 block">Shizuoka, Japan</span>
        <h1 class="text-5xl md:text-7xl font-serif font-light text-[#2C2C2C] tracking-wide mb-16">{{ $spot->name }}</h1>
        <div class="w-16 h-[1px] bg-[#2C2C2C]/30 mx-auto mb-16"></div>
        <p class="text-xl md:text-2xl font-serif font-light tracking-wide leading-loose text-[#2C2C2C]/85">
            {{ $spot->description }}
        </p>
    </main>

    <section class="w-full bg-white px-8 py-32 border-t border-[#2C2C2C]/10">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-24">
                <h2 class="text-3xl md:text-4xl font-serif font-light text-[#2C2C2C] tracking-wide mb-6">Personal Consultation</h2>
                <p class="text-sm md:text-base font-sans tracking-widest leading-loose text-[#2C2C2C]/60">
                    ご希望の日程やスタイルをお聞かせください。<br>あなただけの特別な体験をご提案いたします。
                </p>
            </div>

            @if(session('success'))
                <div class="mb-12 p-6 border border-[#2C2C2C]/20 text-center font-sans tracking-wider text-[#2C2C2C] bg-[#FAF8F5]">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('spots.reserve', $spot->id) }}" method="POST" class="flex flex-col gap-12 font-sans">
                @csrf

                <div>
                    <label class="block text-xs tracking-[0.2em] uppercase text-[#2C2C2C]/60 mb-4">Preferred Date</label>
                    <input type="date" name="date" value="{{ old('date') }}" 
                           class="w-full bg-transparent border-b border-[#2C2C2C]/30 pb-4 text-lg focus:border-[#2C2C2C] outline-none transition-colors">
                    @error('date') <p class="text-red-500 text-xs tracking-widest mt-2">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs tracking-[0.2em] uppercase text-[#2C2C2C]/60 mb-4">Number of Guests</label>
                    <input type="number" name="pax" value="{{ old('pax') }}" min="1" placeholder="例: 2"
                           class="w-full bg-transparent border-b border-[#2C2C2C]/30 pb-4 text-lg focus:border-[#2C2C2C] outline-none transition-colors">
                    @error('pax') <p class="text-red-500 text-xs tracking-widest mt-2">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs tracking-[0.2em] uppercase text-[#2C2C2C]/60 mb-4">Your Preferences</label>
                    <textarea name="message" rows="4" placeholder="どんな体験をご希望ですか？（例：ゆったり過ごしたい、写真撮影をメインにしたい等）"
                              class="w-full bg-transparent border-b border-[#2C2C2C]/30 pb-4 text-lg leading-relaxed focus:border-[#2C2C2C] outline-none transition-colors resize-none">{{ old('message') }}</textarea>
                    @error('message') <p class="text-red-500 text-xs tracking-widest mt-2">{{ $message }}</p> @enderror
                </div>

                <div class="mt-8 text-center">
                    <button type="submit" class="group flex items-center justify-center gap-6 mx-auto hover:opacity-50 transition-opacity">
                        <span class="text-sm md:text-base tracking-[0.3em] uppercase">Request Proposal</span>
                        <div class="w-12 h-[1px] bg-[#2C2C2C] group-hover:w-24 transition-all duration-500"></div>
                    </button>
                </div>
            </form>
        </div>
    </section>

</body>
</html>