@extends('layouts.app')

@section('title', 'Gallery – Zaylora')

@section('content')

<div
    x-data="galleryApp()"
    @keydown.escape.window="close()"
    @keydown.arrow-left.window="prev()"
    @keydown.arrow-right.window="next()">

    {{-- ── PAGE HEADER ── --}}
    <div class="pt-28 pb-14 bg-[#0d1f12] text-center">
        <p class="text-[#3a7d44] text-xs tracking-[0.25em] uppercase mb-3">Zaylora Spices</p>
        <h1 class="text-4xl md:text-5xl font-bold text-white" style="font-family: 'Playfair Display', serif;">
            Our Gallery
        </h1>
        <p class="text-gray-400 text-sm mt-3 max-w-sm mx-auto">
            A glimpse into our farms, processing, and the finest cardamom we bring to your kitchen.
        </p>
        <div class="mt-5 w-16 h-0.5 bg-[#3a7d44] mx-auto"></div>
    </div>

    {{-- ── MASONRY GRID ── --}}
    <section class="bg-[#f7f3ec] py-14 px-4 sm:px-6 lg:px-10">
        @if($photos->isEmpty())
            <div class="text-center py-24">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-gray-400 text-sm">No photos yet. Check back soon.</p>
            </div>
        @else
            <div class="max-w-7xl mx-auto" style="columns: 2; column-gap: 0.75rem;">
                {{-- md: 3 cols, lg: 4 cols via inline style override with responsive wrapper --}}
                <style>
                    @media (min-width: 640px)  { .gallery-masonry { columns: 3 !important; } }
                    @media (min-width: 1024px) { .gallery-masonry { columns: 4 !important; } }
                </style>
                <div class="gallery-masonry" style="columns: 2; column-gap: 0.75rem;">
                    @foreach($photos as $index => $photo)
                        <div
                            class="break-inside-avoid mb-3 cursor-pointer group relative overflow-hidden rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300"
                            @click="openPhoto({{ $index }})"
                        >
                            <img
                                src="{{ asset('storage/' . $photo->image) }}"
                                alt="{{ $photo->caption ?? 'Gallery photo' }}"
                                class="w-full object-cover block group-hover:scale-105 transition-transform duration-500"
                                loading="lazy"
                            >
                            {{-- Hover overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                @if($photo->caption)
                                    <p class="text-white text-sm font-medium leading-snug translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                        {{ $photo->caption }}
                                    </p>
                                @endif
                                <div class="absolute top-3 right-3 bg-white/20 backdrop-blur-sm rounded-full p-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    {{-- ── LIGHTBOX ── --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[200] bg-black/95 flex flex-col items-center justify-center"
        style="display: none;"
        @click.self="close()"
    >
        {{-- Close button --}}
        <button @click="close()"
                class="absolute top-4 right-4 text-white/70 hover:text-white transition-colors z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        {{-- Counter --}}
        <div class="absolute top-5 left-1/2 -translate-x-1/2 text-white/50 text-xs tracking-widest">
            <span x-text="current + 1"></span> / <span x-text="photos.length"></span>
        </div>

        {{-- Prev --}}
        <button @click.stop="prev()"
                class="absolute left-3 sm:left-6 text-white/60 hover:text-white transition-colors z-10 bg-white/10 hover:bg-white/20 rounded-full p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        {{-- Image --}}
        <div class="max-w-4xl w-full px-16 sm:px-20 flex flex-col items-center">
            <template x-if="photos.length > 0">
                <img
                    :src="photos[current].src"
                    :alt="photos[current].caption"
                    class="max-h-[75vh] w-auto max-w-full object-contain rounded-xl shadow-2xl"
                >
            </template>
            <p x-show="photos[current] && photos[current].caption"
               x-text="photos[current] ? photos[current].caption : ''"
               class="mt-4 text-white/80 text-sm text-center max-w-lg">
            </p>
        </div>

        {{-- Next --}}
        <button @click.stop="next()"
                class="absolute right-3 sm:right-6 text-white/60 hover:text-white transition-colors z-10 bg-white/10 hover:bg-white/20 rounded-full p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        {{-- Thumbnail strip --}}
        @if($photos->count() > 1)
        <div class="absolute bottom-4 left-0 right-0 flex justify-center gap-2 px-4 overflow-x-auto">
            @foreach($photos as $index => $photo)
                <button
                    @click.stop="openPhoto({{ $index }})"
                    class="shrink-0 w-12 h-12 rounded-lg overflow-hidden transition-all duration-200"
                    :class="{{ $index }} === current ? 'ring-2 ring-[#3a7d44] opacity-100' : 'opacity-50 hover:opacity-80'"
                >
                    <img src="{{ asset('storage/' . $photo->image) }}" class="w-full h-full object-cover">
                </button>
            @endforeach
        </div>
        @endif
    </div>
</div>

@endsection

@push('scripts')
<script>
function galleryApp() {
    return {
        open: false,
        current: 0,
        photos: @json($photos->map(fn($p) => ['src' => asset('storage/' . $p->image), 'caption' => $p->caption ?? ''])->values()),
        openPhoto(index) {
            this.current = index;
            this.open = true;
            document.body.style.overflow = 'hidden';
        },
        close() {
            this.open = false;
            document.body.style.overflow = '';
        },
        prev() {
            if (!this.open) return;
            this.current = (this.current - 1 + this.photos.length) % this.photos.length;
        },
        next() {
            if (!this.open) return;
            this.current = (this.current + 1) % this.photos.length;
        },
    };
}
</script>
@endpush
