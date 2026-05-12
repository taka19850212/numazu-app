<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ÉLYSÉE VOYAGES | Extraordinary Journeys for Discerning Travelers</title>
  <meta name="description" content="Bespoke luxury travel experiences crafted exclusively for the world's most discerning travelers. Private jets, exclusive villas, and unforgettable journeys.">
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
  
  <!-- Tailwind Config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            ivory: '#FAF8F5',
            charcoal: '#2C2C2C',
            gold: '#C9A962',
            'warm-gray': '#8B8178',
          },
          fontFamily: {
            serif: ['Cormorant Garamond', 'Georgia', 'serif'],
            sans: ['Montserrat', 'sans-serif'],
          },
        }
      }
    }
  </script>
  
  <style>
    /* Custom Styles */
    body {
      font-family: 'Cormorant Garamond', Georgia, serif;
      background-color: #FAF8F5;
      color: #2C2C2C;
    }

    .font-montserrat {
      font-family: 'Montserrat', sans-serif;
    }

    /* Smooth animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(10px); }
    }

    .animate-fade-in-up {
      animation: fadeInUp 0.8s ease-out forwards;
    }

    .animate-fade-in {
      animation: fadeIn 0.6s ease-out forwards;
    }

    .animate-bounce-slow {
      animation: bounce 2s infinite;
    }

    .animation-delay-200 { animation-delay: 0.2s; }
    .animation-delay-400 { animation-delay: 0.4s; }
    .animation-delay-600 { animation-delay: 0.6s; }

    /* Hover effects */
    .hover-scale:hover {
      transform: scale(1.05);
    }

    .hover-scale-lg:hover {
      transform: scale(1.1);
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-track {
      background: #FAF8F5;
    }

    ::-webkit-scrollbar-thumb {
      background: #8B8178;
      border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #2C2C2C;
    }

    /* Mobile menu */
    .mobile-menu {
      display: none;
    }

    .mobile-menu.active {
      display: flex;
    }

    /* Image overlay hover */
    .destination-card:hover .destination-overlay {
      background-color: rgba(44, 44, 44, 0.5);
    }

    .destination-card:hover .destination-image {
      transform: scale(1.1);
    }

    .destination-card:hover .destination-arrow {
      opacity: 1;
      transform: translateY(0);
    }

    .villa-card:hover .villa-image {
      transform: scale(1.05);
    }
  </style>
</head>
<body class="antialiased">

  <!-- Header -->
  <header id="header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-transparent py-6">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="flex items-center justify-between">
        <!-- Logo -->
        <a href="#" class="group">
          <span class="text-2xl md:text-3xl font-light tracking-[0.3em] text-charcoal">ÉLYSÉE</span>
          <span class="block text-[10px] tracking-[0.5em] text-warm-gray font-montserrat uppercase">Voyages</span>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center gap-10">
          <a href="#destinations" class="text-sm font-montserrat tracking-[0.15em] text-charcoal/80 hover:text-charcoal transition-colors duration-300 uppercase">Destinations</a>
          <a href="#experiences" class="text-sm font-montserrat tracking-[0.15em] text-charcoal/80 hover:text-charcoal transition-colors duration-300 uppercase">Experiences</a>
          <a href="#villas" class="text-sm font-montserrat tracking-[0.15em] text-charcoal/80 hover:text-charcoal transition-colors duration-300 uppercase">Private Villas</a>
          <a href="#about" class="text-sm font-montserrat tracking-[0.15em] text-charcoal/80 hover:text-charcoal transition-colors duration-300 uppercase">Our Story</a>
          <a href="#inquire" class="text-sm font-montserrat tracking-[0.15em] text-charcoal/80 hover:text-charcoal transition-colors duration-300 uppercase">Contact</a>
        </nav>

        <!-- CTA Button -->
        <div class="hidden lg:block">
          <a href="#inquire" class="inline-flex items-center gap-2 px-6 py-3 border border-charcoal text-sm font-montserrat tracking-[0.15em] uppercase text-charcoal hover:bg-charcoal hover:text-ivory transition-all duration-300">
            Inquire
          </a>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="lg:hidden p-2 text-charcoal" aria-label="Toggle menu">
          <svg class="menu-icon w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
          <svg class="close-icon w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
    </div>
  </header>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="mobile-menu fixed inset-0 z-40 bg-ivory pt-24 flex-col items-center">
    <nav class="flex flex-col items-center gap-8 py-12">
      <a href="#destinations" class="mobile-link text-xl font-montserrat tracking-[0.2em] text-charcoal uppercase">Destinations</a>
      <a href="#experiences" class="mobile-link text-xl font-montserrat tracking-[0.2em] text-charcoal uppercase">Experiences</a>
      <a href="#villas" class="mobile-link text-xl font-montserrat tracking-[0.2em] text-charcoal uppercase">Private Villas</a>
      <a href="#about" class="mobile-link text-xl font-montserrat tracking-[0.2em] text-charcoal uppercase">Our Story</a>
      <a href="#inquire" class="mobile-link text-xl font-montserrat tracking-[0.2em] text-charcoal uppercase">Contact</a>
      <a href="#inquire" class="mobile-link mt-8 px-8 py-4 border border-charcoal text-lg font-montserrat tracking-[0.15em] uppercase text-charcoal">
        Inquire Now
      </a>
    </nav>
  </div>

  <!-- Hero Section -->
  <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
      <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop');"></div>
      <div class="absolute inset-0 bg-charcoal/40"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6 lg:px-12 text-center">
      <div class="max-w-4xl mx-auto animate-fade-in-up">
        <span class="inline-block text-sm md:text-base font-montserrat tracking-[0.4em] text-ivory/80 uppercase mb-6">
          Extraordinary Journeys Await
        </span>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-light text-ivory leading-tight tracking-wide mb-8">
          <span class="block text-balance">Where Dreams</span>
          <span class="block italic font-normal">Become Reality</span>
        </h1>
        <p class="text-lg md:text-xl font-montserrat font-light text-ivory/90 max-w-2xl mx-auto mb-12 leading-relaxed">
          Bespoke travel experiences crafted exclusively for the world's most discerning travelers
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
          <a href="#experiences" class="px-10 py-4 bg-ivory text-charcoal text-sm font-montserrat tracking-[0.2em] uppercase hover:bg-gold transition-colors duration-300">
            Discover Experiences
          </a>
          <a href="#inquire" class="px-10 py-4 border border-ivory text-sm font-montserrat tracking-[0.2em] uppercase text-ivory hover:bg-ivory hover:text-charcoal transition-all duration-300">
            Begin Your Journey
          </a>
        </div>
      </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-12 left-1/2 -translate-x-1/2 animate-fade-in animation-delay-600">
      <div class="flex flex-col items-center text-ivory/60 animate-bounce-slow">
        <span class="text-xs font-montserrat tracking-[0.3em] uppercase mb-4">Scroll</span>
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"/>
        </svg>
      </div>
    </div>
  </section>

  <!-- Destinations Section -->
  <section id="destinations" class="py-24 lg:py-32 bg-ivory">
    <div class="container mx-auto px-6 lg:px-12">
      <!-- Section Header -->
      <div class="text-center mb-16 lg:mb-24">
        <span class="text-sm font-montserrat tracking-[0.4em] text-warm-gray uppercase">Curated Destinations</span>
        <h2 class="text-3xl md:text-5xl lg:text-6xl font-light text-charcoal mt-4 tracking-wide">Exceptional Places</h2>
        <p class="mt-6 text-lg font-montserrat font-light text-warm-gray max-w-2xl mx-auto">
          Each destination has been personally selected for its unique ability to inspire, transform, and create lasting memories
        </p>
      </div>

      <!-- Destinations Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
        <!-- Santorini -->
        <div class="destination-card group relative aspect-[4/3] overflow-hidden cursor-pointer">
          <div class="destination-image absolute inset-0 bg-cover bg-center transition-transform duration-700" style="background-image: url('https://images.unsplash.com/photo-1613395877344-13d4a8e0d49e?q=80&w=1935&auto=format&fit=crop');"></div>
          <div class="destination-overlay absolute inset-0 bg-charcoal/30 transition-colors duration-500"></div>
          <div class="absolute inset-0 p-8 lg:p-12 flex flex-col justify-end">
            <span class="text-xs font-montserrat tracking-[0.3em] text-ivory/80 uppercase">Greece</span>
            <h3 class="text-2xl md:text-3xl lg:text-4xl font-light text-ivory mt-2 tracking-wide">Santorini</h3>
            <p class="text-sm font-montserrat text-ivory/80 mt-3 max-w-xs">Clifftop villas overlooking the Aegean</p>
            <div class="destination-arrow flex items-center gap-3 mt-6 opacity-0 translate-y-4 transition-all duration-300">
              <span class="text-sm font-montserrat tracking-[0.2em] text-ivory uppercase">Explore</span>
              <svg class="w-4 h-4 text-ivory" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
              </svg>
            </div>
          </div>
        </div>

        <!-- Kyoto -->
        <div class="destination-card group relative aspect-[4/3] overflow-hidden cursor-pointer">
          <div class="destination-image absolute inset-0 bg-cover bg-center transition-transform duration-700" style="background-image: url('https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=2070&auto=format&fit=crop');"></div>
          <div class="destination-overlay absolute inset-0 bg-charcoal/30 transition-colors duration-500"></div>
          <div class="absolute inset-0 p-8 lg:p-12 flex flex-col justify-end">
            <span class="text-xs font-montserrat tracking-[0.3em] text-ivory/80 uppercase">Japan</span>
            <h3 class="text-2xl md:text-3xl lg:text-4xl font-light text-ivory mt-2 tracking-wide">Kyoto</h3>
            <p class="text-sm font-montserrat text-ivory/80 mt-3 max-w-xs">Ancient traditions, timeless elegance</p>
            <div class="destination-arrow flex items-center gap-3 mt-6 opacity-0 translate-y-4 transition-all duration-300">
              <span class="text-sm font-montserrat tracking-[0.2em] text-ivory uppercase">Explore</span>
              <svg class="w-4 h-4 text-ivory" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
              </svg>
            </div>
          </div>
        </div>

        <!-- Maldives -->
        <div class="destination-card group relative aspect-[4/3] overflow-hidden cursor-pointer">
          <div class="destination-image absolute inset-0 bg-cover bg-center transition-transform duration-700" style="background-image: url('https://images.unsplash.com/photo-1514282401047-d79a71a590e8?q=80&w=1965&auto=format&fit=crop');"></div>
          <div class="destination-overlay absolute inset-0 bg-charcoal/30 transition-colors duration-500"></div>
          <div class="absolute inset-0 p-8 lg:p-12 flex flex-col justify-end">
            <span class="text-xs font-montserrat tracking-[0.3em] text-ivory/80 uppercase">Indian Ocean</span>
            <h3 class="text-2xl md:text-3xl lg:text-4xl font-light text-ivory mt-2 tracking-wide">Maldives</h3>
            <p class="text-sm font-montserrat text-ivory/80 mt-3 max-w-xs">Private island sanctuaries</p>
            <div class="destination-arrow flex items-center gap-3 mt-6 opacity-0 translate-y-4 transition-all duration-300">
              <span class="text-sm font-montserrat tracking-[0.2em] text-ivory uppercase">Explore</span>
              <svg class="w-4 h-4 text-ivory" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
              </svg>
            </div>
          </div>
        </div>

        <!-- Tuscany -->
        <div class="destination-card group relative aspect-[4/3] overflow-hidden cursor-pointer">
          <div class="destination-image absolute inset-0 bg-cover bg-center transition-transform duration-700" style="background-image: url('https://images.unsplash.com/photo-1534445967719-8ae7b972b1a5?q=80&w=1974&auto=format&fit=crop');"></div>
          <div class="destination-overlay absolute inset-0 bg-charcoal/30 transition-colors duration-500"></div>
          <div class="absolute inset-0 p-8 lg:p-12 flex flex-col justify-end">
            <span class="text-xs font-montserrat tracking-[0.3em] text-ivory/80 uppercase">Italy</span>
            <h3 class="text-2xl md:text-3xl lg:text-4xl font-light text-ivory mt-2 tracking-wide">Tuscany</h3>
            <p class="text-sm font-montserrat text-ivory/80 mt-3 max-w-xs">Rolling hills and Renaissance charm</p>
            <div class="destination-arrow flex items-center gap-3 mt-6 opacity-0 translate-y-4 transition-all duration-300">
              <span class="text-sm font-montserrat tracking-[0.2em] text-ivory uppercase">Explore</span>
              <svg class="w-4 h-4 text-ivory" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
              </svg>
            </div>
          </div>
        </div>
      </div>

      <!-- View All Link -->
      <div class="text-center mt-16">
        <a href="#" class="inline-flex items-center gap-3 text-sm font-montserrat tracking-[0.2em] text-charcoal uppercase hover:text-gold transition-colors duration-300">
          View All Destinations
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
          </svg>
        </a>
      </div>
    </div>
  </section>

  <!-- Experiences Section -->
  <section id="experiences" class="py-24 lg:py-32 bg-[#F5F3EF]">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
        <!-- Left Content -->
        <div>
          <span class="text-sm font-montserrat tracking-[0.4em] text-warm-gray uppercase">Bespoke Experiences</span>
          <h2 class="text-3xl md:text-5xl lg:text-6xl font-light text-charcoal mt-4 tracking-wide leading-tight">
            Beyond <br>
            <span class="italic">Ordinary</span>
          </h2>
          <p class="mt-8 text-lg font-montserrat font-light text-warm-gray leading-relaxed">
            We don't believe in one-size-fits-all travel. Each journey is a masterpiece, 
            carefully composed around your unique desires and dreams. From the moment 
            you reach out, our team of travel artisans works to create something truly 
            extraordinary.
          </p>
          <div class="mt-10">
            <a href="#inquire" class="inline-flex items-center gap-2 px-8 py-4 bg-charcoal text-ivory text-sm font-montserrat tracking-[0.2em] uppercase hover:bg-gold transition-colors duration-300">
              Craft Your Journey
            </a>
          </div>
        </div>

        <!-- Right - Experience Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
          <!-- Private Aviation -->
          <div class="group">
            <div class="w-14 h-14 flex items-center justify-center border border-warm-gray/30 group-hover:border-gold transition-colors duration-300 mb-6">
              <svg class="w-6 h-6 text-charcoal group-hover:text-gold transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
              </svg>
            </div>
            <h3 class="text-xl font-light text-charcoal tracking-wide mb-3">Private Aviation</h3>
            <p class="text-sm font-montserrat text-warm-gray leading-relaxed">
              Travel in absolute comfort aboard our fleet of private jets, with every detail tailored to your preferences.
            </p>
          </div>

          <!-- Culinary Journeys -->
          <div class="group">
            <div class="w-14 h-14 flex items-center justify-center border border-warm-gray/30 group-hover:border-gold transition-colors duration-300 mb-6">
              <svg class="w-6 h-6 text-charcoal group-hover:text-gold transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
              </svg>
            </div>
            <h3 class="text-xl font-light text-charcoal tracking-wide mb-3">Culinary Journeys</h3>
            <p class="text-sm font-montserrat text-warm-gray leading-relaxed">
              Exclusive access to world-renowned chefs and private dining experiences in extraordinary locations.
            </p>
          </div>

          <!-- Rare Encounters -->
          <div class="group">
            <div class="w-14 h-14 flex items-center justify-center border border-warm-gray/30 group-hover:border-gold transition-colors duration-300 mb-6">
              <svg class="w-6 h-6 text-charcoal group-hover:text-gold transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
              </svg>
            </div>
            <h3 class="text-xl font-light text-charcoal tracking-wide mb-3">Rare Encounters</h3>
            <p class="text-sm font-montserrat text-warm-gray leading-relaxed">
              Unique moments that money alone cannot buy — private gallery viewings, after-hours museum tours, and more.
            </p>
          </div>

          <!-- Royal Treatment -->
          <div class="group">
            <div class="w-14 h-14 flex items-center justify-center border border-warm-gray/30 group-hover:border-gold transition-colors duration-300 mb-6">
              <svg class="w-6 h-6 text-charcoal group-hover:text-gold transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3l3.5 6L12 5l3.5 4L19 3m-7 8v10m-4-6h8"/>
              </svg>
            </div>
            <h3 class="text-xl font-light text-charcoal tracking-wide mb-3">Royal Treatment</h3>
            <p class="text-sm font-montserrat text-warm-gray leading-relaxed">
              Dedicated concierge service ensuring every moment of your journey exceeds expectations.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Villas Section -->
  <section id="villas" class="py-24 lg:py-32 bg-ivory">
    <div class="container mx-auto px-6 lg:px-12">
      <!-- Section Header -->
      <div class="max-w-2xl mb-16 lg:mb-24">
        <span class="text-sm font-montserrat tracking-[0.4em] text-warm-gray uppercase">Private Residences</span>
        <h2 class="text-3xl md:text-5xl lg:text-6xl font-light text-charcoal mt-4 tracking-wide">Exclusive Villas</h2>
        <p class="mt-6 text-lg font-montserrat font-light text-warm-gray">
          Hand-selected properties that offer the ultimate in privacy, luxury, and personalized service
        </p>
      </div>

      <!-- Villas Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Villa Serena -->
        <div class="villa-card group cursor-pointer">
          <div class="relative aspect-[3/4] overflow-hidden mb-6">
            <div class="villa-image absolute inset-0 bg-cover bg-center transition-transform duration-700" style="background-image: url('https://images.unsplash.com/photo-1602343168117-bb8ffe3e2e9f?q=80&w=1925&auto=format&fit=crop');"></div>
            <div class="absolute inset-0 bg-charcoal/10 group-hover:bg-charcoal/20 transition-colors duration-500"></div>
            <div class="absolute top-6 right-6 bg-ivory/90 backdrop-blur-sm px-4 py-2">
              <span class="text-sm font-montserrat text-charcoal">From $8,500/night</span>
            </div>
          </div>
          <div>
            <h3 class="text-2xl font-light text-charcoal tracking-wide mb-2">Villa Serena</h3>
            <div class="flex items-center gap-2 text-warm-gray mb-4">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
              <span class="text-sm font-montserrat">Amalfi Coast, Italy</span>
            </div>
            <div class="flex items-center gap-6 text-sm font-montserrat text-warm-gray">
              <div class="flex items-center gap-2">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                </svg>
                <span>Up to 12 guests</span>
              </div>
              <div class="flex items-center gap-1">
                <svg class="w-3.5 h-3.5 fill-gold text-gold" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                <span>5.0</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Château Lumière -->
        <div class="villa-card group cursor-pointer">
          <div class="relative aspect-[3/4] overflow-hidden mb-6">
            <div class="villa-image absolute inset-0 bg-cover bg-center transition-transform duration-700" style="background-image: url('https://images.unsplash.com/photo-1564501049412-61c2a3083791?q=80&w=1932&auto=format&fit=crop');"></div>
            <div class="absolute inset-0 bg-charcoal/10 group-hover:bg-charcoal/20 transition-colors duration-500"></div>
            <div class="absolute top-6 right-6 bg-ivory/90 backdrop-blur-sm px-4 py-2">
              <span class="text-sm font-montserrat text-charcoal">From $12,000/night</span>
            </div>
          </div>
          <div>
            <h3 class="text-2xl font-light text-charcoal tracking-wide mb-2">Château Lumière</h3>
            <div class="flex items-center gap-2 text-warm-gray mb-4">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
              <span class="text-sm font-montserrat">Provence, France</span>
            </div>
            <div class="flex items-center gap-6 text-sm font-montserrat text-warm-gray">
              <div class="flex items-center gap-2">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                </svg>
                <span>Up to 16 guests</span>
              </div>
              <div class="flex items-center gap-1">
                <svg class="w-3.5 h-3.5 fill-gold text-gold" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                <span>5.0</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Ocean Pearl Estate -->
        <div class="villa-card group cursor-pointer">
          <div class="relative aspect-[3/4] overflow-hidden mb-6">
            <div class="villa-image absolute inset-0 bg-cover bg-center transition-transform duration-700" style="background-image: url('https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=2070&auto=format&fit=crop');"></div>
            <div class="absolute inset-0 bg-charcoal/10 group-hover:bg-charcoal/20 transition-colors duration-500"></div>
            <div class="absolute top-6 right-6 bg-ivory/90 backdrop-blur-sm px-4 py-2">
              <span class="text-sm font-montserrat text-charcoal">From $6,800/night</span>
            </div>
          </div>
          <div>
            <h3 class="text-2xl font-light text-charcoal tracking-wide mb-2">Ocean Pearl Estate</h3>
            <div class="flex items-center gap-2 text-warm-gray mb-4">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
              <span class="text-sm font-montserrat">Bali, Indonesia</span>
            </div>
            <div class="flex items-center gap-6 text-sm font-montserrat text-warm-gray">
              <div class="flex items-center gap-2">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                </svg>
                <span>Up to 10 guests</span>
              </div>
              <div class="flex items-center gap-1">
                <svg class="w-3.5 h-3.5 fill-gold text-gold" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                <span>4.9</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- CTA -->
      <div class="text-center mt-16">
        <a href="#" class="inline-flex items-center px-8 py-4 border border-charcoal text-sm font-montserrat tracking-[0.2em] uppercase text-charcoal hover:bg-charcoal hover:text-ivory transition-all duration-300">
          View All Properties
        </a>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="py-24 lg:py-32 bg-charcoal text-ivory">
    <div class="container mx-auto px-6 lg:px-12">
      <!-- Section Header -->
      <div class="text-center mb-16 lg:mb-24">
        <span class="text-sm font-montserrat tracking-[0.4em] text-ivory/60 uppercase">Client Stories</span>
        <h2 class="text-3xl md:text-5xl lg:text-6xl font-light mt-4 tracking-wide">Voices of Excellence</h2>
      </div>

      <!-- Testimonials Grid -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
        <!-- Testimonial 1 -->
        <div class="relative">
          <svg class="w-10 h-10 text-gold/30 mb-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
          </svg>
          <blockquote class="text-lg lg:text-xl font-light leading-relaxed mb-8 text-ivory/90">
            "Élysée Voyages transformed our anniversary trip into something beyond our wildest imagination. Every moment felt like a dream."
          </blockquote>
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-gold/20 flex items-center justify-center">
              <span class="text-lg font-light text-gold">A</span>
            </div>
            <div>
              <p class="font-montserrat text-sm text-ivory">Alexandra R.</p>
              <p class="font-montserrat text-xs text-ivory/60">New York, USA</p>
            </div>
          </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="relative">
          <svg class="w-10 h-10 text-gold/30 mb-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
          </svg>
          <blockquote class="text-lg lg:text-xl font-light leading-relaxed mb-8 text-ivory/90">
            "The level of personalization and attention to detail is unmatched. They understood exactly what we were looking for."
          </blockquote>
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-gold/20 flex items-center justify-center">
              <span class="text-lg font-light text-gold">M</span>
            </div>
            <div>
              <p class="font-montserrat text-sm text-ivory">Mohammed A.</p>
              <p class="font-montserrat text-xs text-ivory/60">Dubai, UAE</p>
            </div>
          </div>
        </div>

        <!-- Testimonial 3 (Chinese) -->
        <div class="relative">
          <svg class="w-10 h-10 text-gold/30 mb-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
          </svg>
          <blockquote class="text-lg lg:text-xl font-light leading-relaxed mb-8 text-ivory/90">
            "我们的家庭旅行完美无缺。他们对每一个细节的关注让我们感到非常特别。"
          </blockquote>
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-gold/20 flex items-center justify-center">
              <span class="text-lg font-light text-gold">C</span>
            </div>
            <div>
              <p class="font-montserrat text-sm text-ivory">Chen Wei</p>
              <p class="font-montserrat text-xs text-ivory/60">Shanghai, China</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Stats -->
      <div class="mt-24 grid grid-cols-2 md:grid-cols-4 gap-8 text-center border-t border-ivory/10 pt-16">
        <div>
          <p class="text-4xl lg:text-5xl font-light text-gold mb-2">15+</p>
          <p class="text-sm font-montserrat text-ivory/60 uppercase tracking-wider">Years of Excellence</p>
        </div>
        <div>
          <p class="text-4xl lg:text-5xl font-light text-gold mb-2">2,500+</p>
          <p class="text-sm font-montserrat text-ivory/60 uppercase tracking-wider">Journeys Crafted</p>
        </div>
        <div>
          <p class="text-4xl lg:text-5xl font-light text-gold mb-2">98%</p>
          <p class="text-sm font-montserrat text-ivory/60 uppercase tracking-wider">Client Satisfaction</p>
        </div>
        <div>
          <p class="text-4xl lg:text-5xl font-light text-gold mb-2">50+</p>
          <p class="text-sm font-montserrat text-ivory/60 uppercase tracking-wider">Countries</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="inquire" class="py-24 lg:py-32 bg-[#F5F3EF]">
    <div class="container mx-auto px-6 lg:px-12">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24">
        <!-- Left Content -->
        <div>
          <span class="text-sm font-montserrat tracking-[0.4em] text-warm-gray uppercase">Begin Your Journey</span>
          <h2 class="text-3xl md:text-5xl lg:text-6xl font-light text-charcoal mt-4 tracking-wide leading-tight">
            Let's Create <br>
            <span class="italic">Something Extraordinary</span>
          </h2>
          <p class="mt-8 text-lg font-montserrat font-light text-warm-gray leading-relaxed">
            Share your vision with us, and our team of travel artisans will craft 
            a journey that exceeds your every expectation. Every inquiry receives 
            a personal response within 24 hours.
          </p>

          <!-- Contact Info -->
          <div class="mt-12 space-y-6">
            <div class="flex items-center gap-4">
              <div class="w-12 h-12 flex items-center justify-center border border-warm-gray/30">
                <svg class="w-4 h-4 text-warm-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
              </div>
              <div>
                <p class="text-sm font-montserrat text-warm-gray uppercase tracking-wider">Phone</p>
                <p class="text-lg text-charcoal">+1 (212) 555-0147</p>
              </div>
            </div>
            <div class="flex items-center gap-4">
              <div class="w-12 h-12 flex items-center justify-center border border-warm-gray/30">
                <svg class="w-4 h-4 text-warm-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
              </div>
              <div>
                <p class="text-sm font-montserrat text-warm-gray uppercase tracking-wider">Email</p>
                <p class="text-lg text-charcoal">concierge@elysee-voyages.com</p>
              </div>
            </div>
            <div class="flex items-center gap-4">
              <div class="w-12 h-12 flex items-center justify-center border border-warm-gray/30">
                <svg class="w-4 h-4 text-warm-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
              </div>
              <div>
                <p class="text-sm font-montserrat text-warm-gray uppercase tracking-wider">Offices</p>
                <p class="text-lg text-charcoal">New York · London · Dubai · Hong Kong</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Right - Form -->
        <div>
          <form class="space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-montserrat text-warm-gray uppercase tracking-wider mb-3">Full Name</label>
                <input type="text" required class="w-full px-4 py-4 bg-ivory border border-warm-gray/30 text-charcoal font-montserrat focus:border-gold focus:outline-none transition-colors" placeholder="Your name">
              </div>
              <div>
                <label class="block text-sm font-montserrat text-warm-gray uppercase tracking-wider mb-3">Email</label>
                <input type="email" required class="w-full px-4 py-4 bg-ivory border border-warm-gray/30 text-charcoal font-montserrat focus:border-gold focus:outline-none transition-colors" placeholder="your@email.com">
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-montserrat text-warm-gray uppercase tracking-wider mb-3">Phone</label>
                <input type="tel" class="w-full px-4 py-4 bg-ivory border border-warm-gray/30 text-charcoal font-montserrat focus:border-gold focus:outline-none transition-colors" placeholder="+1 (555) 000-0000">
              </div>
              <div>
                <label class="block text-sm font-montserrat text-warm-gray uppercase tracking-wider mb-3">Desired Destination</label>
                <input type="text" class="w-full px-4 py-4 bg-ivory border border-warm-gray/30 text-charcoal font-montserrat focus:border-gold focus:outline-none transition-colors" placeholder="Where would you like to go?">
              </div>
            </div>

            <div>
              <label class="block text-sm font-montserrat text-warm-gray uppercase tracking-wider mb-3">Tell Us About Your Dream Journey</label>
              <textarea rows="5" class="w-full px-4 py-4 bg-ivory border border-warm-gray/30 text-charcoal font-montserrat focus:border-gold focus:outline-none transition-colors resize-none" placeholder="Share your vision, preferences, and any special requirements..."></textarea>
            </div>

            <button type="submit" class="w-full sm:w-auto flex items-center justify-center gap-3 px-10 py-4 bg-charcoal text-ivory text-sm font-montserrat tracking-[0.2em] uppercase hover:bg-gold transition-colors duration-300">
              Send Inquiry
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
              </svg>
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer id="about" class="bg-charcoal text-ivory">
    <!-- Main Footer -->
    <div class="container mx-auto px-6 lg:px-12 py-20">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 lg:gap-8">
        <!-- Brand Column -->
        <div class="lg:col-span-2">
          <a href="#" class="inline-block mb-6">
            <span class="text-3xl font-light tracking-[0.3em]">ÉLYSÉE</span>
            <span class="block text-[10px] tracking-[0.5em] text-ivory/60 font-montserrat uppercase">Voyages</span>
          </a>
          <p class="text-sm font-montserrat text-ivory/70 leading-relaxed max-w-sm mb-8">
            For over 15 years, we have been crafting extraordinary journeys 
            for the world's most discerning travelers. Every experience is 
            a masterpiece, tailored to perfection.
          </p>
          <div class="flex items-center gap-4">
            <a href="#" class="w-10 h-10 flex items-center justify-center border border-ivory/30 hover:border-gold hover:text-gold transition-colors duration-300">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
              </svg>
            </a>
            <a href="#" class="w-10 h-10 flex items-center justify-center border border-ivory/30 hover:border-gold hover:text-gold transition-colors duration-300">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
              </svg>
            </a>
            <a href="#" class="w-10 h-10 flex items-center justify-center border border-ivory/30 hover:border-gold hover:text-gold transition-colors duration-300">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
              </svg>
            </a>
          </div>
        </div>

        <!-- Destinations Links -->
        <div>
          <h4 class="text-sm font-montserrat tracking-[0.2em] uppercase mb-6">Destinations</h4>
          <ul class="space-y-3">
            <li><a href="#" class="text-sm font-montserrat text-ivory/70 hover:text-gold transition-colors duration-300">Europe</a></li>
            <li><a href="#" class="text-sm font-montserrat text-ivory/70 hover:text-gold transition-colors duration-300">Asia</a></li>
            <li><a href="#" class="text-sm font-montserrat text-ivory/70 hover:text-gold transition-colors duration-300">Middle East</a></li>
            <li><a href="#" class="text-sm font-montserrat text-ivory/70 hover:text-gold transition-colors duration-300">Americas</a></li>
            <li><a href="#" class="text-sm font-montserrat text-ivory/70 hover:text-gold transition-colors duration-300">Africa</a></li>
          </ul>
        </div>

        <!-- Services Links -->
        <div>
          <h4 class="text-sm font-montserrat tracking-[0.2em] uppercase mb-6">Services</h4>
          <ul class="space-y-3">
            <li><a href="#" class="text-sm font-montserrat text-ivory/70 hover:text-gold transition-colors duration-300">Private Aviation</a></li>
            <li><a href="#" class="text-sm font-montserrat text-ivory/70 hover:text-gold transition-colors duration-300">Yacht Charters</a></li>
            <li><a href="#" class="text-sm font-montserrat text-ivory/70 hover:text-gold transition-colors duration-300">Villa Rentals</a></li>
            <li><a href="#" class="text-sm font-montserrat text-ivory/70 hover:text-gold transition-colors duration-300">Concierge</a></li>
            <li><a href="#" class="text-sm font-montserrat text-ivory/70 hover:text-gold transition-colors duration-300">Corporate Travel</a></li>
          </ul>
        </div>

        <!-- Company Links -->
        <div>
          <h4 class="text-sm font-montserrat tracking-[0.2em] uppercase mb-6">Company</h4>
          <ul class="space-y-3">
            <li><a href="#about" class="text-sm font-montserrat text-ivory/70 hover:text-gold transition-colors duration-300">Our Story</a></li>
            <li><a href="#" class="text-sm font-montserrat text-ivory/70 hover:text-gold transition-colors duration-300">Team</a></li>
            <li><a href="#" class="text-sm font-montserrat text-ivory/70 hover:text-gold transition-colors duration-300">Careers</a></li>
            <li><a href="#" class="text-sm font-montserrat text-ivory/70 hover:text-gold transition-colors duration-300">Press</a></li>
            <li><a href="#inquire" class="text-sm font-montserrat text-ivory/70 hover:text-gold transition-colors duration-300">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-ivory/10">
      <div class="container mx-auto px-6 lg:px-12 py-6">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
          <p class="text-xs font-montserrat text-ivory/50">
            © 2024 Élysée Voyages. All rights reserved.
          </p>
          <div class="flex items-center gap-6">
            <a href="#" class="text-xs font-montserrat text-ivory/50 hover:text-ivory transition-colors">Privacy Policy</a>
            <a href="#" class="text-xs font-montserrat text-ivory/50 hover:text-ivory transition-colors">Terms of Service</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- JavaScript for Mobile Menu and Scroll Effects -->
  <script>
    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = mobileMenuBtn.querySelector('.menu-icon');
    const closeIcon = mobileMenuBtn.querySelector('.close-icon');
    const mobileLinks = document.querySelectorAll('.mobile-link');

    mobileMenuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('active');
      menuIcon.classList.toggle('hidden');
      closeIcon.classList.toggle('hidden');
    });

    mobileLinks.forEach(link => {
      link.addEventListener('click', () => {
        mobileMenu.classList.remove('active');
        menuIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
      });
    });

    // Header Scroll Effect
    const header = document.getElementById('header');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        header.classList.add('bg-ivory/95', 'backdrop-blur-sm', 'py-4', 'shadow-sm');
        header.classList.remove('bg-transparent', 'py-6');
      } else {
        header.classList.remove('bg-ivory/95', 'backdrop-blur-sm', 'py-4', 'shadow-sm');
        header.classList.add('bg-transparent', 'py-6');
      }
    });
  </script>

</body>
</html>
