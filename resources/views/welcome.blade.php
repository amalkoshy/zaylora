@extends('layouts.app')

@section('title', 'Zaylora – Premium Cardamom')

@section('content')

    {{-- ─── HERO SECTION ───────────────────────────────────────── --}}
    @php
        $slides = collect([
            $settings->slider_image1,
            $settings->slider_image2,
            $settings->slider_image3,
        ])->filter()->values()->all();
    @endphp

    <section class="relative min-h-[520px] flex items-center overflow-hidden bg-[#0f2010]" id="hero-slider">

        {{-- ── Full-width slide images ──────────────────────────── --}}
        @if(count($slides) > 0)
            @foreach($slides as $i => $slide)
                <img src="{{ asset('storage/' . $slide) }}"
                     alt="Slide {{ $i + 1 }}"
                     class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
                     data-slide="{{ $i }}">
            @endforeach
        @elseif(file_exists(public_path('images/hero.png')))
            <img src="{{ asset('images/hero.png') }}" alt="Hero" class="absolute inset-0 w-full h-full object-cover">
        @endif

        {{-- ── Overlay ──────────────────────────────────────────── --}}
        <div class="absolute inset-0 bg-black/55"></div>

        {{-- ── Text content ─────────────────────────────────────── --}}
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

        {{-- ── Prev / Next arrows ───────────────────────────────── --}}
        @if(count($slides) > 1)
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
                @foreach($slides as $i => $slide)
                    <button class="slider-dot w-2.5 h-2.5 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-white' : 'bg-white/40' }}"
                            data-index="{{ $i }}"></button>
                @endforeach
            </div>
        @endif
    </section>

    {{-- ─── WHOLESALE SECTION ──────────────────────────────────── --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row gap-14 items-start">

                {{-- Left: heading --}}
                <div class="md:w-2/5">
                    <p class="text-green-700 text-xs uppercase tracking-widest mb-3">Bulk Supply</p>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 leading-snug" style="font-family: 'Playfair Display', serif;">
                        Wholesale Cardamom Available
                    </h2>
                    <div class="w-14 h-0.5 bg-[#3a7d44] mt-5"></div>
                </div>

                {{-- Right: description --}}
                <div class="md:w-3/5 space-y-4 pt-1">
                    <p class="text-gray-600 text-base leading-relaxed">
                        We supply premium green cardamom in bulk quantities for wholesalers, retailers, exporters, and traders. Our cardamom is freshly dried, carefully graded, and available in different quality standards to meet your specific requirements.
                    </p>
                    <p class="text-gray-600 text-base leading-relaxed">
                        All orders are carefully packed and dispatched from our facility in Rajakkad, Kerala. Our prices are competitive and negotiable based on quantity and quality grade. Contact us to enquire about bulk pricing and availability.
                    </p>
                    <a href="#contact"
                       class="inline-flex items-center gap-2 bg-[#1e5c2e] hover:bg-[#174a25] text-white text-sm font-medium px-6 py-3 rounded-lg transition-colors mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        Enquire Now
                    </a>
                </div>

            </div>
        </div>
    </section>

    {{-- ─── PRODUCTS SECTION ───────────────────────────────────── --}}
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
    const dots   = Array.from(slider.querySelectorAll('.slider-dot'));
    const prev   = document.getElementById('slider-prev');
    const next   = document.getElementById('slider-next');

    if (slides.length <= 1) return;

    let current = 0;
    let timer;

    function goTo(index) {
        slides[current].classList.replace('opacity-100', 'opacity-0');
        dots[current]?.classList.replace('bg-white', 'bg-white/40');

        current = (index + slides.length) % slides.length;

        slides[current].classList.replace('opacity-0', 'opacity-100');
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
