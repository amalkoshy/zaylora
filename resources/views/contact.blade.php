@extends('layouts.app')

@section('title', 'Contact Us – Zaylora')

@section('content')

    {{-- ── PAGE HEADER ── --}}
    <div class="pt-28 pb-14 bg-[#0d1f12] text-center">
        <p class="text-[#3a7d44] text-xs tracking-[0.25em] uppercase mb-3">Get In Touch</p>
        <h1 class="text-4xl md:text-5xl font-bold text-white" style="font-family: 'Playfair Display', serif;">
            Contact Us
        </h1>
        <p class="text-gray-400 text-sm mt-3 max-w-sm mx-auto">
            Have a question or want to place a bulk order? We'd love to hear from you.
        </p>
        <div class="mt-5 w-16 h-0.5 bg-[#3a7d44] mx-auto"></div>
    </div>

    {{-- ── MAIN CONTENT ── --}}
    <section class="bg-[#f7f3ec] py-16 px-4 sm:px-6 lg:px-10">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">

                {{-- ─── LEFT: Contact Info ─── --}}
                <div class="space-y-5">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-1" style="font-family: 'Playfair Display', serif;">
                            We're here to help
                        </h2>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Reach out through any of the channels below or use the form to send us a message directly.
                        </p>
                    </div>

                    {{-- Phone --}}
                    <a href="tel:+919074862344"
                       class="flex items-start gap-4 bg-white rounded-2xl p-5 shadow-sm hover:shadow-md transition-shadow group">
                        <div class="w-11 h-11 bg-[#eaf4ec] rounded-xl flex items-center justify-center shrink-0 group-hover:bg-[#3a7d44] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#3a7d44] group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider mb-0.5">Phone</p>
                            <p class="text-gray-800 font-medium text-sm">+91 90748 62344</p>
                            <p class="text-gray-400 text-xs mt-0.5">Mon–Sat, 9 AM – 6 PM</p>
                        </div>
                    </a>

                    {{-- WhatsApp --}}
                    <a href="https://wa.me/919074862344" target="_blank"
                       class="flex items-start gap-4 bg-white rounded-2xl p-5 shadow-sm hover:shadow-md transition-shadow group">
                        <div class="w-11 h-11 bg-[#eaf4ec] rounded-xl flex items-center justify-center shrink-0 group-hover:bg-[#3a7d44] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#3a7d44] group-hover:text-white transition-colors" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider mb-0.5">WhatsApp</p>
                            <p class="text-gray-800 font-medium text-sm">+91 90748 62344</p>
                            <p class="text-gray-400 text-xs mt-0.5">Quick replies on WhatsApp</p>
                        </div>
                    </a>

                    {{-- Email --}}
                    <a href="mailto:zayloraspices@gmail.com"
                       class="flex items-start gap-4 bg-white rounded-2xl p-5 shadow-sm hover:shadow-md transition-shadow group">
                        <div class="w-11 h-11 bg-[#eaf4ec] rounded-xl flex items-center justify-center shrink-0 group-hover:bg-[#3a7d44] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#3a7d44] group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider mb-0.5">Email</p>
                            <p class="text-gray-800 font-medium text-sm">zayloraspices@gmail.com</p>
                            <p class="text-gray-400 text-xs mt-0.5">We reply within 24 hours</p>
                        </div>
                    </a>

                    {{-- Address --}}
                    <div class="flex items-start gap-4 bg-white rounded-2xl p-5 shadow-sm">
                        <div class="w-11 h-11 bg-[#eaf4ec] rounded-xl flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#3a7d44]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider mb-0.5">Address</p>
                            <p class="text-gray-800 font-medium text-sm leading-snug">
                                Zaylora Spices, Kuruvilla City,<br>
                                Rajakumari, Kerala 685619
                            </p>
                        </div>
                    </div>
                </div>

                {{-- ─── RIGHT: Contact Form ─── --}}
                <div class="bg-white rounded-2xl shadow-md p-7 sm:p-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-1" style="font-family: 'Playfair Display', serif;">
                        Send us a message
                    </h2>
                    <p class="text-gray-400 text-sm mb-6">Fill in the form and we'll get back to you.</p>

                    <livewire:contact-form />
                </div>

            </div>
        </div>
    </section>

@endsection
