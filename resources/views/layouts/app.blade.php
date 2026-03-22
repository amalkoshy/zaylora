<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Zaylora – Premium Cardamom')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased" style="font-family: 'Inter', sans-serif;">

    {{-- ─── NAVBAR ──────────────────────────────────────────────── --}}
    <nav class="fixed top-0 left-0 right-0 z-50 transition-colors duration-300" id="main-nav">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/">
                @if($settings->logo)
                    <img src="{{ asset('storage/' . $settings->logo) }}" alt="Zaylora" class="h-10 w-auto object-contain">
                @else
                    <span class="text-white text-2xl font-bold tracking-[0.2em]" style="font-family: 'Playfair Display', serif;">ZAYLORA</span>
                @endif
            </a>
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ url('/') }}"
                   class="text-sm font-medium transition-colors {{ request()->is('/') ? 'text-green-400' : 'text-gray-300 hover:text-green-400' }}">Home</a>
                <a href="{{ route('about') }}"
                   class="text-sm transition-colors {{ request()->routeIs('about') ? 'text-green-400' : 'text-gray-300 hover:text-green-400' }}">About Us</a>
                <a href="{{ url('/#products') }}"
                   class="text-gray-300 text-sm hover:text-green-400 transition-colors">Products</a>
                <a href="#gallery"
                   class="text-gray-300 text-sm hover:text-green-400 transition-colors">Gallery</a>
                <a href="#contact"
                   class="text-gray-300 text-sm hover:text-green-400 transition-colors">Contact Us</a>
            </div>
            <button class="md:hidden text-white" id="nav-toggle">
                <svg id="icon-open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="icon-close" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="md:hidden hidden bg-black px-6 pb-4" id="mobile-menu">
            <a href="{{ url('/') }}" class="block text-white py-2 text-sm">Home</a>
            <a href="{{ route('about') }}" class="block text-gray-300 py-2 text-sm">About Us</a>
            <a href="{{ url('/#products') }}" class="block text-gray-300 py-2 text-sm">Products</a>
            <a href="#gallery" class="block text-gray-300 py-2 text-sm">Gallery</a>
            <a href="#contact" class="block text-gray-300 py-2 text-sm">Contact Us</a>
        </div>
    </nav>

    {{-- ─── PAGE CONTENT ────────────────────────────────────────── --}}
    @yield('content')

    {{-- ─── FOOTER ─────────────────────────────────────────────── --}}
    <footer id="contact" class="bg-[#111111] text-white pt-14 pb-8">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 pb-10 border-b border-gray-800">

                <div>
                    <h4 class="text-xs uppercase tracking-widest text-gray-400 mb-4">Contact Us</h4>
                    <ul class="space-y-3 text-sm text-gray-300">
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-0.5 text-green-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>+91 9074862344</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-0.5 text-green-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Zaylora spices,<br>Kuruvilla City, Rajakumari, Kerala 685619</span>
                        </li>
                    </ul>
                </div>

                <div class="flex flex-col items-center text-center">
                    @if($settings->logo)
                        <img src="{{ asset('storage/' . $settings->logo) }}" alt="Zaylora" class="h-12 w-auto object-contain mb-2">
                    @else
                        <div class="text-3xl font-bold tracking-[0.25em] mb-2" style="font-family: 'Playfair Display', serif;">ZAYLORA</div>
                    @endif
                    <p class="text-gray-400 text-xs tracking-widest uppercase">From Nature's Heart to Your Kitchen</p>
                </div>

                <div class="md:text-right">
                    <h4 class="text-xs uppercase tracking-widest text-gray-400 mb-4">Enquiries</h4>
                    <a href="mailto:zayloraspices@gmail.com" class="text-sm text-gray-300 hover:text-green-400 transition-colors">
                       zayloraspices@gmail.com
                    </a>
                    <h4 class="text-xs uppercase tracking-widest text-gray-400 mt-6 mb-3">Follow Us</h4>
                    <div class="flex gap-4 md:justify-end">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors" aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors" aria-label="Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="https://wa.me/91XXXXXXXXXX" target="_blank" class="text-gray-400 hover:text-white transition-colors" aria-label="WhatsApp">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <p class="text-center text-gray-600 text-xs mt-6">
                &copy; {{ date('Y') }} Zaylora. All rights reserved.
            </p>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('nav-toggle')?.addEventListener('click', () => {
            const menu = document.getElementById('mobile-menu');
            const iconOpen  = document.getElementById('icon-open');
            const iconClose = document.getElementById('icon-close');
            const isHidden = menu.classList.contains('hidden');
            menu.classList.toggle('hidden');
            iconOpen.classList.toggle('hidden', isHidden);
            iconClose.classList.toggle('hidden', !isHidden);
        });

        // Scroll-aware navbar: transparent at top, solid black when scrolled
        (function () {
            const nav = document.getElementById('main-nav');
            function update() {
                if (window.scrollY > 10) {
                    nav.classList.add('bg-black');
                } else {
                    nav.classList.remove('bg-black');
                }
            }
            window.addEventListener('scroll', update, { passive: true });
            update();
        })();
    </script>

    @stack('scripts')
    @livewireScripts
</body>
</html>
