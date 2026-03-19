@extends('layouts.app')

@section('title', 'About Us – Zaylora')

@section('content')

    {{-- ─── HERO ────────────────────────────────────────────────── --}}
    <section class="relative min-h-[480px] flex items-center justify-center overflow-hidden">
        {{-- Background image --}}
        @if($settings->banner)
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $settings->banner) }}');"></div>
        @else
            <div class="absolute inset-0 bg-[#1a3a1e]"></div>
        @endif
        {{-- Dark overlay --}}
        <div class="absolute inset-0 bg-black/65"></div>
        {{-- Text --}}
        <div class="relative z-10 text-center max-w-3xl mx-auto px-6 py-20">
            <p class="text-green-400 text-xs uppercase tracking-[0.3em] mb-5">About Us</p>
            <p class="text-white text-lg md:text-xl leading-relaxed" style="font-family: 'Playfair Display', serif;">
                Rooted in a heritage that has defined culinary excellence for centuries, Zaylora brings you the purest cardamom pods to elevate every dish with a timeless, regal aroma.
            </p>
        </div>
    </section>

    {{-- ─── ZAYLORA SPICES ──────────────────────────────────────── --}}
    <section class="py-20 bg-[#f7f3ec]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-14">

                {{-- Image --}}
                <div class="flex-1">
                    <div class="rounded-2xl overflow-hidden shadow-xl aspect-[4/3] bg-[#c8dfc0]">
                        @if($settings->about_image1)
                            <img src="{{ asset('storage/' . $settings->about_image1) }}" alt="Zaylora Cardamom" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-[#4a7c59] opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Text --}}
                <div class="flex-1">
                    <p class="text-green-700 text-xs uppercase tracking-widest mb-3">Who We Are</p>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6" style="font-family: 'Playfair Display', serif;">
                        Zaylora Spices
                    </h2>
                    <div class="w-14 h-0.5 bg-[#3a7d44] mb-6"></div>
                    <p class="text-gray-600 text-base leading-relaxed mb-4">
                        Zaylora Spices is a new, passionate initiative born from the lush Idukki hill ranges of Rajakkad, Kerala — a region celebrated for producing the world's finest cardamom.
                    </p>
                    <p class="text-gray-600 text-base leading-relaxed">
                        We are committed to bringing fresh, safe, and high-grade cardamom directly from trusted farmers to customers. While we are just beginning our journey, our roots run deep — shaped by generations of spice-growing heritage and a heartfelt dedication to quality.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- ─── OUR STORY ───────────────────────────────────────────── --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row-reverse items-center gap-14">

                {{-- Image --}}
                <div class="flex-1">
                    <div class="rounded-2xl overflow-hidden shadow-xl aspect-[4/3] bg-[#c8dfc0]">
                        @if($settings->about_image2)
                            <img src="{{ asset('storage/' . $settings->about_image2) }}" alt="Our Story" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-[#4a7c59] opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Text --}}
                <div class="flex-1">
                    <p class="text-green-700 text-xs uppercase tracking-widest mb-3">Our Story</p>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6" style="font-family: 'Playfair Display', serif;">
                        From the Farm to Your Kitchen
                    </h2>
                    <div class="w-14 h-0.5 bg-[#3a7d44] mb-6"></div>
                    <p class="text-gray-600 text-base leading-relaxed mb-4">
                        Zaylora Spices was started with a simple but powerful mission — to make premium-quality cardamom accessible to every home and business, without compromise. We saw firsthand how middlemen dilute both quality and farmer earnings.
                    </p>
                    <p class="text-gray-600 text-base leading-relaxed">
                        This initiative bridges the gap between farm and market, ensuring every pod that reaches you is hand-picked, carefully graded, and sealed fresh — retaining the bold aroma and natural goodness that only true estate cardamom can offer.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- ─── WHAT WE OFFER ───────────────────────────────────────── --}}
    <section class="py-20 bg-[#f7f3ec]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-14">
                <p class="text-green-700 text-xs uppercase tracking-widest mb-3">Our Promise</p>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3" style="font-family: 'Playfair Display', serif;">
                    What We Offer
                </h2>
                <div class="w-14 h-0.5 bg-[#3a7d44] mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- Card 1 --}}
                <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 rounded-full bg-[#e8f5e9] flex items-center justify-center mx-auto mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#2e7d32]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-2">Premium Quality Green Cardamom</h3>
                    <p class="text-gray-500 text-xs leading-relaxed">Top-grade pods rigorously selected for size, colour, and aroma</p>
                </div>

                {{-- Card 2 --}}
                <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 rounded-full bg-[#e8f5e9] flex items-center justify-center mx-auto mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#2e7d32]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-2">Direct Sourcing from Trusted Farmers</h3>
                    <p class="text-gray-500 text-xs leading-relaxed">No middlemen — straight from estate farmers to your doorstep</p>
                </div>

                {{-- Card 3 --}}
                <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 rounded-full bg-[#e8f5e9] flex items-center justify-center mx-auto mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#2e7d32]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-2">Carefully Selected &amp; Graded Produce</h3>
                    <p class="text-gray-500 text-xs leading-relaxed">Every batch cleaned, sorted, and graded under strict hygiene standards</p>
                </div>

                {{-- Card 4 --}}
                <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 rounded-full bg-[#e8f5e9] flex items-center justify-center mx-auto mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#2e7d32]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-2">Fresh Aroma, Rich Flavour &amp; Natural Quality</h3>
                    <p class="text-gray-500 text-xs leading-relaxed">Pure cardamom with no additives, preservatives, or artificial treatment</p>
                </div>

            </div>
        </div>
    </section>

    {{-- ─── MISSION & VISION ────────────────────────────────────── --}}
    <section class="py-20 bg-[#0f1f10]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-14">
                <p class="text-green-400 text-xs uppercase tracking-widest mb-3">What Drives Us</p>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-3" style="font-family: 'Playfair Display', serif;">
                    Our Mission &amp; Vision
                </h2>
                <div class="w-14 h-0.5 bg-[#3a7d44] mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                {{-- Mission --}}
                <div class="bg-[#182e1a] border border-[#2e4d30] rounded-2xl p-10">
                    <div class="w-12 h-12 rounded-full bg-[#2e7d32]/20 flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
                        </svg>
                    </div>
                    <h3 class="text-white text-xl font-semibold mb-4" style="font-family: 'Playfair Display', serif;">Our Mission</h3>
                    <p class="text-gray-300 text-base leading-relaxed">
                        To deliver authentic, farm-fresh cardamom while supporting local farmers and maintaining the highest standards of quality and trust — making premium spice accessible to every home and business.
                    </p>
                </div>

                {{-- Vision --}}
                <div class="bg-[#182e1a] border border-[#2e4d30] rounded-2xl p-10">
                    <div class="w-12 h-12 rounded-full bg-[#2e7d32]/20 flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-white text-xl font-semibold mb-4" style="font-family: 'Playfair Display', serif;">Our Vision</h3>
                    <p class="text-gray-300 text-base leading-relaxed">
                        To grow Zaylora Spices into a trusted name in the spice industry — known for quality, commitment, and excellence — both within India and in international markets.
                    </p>
                </div>

            </div>
        </div>
    </section>

@endsection
