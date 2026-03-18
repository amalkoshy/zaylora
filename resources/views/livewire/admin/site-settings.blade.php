<div class="max-w-2xl space-y-8">

    {{-- ── Logo ───────────────────────────────────────────── --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <h2 class="text-base font-semibold text-gray-800 mb-1">Site Logo</h2>
        <p class="text-sm text-gray-500 mb-6">Displayed in the navbar. Recommended: transparent PNG, height 48–64 px.</p>

        <div class="flex items-center gap-6 mb-4">
            {{-- Preview --}}
            <div class="w-32 h-16 rounded-lg border border-gray-200 bg-gray-50 flex items-center justify-center overflow-hidden shrink-0">
                @if($logo)
                    <img src="{{ $logo->temporaryUrl() }}" class="max-h-full max-w-full object-contain p-1">
                @elseif($existingLogo)
                    <img src="{{ asset('storage/' . $existingLogo) }}" class="max-h-full max-w-full object-contain p-1">
                @else
                    <span class="text-xs text-gray-400">No logo</span>
                @endif
            </div>

            <div class="flex flex-col gap-2">
                <label class="cursor-pointer inline-flex items-center gap-2 text-sm font-medium text-[#1e5c2e] hover:text-[#174a25] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    {{ $existingLogo || $logo ? 'Replace logo' : 'Upload logo' }}
                    <input type="file" wire:model="logo" accept="image/*" class="hidden">
                </label>
                <div wire:loading wire:target="logo" class="text-xs text-gray-400">Uploading...</div>

                @if($existingLogo && !$logo)
                    <button type="button" wire:click="removeLogo"
                            class="inline-flex items-center gap-1 text-xs text-red-500 hover:text-red-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Remove logo
                    </button>
                @endif
            </div>
        </div>

        @error('logo')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
        <p class="text-xs text-gray-400">JPG, PNG, GIF, SVG – max 2 MB</p>
    </div>

    {{-- ── Banner ──────────────────────────────────────────── --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <h2 class="text-base font-semibold text-gray-800 mb-1">Hero Banner Image</h2>
        <p class="text-sm text-gray-500 mb-6">Shown on the right side of the homepage hero section. Recommended: 800×600 px or larger.</p>

        <div class="flex items-start gap-6 mb-4">
            {{-- Preview --}}
            <div class="w-48 h-32 rounded-lg border border-gray-200 bg-gray-50 flex items-center justify-center overflow-hidden shrink-0">
                @if($banner)
                    <img src="{{ $banner->temporaryUrl() }}" class="w-full h-full object-cover">
                @elseif($existingBanner)
                    <img src="{{ asset('storage/' . $existingBanner) }}" class="w-full h-full object-cover">
                @else
                    <span class="text-xs text-gray-400">No banner</span>
                @endif
            </div>

            <div class="flex flex-col gap-2">
                <label class="cursor-pointer inline-flex items-center gap-2 text-sm font-medium text-[#1e5c2e] hover:text-[#174a25] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    {{ $existingBanner || $banner ? 'Replace banner' : 'Upload banner' }}
                    <input type="file" wire:model="banner" accept="image/*" class="hidden">
                </label>
                <div wire:loading wire:target="banner" class="text-xs text-gray-400">Uploading...</div>

                @if($existingBanner && !$banner)
                    <button type="button" wire:click="removeBanner"
                            class="inline-flex items-center gap-1 text-xs text-red-500 hover:text-red-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Remove banner
                    </button>
                @endif
            </div>
        </div>

        @error('banner')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
        <p class="text-xs text-gray-400">JPG, PNG – max 4 MB</p>
    </div>

    {{-- ── Save button ─────────────────────────────────────── --}}
    <div>
        <button
            type="button"
            wire:click="save"
            class="bg-[#1e5c2e] hover:bg-[#174a25] text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition-colors"
            wire:loading.attr="disabled"
            wire:loading.class="opacity-70 cursor-wait"
        >
            <span wire:loading.remove wire:target="save">Save Settings</span>
            <span wire:loading wire:target="save">Saving...</span>
        </button>
    </div>

</div>
