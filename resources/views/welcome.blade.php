@extends('layouts.app')

@section('title', 'Zaylora – Premium Cardamom')

@section('content')

    {{-- ─── HERO SECTION ───────────────────────────────────────── --}}
    <section class="relative min-h-[520px] flex items-center overflow-hidden bg-[#0f2010]">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0f2010] via-[#162d18] to-[#0f2010] opacity-90"></div>

        <div class="relative max-w-7xl mx-auto px-6 w-full flex flex-col md:flex-row items-center gap-8 py-16">
            <div class="flex-1 z-10">
                <p class="text-gray-400 text-sm uppercase tracking-widest mb-4">Premium Quality</p>
                <p class="text-white text-lg md:text-xl leading-relaxed mb-8 max-w-lg" style="font-family: 'Playfair Display', serif; font-weight: 400;">
                    Rooted in a heritage that has defined culinary excellence for centuries, Zaylora brings you the purest cardamom pods to elevate every dish with a timeless, regal aroma.
                </p>
                <a href="#products"
                   class="inline-block border border-white text-white text-sm tracking-widest uppercase px-8 py-3 hover:bg-white hover:text-black transition-all duration-300">
                    OUR PRODUCTS
                </a>
            </div>

            <div class="flex-1 flex justify-center md:justify-end z-10">
                @if($settings->banner)
                    <img src="{{ asset('storage/' . $settings->banner) }}" alt="Banner" class="w-full max-w-md object-contain drop-shadow-2xl">
                @elseif(file_exists(public_path('images/hero.png')))
                    <img src="{{ asset('images/hero.png') }}" alt="Cardamom pods" class="w-full max-w-md object-contain drop-shadow-2xl">
                @else
                    <div class="w-72 h-72 rounded-full bg-[#1e3d22] flex items-center justify-center opacity-60">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-32 h-32 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- ─── PRODUCTS SECTION ───────────────────────────────────── --}}
    <section id="products" class="py-20 bg-[#f7f3ec]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3" style="font-family: 'Playfair Display', serif;">
                    Our Products
                </h2>
                <p class="text-gray-500 text-sm max-w-md mx-auto">
                    Discover our range of premium-grade cardamom, sourced directly from the finest growing regions.
                </p>
                <div class="mt-4 w-16 h-0.5 bg-[#3a7d44] mx-auto"></div>
            </div>

            <livewire:products />
        </div>
    </section>

@endsection
