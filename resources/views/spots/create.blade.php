<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Destination | ÉLYSÉE VOYAGES</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400&family=Montserrat:wght@200;300;400&display=swap" rel="stylesheet">
    <style>
        body { background-color: #FAF8F5; color: #2C2C2C; }
        .font-serif { font-family: 'Cormorant Garamond', serif; }
        .font-sans { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex flex-col selection:bg-[#2C2C2C] selection:text-[#FAF8F5]">

    <header class="w-full px-8 py-8 flex justify-between items-center border-b border-[#2C2C2C]/10">
        <div class="text-xs font-sans tracking-[0.4em] uppercase">Élysée Admin</div>
        <a href="/" class="text-[10px] font-sans tracking-[0.3em] uppercase hover:opacity-50 transition-opacity">Back to Discover</a>
    </header>

    <main class="flex-grow flex flex-col items-center justify-center px-4 py-16">
        <div class="w-full max-w-3xl">
            <div class="mb-12 text-center">
                <span class="block text-xs font-sans tracking-[0.4em] text-[#2C2C2C]/50 uppercase mb-4">Curate</span>
                <h1 class="text-4xl md:text-5xl font-serif font-light tracking-wide">Add New Destination</h1>
            </div>

            <form action="{{ route('spots.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="relative">
                        <input type="text" name="name" id="name" class="w-full bg-transparent border-b border-[#2C2C2C]/20 py-2 font-sans text-sm focus:outline-none focus:border-[#2C2C2C] transition-colors peer" required>
                        <label for="name" class="absolute left-0 top-2 font-sans text-xs tracking-widest text-[#2C2C2C]/50 uppercase transition-all peer-focus:-top-4 peer-focus:text-[10px] peer-valid:-top-4 peer-valid:text-[10px]">Destination Name</label>
                    </div>
                    
                    <div class="relative">
                        <select name="category_id" id="category_id" class="w-full bg-transparent border-b border-[#2C2C2C]/20 py-2 font-sans text-sm focus:outline-none focus:border-[#2C2C2C] transition-colors appearance-none" required>
                            <option value="" disabled selected>Select Category...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label for="category_id" class="absolute left-0 -top-4 font-sans text-[10px] tracking-widest text-[#2C2C2C]/50 uppercase">Category</label>
                    </div>
                </div>

                <div class="relative">
                    <textarea name="description" id="description" rows="4" class="w-full bg-transparent border-b border-[#2C2C2C]/20 py-2 font-sans text-sm focus:outline-none focus:border-[#2C2C2C] transition-colors resize-none peer" required></textarea>
                    <label for="description" class="absolute left-0 top-2 font-sans text-xs tracking-widest text-[#2C2C2C]/50 uppercase transition-all peer-focus:-top-4 peer-focus:text-[10px] peer-valid:-top-4 peer-valid:text-[10px]">The Story (Description)</label>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-end">
                    <div class="relative">
                        <label for="image" class="block font-sans text-[10px] tracking-widest text-[#2C2C2C]/50 uppercase mb-2">Cinematic Image</label>
                        <input type="file" name="image" id="image" accept="image/*" class="w-full font-sans text-xs file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-[#2C2C2C] file:text-[#FAF8F5] file:font-sans file:text-xs file:tracking-widest file:uppercase hover:file:opacity-80 transition-opacity cursor-pointer">
                    </div>
                    
                    <div class="relative">
                        <input type="url" name="map_url" id="map_url" class="w-full bg-transparent border-b border-[#2C2C2C]/20 py-2 font-sans text-sm focus:outline-none focus:border-[#2C2C2C] transition-colors peer">
                        <label for="map_url" class="absolute left-0 top-2 font-sans text-xs tracking-widest text-[#2C2C2C]/50 uppercase transition-all peer-focus:-top-4 peer-focus:text-[10px] peer-valid:-top-4 peer-valid:text-[10px]">Google Maps URL (Optional)</label>
                    </div>
                </div>

                <div class="pt-6 border-t border-[#2C2C2C]/10">
                    <span class="block font-sans text-[10px] tracking-widest text-[#2C2C2C]/50 uppercase mb-6">VIP Amenities</span>
                    <div class="flex flex-wrap gap-8">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="is_private_booking" value="1" class="w-4 h-4 accent-[#2C2C2C]">
                            <span class="font-sans text-xs tracking-widest uppercase group-hover:opacity-70 transition-opacity">Private Booking</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="is_english_friendly" value="1" class="w-4 h-4 accent-[#2C2C2C]">
                            <span class="font-sans text-xs tracking-widest uppercase group-hover:opacity-70 transition-opacity">English Guide</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="is_halal_friendly" value="1" class="w-4 h-4 accent-[#2C2C2C]">
                            <span class="font-sans text-xs tracking-widest uppercase group-hover:opacity-70 transition-opacity">Halal Friendly</span>
                        </label>
                    </div>
                </div>

                <div class="pt-10 text-center">
                    <button type="submit" class="px-12 py-4 bg-[#2C2C2C] text-[#FAF8F5] text-xs font-sans tracking-[0.2em] uppercase hover:bg-black transition-colors duration-300">
                        Save to Curated List
                    </button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>