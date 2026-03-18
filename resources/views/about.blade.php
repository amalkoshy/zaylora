@extends('layouts.app')

@section('title', 'About Us – Zaylora')

@section('content')

    {{-- ─── HERO ────────────────────────────────────────────────── --}}
    <section class="relative min-h-[400px] flex items-center overflow-hidden bg-[#0f2010]">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0f2010] via-[#162d18] to-[#0f2010] opacity-90"></div>
        <div class="relative max-w-7xl mx-auto px-6 w-full flex flex-col md:flex-row items-center gap-8 py-16">
            <div class="flex-1 z-10">
                <p class="text-gray-400 text-sm uppercase tracking-widest mb-4">Our Story</p>
                <h1 class="text-white text-3xl md:text-4xl leading-snug mb-6 max-w-xl" style="font-family: 'Playfair Display', serif; font-weight: 600;">
                    Rooted in Tradition,<br>Driven by Purity
                </h1>
                <p class="text-gray-300 text-base leading-relaxed max-w-lg">
                    Rooted in a heritage that has defined culinary excellence for centuries, Zaylora brings you the purest cardamom pods to elevate every dish with a timeless, regal aroma.
                </p>
            </div>
            <div class="flex-1 flex justify-center md:justify-end z-10">
                @if($settings->banner)
                    <img src="{{ asset('storage/' . $settings->banner) }}" alt="Zaylora cardamom" class="w-full max-w-sm object-contain drop-shadow-2xl">
                @else
                    <div class="w-64 h-64 rounded-full bg-[#1e3d22] flex items-center justify-center opacity-60">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- ─── WHY CHOOSE US ───────────────────────────────────────── --}}
    <section class="py-20 bg-[#f7f3ec]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-14">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3" style="font-family: 'Playfair Display', serif;">
                    Why Choose Us
                </h2>
                <div class="w-16 h-0.5 bg-[#3a7d44] mx-auto"></div>
            </div>

            <div class="flex flex-col md:flex-row items-center gap-12">

                {{-- Left: image --}}
                <div class="flex-1 flex justify-center">
                    <div class="relative w-full max-w-sm">
                        <div class="absolute -top-4 -left-4 w-full h-full rounded-2xl bg-[#d4e8d0] -z-0"></div>
                        <div class="relative z-10 rounded-2xl overflow-hidden shadow-xl aspect-[4/5] bg-[#c8dfc0] flex items-center justify-center">
                            @if($settings->banner)
                                <img src="{{ asset('storage/' . $settings->banner) }}" alt="Cardamom" class="w-full h-full object-cover">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-32 h-32 text-[#4a7c59] opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Right: text + features --}}
                <div class="flex-1">
                    <p class="text-gray-600 text-base leading-relaxed mb-10">
                        At Zaylora, every pod is hand-selected from the lush cardamom-growing estates of Kerala, ensuring you receive nothing but the finest spice. Our commitment to quality, sustainability, and direct sourcing sets us apart from the rest.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

                        {{-- High Quality --}}
                        <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                            <div class="w-14 h-14 rounded-full bg-[#e8f5e9] flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#2e7d32]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-800 text-sm">High Quality</h3>
                            <p class="text-gray-500 text-xs mt-1 leading-relaxed">Premium grade pods rigorously selected for aroma and freshness</p>
                        </div>

                        {{-- 100% Natural --}}
                        <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                            <div class="w-14 h-14 rounded-full bg-[#e8f5e9] flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#2e7d32]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-800 text-sm">100% Natural</h3>
                            <p class="text-gray-500 text-xs mt-1 leading-relaxed">No additives, no preservatives — pure cardamom from nature</p>
                        </div>

                        {{-- Direct from Farmers --}}
                        <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                            <div class="w-14 h-14 rounded-full bg-[#e8f5e9] flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#2e7d32]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-800 text-sm">Direct from Farmers</h3>
                            <p class="text-gray-500 text-xs mt-1 leading-relaxed">Sourced directly from trusted estate farmers in Kerala</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ─── SPICE PROCESSING ────────────────────────────────────── --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-14">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3" style="font-family: 'Playfair Display', serif;">
                    Spice Processing
                </h2>
                <p class="text-gray-500 text-sm max-w-md mx-auto">
                    From the estate to your kitchen — every step handled with precision and care.
                </p>
                <div class="w-16 h-0.5 bg-[#3a7d44] mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">

                {{-- Step 1: Carefully Picked --}}
                <div class="flex flex-col items-center text-center">
                    <div class="w-20 h-20 rounded-full bg-[#e8f5e9] border-2 border-[#a5d6a7] flex items-center justify-center mb-5 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-[#2e7d32]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"/>
                        </svg>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-[#2e7d32] text-white text-xs font-bold flex items-center justify-center mb-3">1</div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-1">Carefully Picked</h3>
                    <p class="text-gray-500 text-xs leading-relaxed">Hand-harvested at peak ripeness by skilled estate workers</p>
                </div>

                {{-- Step 2: Freshly Processed --}}
                <div class="flex flex-col items-center text-center">
                    <div class="w-20 h-20 rounded-full bg-[#e8f5e9] border-2 border-[#a5d6a7] flex items-center justify-center mb-5 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-[#2e7d32]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-[#2e7d32] text-white text-xs font-bold flex items-center justify-center mb-3">2</div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-1">Freshly Processed</h3>
                    <p class="text-gray-500 text-xs leading-relaxed">Cleaned and graded under strict hygiene conditions</p>
                </div>

                {{-- Step 3: Securely Packed --}}
                <div class="flex flex-col items-center text-center">
                    <div class="w-20 h-20 rounded-full bg-[#e8f5e9] border-2 border-[#a5d6a7] flex items-center justify-center mb-5 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-[#2e7d32]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-[#2e7d32] text-white text-xs font-bold flex items-center justify-center mb-3">3</div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-1">Securely Packed</h3>
                    <p class="text-gray-500 text-xs leading-relaxed">Sealed in airtight, food-grade packaging to lock in freshness</p>
                </div>

                {{-- Step 4: Fast Delivery --}}
                <div class="flex flex-col items-center text-center">
                    <div class="w-20 h-20 rounded-full bg-[#e8f5e9] border-2 border-[#a5d6a7] flex items-center justify-center mb-5 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-[#2e7d32]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                        </svg>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-[#2e7d32] text-white text-xs font-bold flex items-center justify-center mb-3">4</div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-1">Fast Delivery</h3>
                    <p class="text-gray-500 text-xs leading-relaxed">Dispatched promptly to reach you fresh and on time</p>
                </div>

            </div>
        </div>
    </section>

    {{-- ─── OUR PRODUCTS ────────────────────────────────────────── --}}
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
