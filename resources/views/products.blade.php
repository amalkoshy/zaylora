@extends('layouts.app')

@section('title', 'Our Products – Zaylora')

@section('content')

    {{-- ─── HERO SLIDER (same as homepage) ─────────────────────────── --}}
    @php
        $slideData = collect([
            ['image' => $settings->slider_image1, 'text' => $settings->slider_text1],
            ['image' => $settings->slider_image2, 'text' => $settings->slider_text2],
            ['image' => $settings->slider_image3, 'text' => $settings->slider_text3],
        ])->filter(fn($s) => !empty($s['image']))->values()->all();
    @endphp

    <section class="relative min-h-[520px] flex items-center overflow-hidden bg-[#0f2010]" id="hero-slider">

        {{-- ── Full-width slide images ──────────────────────────── --}}
        @if(count($slideData) > 0)
            @foreach($slideData as $i => $slide)
                <img src="{{ asset('storage/' . $slide['image']) }}"
                     alt="Slide {{ $i + 1 }}"
                     class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
                     data-slide="{{ $i }}">
            @endforeach
        @elseif(file_exists(public_path('images/hero.png')))
            <img src="{{ asset('images/hero.png') }}" alt="Hero" class="absolute inset-0 w-full h-full object-cover">
        @endif

        {{-- ── Overlay ──────────────────────────────────────────── --}}
        <div class="absolute inset-0 bg-black/55"></div>

        {{-- ── Per-slide text blocks ────────────────────────────── --}}
        @if(count($slideData) > 0)
            @foreach($slideData as $i => $slide)
                <div class="absolute inset-0 z-10 flex items-center transition-opacity duration-700 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
                     data-slide-text="{{ $i }}">
                    <div class="max-w-7xl mx-auto px-6 w-full py-20">
                        <p class="text-gray-300 text-sm uppercase tracking-widest mb-4">Premium Quality</p>
                        @if(!empty($slide['text']))
                            <p class="text-white text-xl md:text-3xl leading-relaxed mb-8 max-w-xl"
                               style="font-family: 'Playfair Display', serif; font-weight: 400;">
                                {{ $slide['text'] }}
                            </p>
                        @else
                            <p class="text-white text-xl md:text-3xl leading-relaxed mb-8 max-w-xl"
                               style="font-family: 'Playfair Display', serif; font-weight: 400;">
                                Rooted in a heritage that has defined culinary excellence for centuries, Zaylora brings you the purest cardamom pods to elevate every dish with a timeless, regal aroma.
                            </p>
                        @endif
                        <a href="#products"
                           class="inline-block border border-white text-white text-sm tracking-widest uppercase px-8 py-3 hover:bg-white hover:text-black transition-all duration-300">
                            OUR PRODUCTS
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            {{-- Fallback static text when no slides are configured --}}
            <div class="relative z-10 max-w-7xl mx-auto px-6 w-full py-20">
                <p class="text-gray-300 text-sm uppercase tracking-widest mb-4">Premium Quality</p>
                <p class="text-white text-xl md:text-3xl leading-relaxed mb-8 max-w-xl"
                   style="font-family: 'Playfair Display', serif; font-weight: 400;">
                    Rooted in a heritage that has defined culinary excellence for centuries, Zaylora brings you the purest cardamom pods to elevate every dish with a timeless, regal aroma.
                </p>
                <a href="#products"
                   class="inline-block border border-white text-white text-sm tracking-widest uppercase px-8 py-3 hover:bg-white hover:text-black transition-all duration-300">
                    OUR PRODUCTS
                </a>
            </div>
        @endif

        {{-- ── Prev / Next arrows ───────────────────────────────── --}}
        @if(count($slideData) > 1)
            <button id="slider-prev"
                    class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-black/30 hover:bg-black/60 text-white flex items-center justify-center transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button id="slider-next"
                    class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-black/30 hover:bg-black/60 text-white flex items-center justify-center transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            {{-- ── Dots ─────────────────────────────────────────── --}}
            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex gap-2">
                @foreach($slideData as $i => $slide)
                    <button class="slider-dot w-2.5 h-2.5 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-white' : 'bg-white/40' }}"
                            data-index="{{ $i }}"></button>
                @endforeach
            </div>
        @endif
    </section>

    {{-- ─── WHOLESALE CARDAMOM AVAILABLE ───────────────────────────── --}}
    <section class="py-20 bg-white">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <p class="text-green-700 text-xs uppercase tracking-widest mb-3">Bulk Orders Welcome</p>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 leading-snug" style="font-family: 'Playfair Display', serif;">
                Wholesale Cardamom Available
            </h2>
            <div class="w-14 h-0.5 bg-[#3a7d44] mt-4 mx-auto mb-8"></div>
            <p class="text-gray-600 text-base leading-relaxed mb-4">
                Zaylora Spices offers premium-grade cardamom in bulk quantities to retailers, exporters, distributors, and businesses across India. Our wholesale supply chain is built on direct farm partnerships, ensuring freshness and quality at every scale.
            </p>
            <p class="text-gray-600 text-base leading-relaxed mb-10">
                Whether you need small bulk packs or large commercial quantities, we provide flexible pricing and reliable delivery. Reach out to us directly to discuss your requirements and get a competitive quote.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="tel:+919074862344"
                   class="inline-flex items-center gap-2 bg-[#1e5c2e] text-white font-semibold px-7 py-3 rounded-xl hover:bg-[#174d25] transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    Call Us
                </a>
                <a href="https://wa.me/919074862344"
                   target="_blank"
                   class="inline-flex items-center gap-2 bg-[#25d366] text-white font-semibold px-7 py-3 rounded-xl hover:bg-[#1ebe5a] transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    WhatsApp
                </a>
            </div>
        </div>
    </section>

    {{-- ─── PRODUCTS SECTION ────────────────────────────────────────── --}}
    <section id="products" class="py-20 bg-[#f7f3ec] scroll-mt-16">
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

@push('scripts')
<script>
(function () {
    const slider = document.getElementById('hero-slider');
    if (!slider) return;

    const slides = Array.from(slider.querySelectorAll('[data-slide]'));
    const texts  = Array.from(slider.querySelectorAll('[data-slide-text]'));
    const dots   = Array.from(slider.querySelectorAll('.slider-dot'));
    const prev   = document.getElementById('slider-prev');
    const next   = document.getElementById('slider-next');

    if (slides.length <= 1) return;

    let current = 0;
    let timer;

    function goTo(index) {
        slides[current].classList.replace('opacity-100', 'opacity-0');
        texts[current]?.classList.replace('opacity-100', 'opacity-0');
        dots[current]?.classList.replace('bg-white', 'bg-white/40');

        current = (index + slides.length) % slides.length;

        slides[current].classList.replace('opacity-0', 'opacity-100');
        texts[current]?.classList.replace('opacity-0', 'opacity-100');
        dots[current]?.classList.replace('bg-white/40', 'bg-white');
    }

    function resetTimer() {
        clearInterval(timer);
        timer = setInterval(() => goTo(current + 1), 5000);
    }

    dots.forEach((dot, i) => dot.addEventListener('click', () => { goTo(i); resetTimer(); }));
    prev?.addEventListener('click', () => { goTo(current - 1); resetTimer(); });
    next?.addEventListener('click', () => { goTo(current + 1); resetTimer(); });

    resetTimer();
})();
</script>
@endpush
