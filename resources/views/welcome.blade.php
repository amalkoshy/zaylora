@extends('layouts.app')

@section('title', 'Zaylora – Premium Cardamom')

@section('content')

    {{-- ─── HERO SECTION ───────────────────────────────────────── --}}
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

    {{-- ─── WHY CHOOSE US ───────────────────────────────────────── --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Section header --}}
            <div class="text-center mb-14">
                <p class="text-green-700 text-xs uppercase tracking-widest mb-3">Our Promise</p>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 leading-snug" style="font-family: 'Playfair Display', serif;">
                    Why Choose Us
                </h2>
                <div class="w-14 h-0.5 bg-[#3a7d44] mt-4 mx-auto"></div>
            </div>

            <div class="flex flex-col md:flex-row gap-14 items-center">

                {{-- Left: image --}}
                <div class="md:w-2/5 w-full flex-shrink-0">
                    @if($settings->why_image)
                        <img src="{{ asset('storage/' . $settings->why_image) }}"
                             alt="Why Choose Zaylora"
                             class="w-full h-80 md:h-[420px] object-cover rounded-2xl shadow-md">
                    @else
                        <div class="w-full h-80 md:h-[420px] rounded-2xl bg-[#0f2010] flex items-center justify-center shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif
                </div>

                {{-- Right: text + 3 feature cards --}}
                <div class="md:w-3/5 flex flex-col gap-8">

                    {{-- Description --}}
                    <div>
                        <p class="text-gray-600 text-base leading-relaxed mb-4">
                            {{ $settings->why_desc1 ?: 'Zaylora Spices is a trusted name in premium cardamom, rooted in the lush highlands of Idukki, Kerala. We partner directly with experienced farmers to bring you spices that are fresh, natural, and full of character.' }}
                        </p>
                        <p class="text-gray-600 text-base leading-relaxed">
                            {{ $settings->why_desc2 ?: 'Every batch is handpicked at peak freshness, naturally dried, and carefully graded to meet the highest quality benchmarks for both household kitchens and large-scale buyers.' }}
                        </p>
                    </div>

                    {{-- 3 feature cards --}}
                    @php
                        $features = [
                            [
                                'title' => $settings->why_feature1_title ?: 'High Quality',
                                'desc'  => $settings->why_feature1_desc  ?: '',
                                'image' => $settings->why_feature1_image,
                                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>',
                            ],
                            [
                                'title' => $settings->why_feature2_title ?: '100% Natural',
                                'desc'  => $settings->why_feature2_desc  ?: '',
                                'image' => $settings->why_feature2_image,
                                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M5 3s1 9 7 12C18 12 19 3 19 3s-6 1-7 5c-1-4-7-5-7-5z"/>',
                            ],
                            [
                                'title' => $settings->why_feature3_title ?: 'Direct from Farmers',
                                'desc'  => $settings->why_feature3_desc  ?: '',
                                'image' => $settings->why_feature3_image,
                                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>',
                            ],
                        ];
                    @endphp
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                        @foreach($features as $feat)
                        <div class="flex flex-col items-center text-center p-6 rounded-xl bg-[#f7f3ec] border border-[#e8e0d0]">
                            @if(!empty($feat['image']))
                                <div class="w-14 h-14 rounded-full overflow-hidden mb-4 flex-shrink-0">
                                    <img src="{{ asset('storage/' . $feat['image']) }}" alt="{{ $feat['title'] }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="w-14 h-14 rounded-full bg-[#1e5c2e]/10 flex items-center justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#1e5c2e]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                                        {!! $feat['icon'] !!}
                                    </svg>
                                </div>
                            @endif
                            <h3 class="text-gray-800 font-semibold text-sm mb-2">{{ $feat['title'] }}</h3>
                            <p class="text-gray-500 text-xs leading-relaxed">{{ $feat['desc'] }}</p>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- ─── SPICE PROCESSING ────────────────────────────────────── --}}
    @php
        $steps = [
            [
                'title' => $settings->process1_title ?: 'Carefully Picked',
                'desc'  => $settings->process1_desc  ?: '',
                'image' => $settings->process1_image,
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"/>',
            ],
            [
                'title' => $settings->process2_title ?: 'Freshly Processed',
                'desc'  => $settings->process2_desc  ?: '',
                'image' => $settings->process2_image,
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>',
            ],
            [
                'title' => $settings->process3_title ?: 'Securely Packed',
                'desc'  => $settings->process3_desc  ?: '',
                'image' => $settings->process3_image,
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>',
            ],
            [
                'title' => $settings->process4_title ?: 'Fast Delivery',
                'desc'  => $settings->process4_desc  ?: '',
                'image' => $settings->process4_image,
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>',
            ],
        ];
    @endphp
    <section class="py-20 bg-[#f7f3ec]">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Section header --}}
            <div class="text-center mb-14">
                <p class="text-green-700 text-xs uppercase tracking-widest mb-3">Farm to Table</p>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 leading-snug" style="font-family: 'Playfair Display', serif;">
                    Spice Processing
                </h2>
                <div class="w-14 h-0.5 bg-[#3a7d44] mt-4 mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($steps as $i => $step)
                <div class="flex flex-col items-center text-center">
                    @if(!empty($step['image']))
                        <div class="w-24 h-24 rounded-full overflow-hidden mb-4 flex-shrink-0">
                            <img src="{{ asset('storage/' . $step['image']) }}" alt="{{ $step['title'] }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="w-24 h-24 rounded-full bg-[#1e5c2e]/10 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-[#1e5c2e]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                {!! $step['icon'] !!}
                            </svg>
                        </div>
                    @endif
                    <h3 class="text-gray-800 font-semibold text-base">{{ $step['title'] }}</h3>
                </div>
                @endforeach
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
