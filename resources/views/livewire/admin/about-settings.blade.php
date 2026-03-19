<div class="max-w-2xl space-y-8">

    {{-- ── Section Image 1 (Zaylora Spices) ───────────────────── --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <h2 class="text-base font-semibold text-gray-800 mb-1">Zaylora Spices Section Image</h2>
        <p class="text-sm text-gray-500 mb-6">Shown in the "Zaylora Spices" section on the About Us page. Recommended: 800×600 px or larger.</p>

        <div class="flex items-start gap-6 mb-4">
            {{-- Preview --}}
            <div class="w-48 h-32 rounded-lg border border-gray-200 bg-gray-50 flex items-center justify-center overflow-hidden shrink-0">
                @if($aboutImage1)
                    <img src="{{ $aboutImage1->temporaryUrl() }}" class="w-full h-full object-cover">
                @elseif($existingAboutImage1)
                    <img src="{{ asset('storage/' . $existingAboutImage1) }}" class="w-full h-full object-cover">
                @else
                    <span class="text-xs text-gray-400">No image</span>
                @endif
            </div>

            <div class="flex flex-col gap-2">
                <label class="cursor-pointer inline-flex items-center gap-2 text-sm font-medium text-[#1e5c2e] hover:text-[#174a25] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    {{ $existingAboutImage1 || $aboutImage1 ? 'Replace image' : 'Upload image' }}
                    <input type="file" wire:model="aboutImage1" accept="image/*" class="hidden">
                </label>
                <div wire:loading wire:target="aboutImage1" class="text-xs text-gray-400">Uploading...</div>

                @if($existingAboutImage1 && !$aboutImage1)
                    <button type="button" wire:click="removeAboutImage1"
                            class="inline-flex items-center gap-1 text-xs text-red-500 hover:text-red-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Remove image
                    </button>
                @endif
            </div>
        </div>

        @error('aboutImage1')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
        <p class="text-xs text-gray-400">JPG, PNG – max 4 MB</p>
    </div>

    {{-- ── Section Image 2 (Our Story) ─────────────────────────── --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <h2 class="text-base font-semibold text-gray-800 mb-1">Our Story Section Image</h2>
        <p class="text-sm text-gray-500 mb-6">Shown in the "Our Story" section on the About Us page. Recommended: 800×600 px or larger.</p>

        <div class="flex items-start gap-6 mb-4">
            {{-- Preview --}}
            <div class="w-48 h-32 rounded-lg border border-gray-200 bg-gray-50 flex items-center justify-center overflow-hidden shrink-0">
                @if($aboutImage2)
                    <img src="{{ $aboutImage2->temporaryUrl() }}" class="w-full h-full object-cover">
                @elseif($existingAboutImage2)
                    <img src="{{ asset('storage/' . $existingAboutImage2) }}" class="w-full h-full object-cover">
                @else
                    <span class="text-xs text-gray-400">No image</span>
                @endif
            </div>

            <div class="flex flex-col gap-2">
                <label class="cursor-pointer inline-flex items-center gap-2 text-sm font-medium text-[#1e5c2e] hover:text-[#174a25] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    {{ $existingAboutImage2 || $aboutImage2 ? 'Replace image' : 'Upload image' }}
                    <input type="file" wire:model="aboutImage2" accept="image/*" class="hidden">
                </label>
                <div wire:loading wire:target="aboutImage2" class="text-xs text-gray-400">Uploading...</div>

                @if($existingAboutImage2 && !$aboutImage2)
                    <button type="button" wire:click="removeAboutImage2"
                            class="inline-flex items-center gap-1 text-xs text-red-500 hover:text-red-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Remove image
                    </button>
                @endif
            </div>
        </div>

        @error('aboutImage2')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
        <p class="text-xs text-gray-400">JPG, PNG – max 4 MB</p>
    </div>

    {{-- ── Save button ──────────────────────────────────────────── --}}
    <div>
        <button
            type="button"
            wire:click="save"
            class="bg-[#1e5c2e] hover:bg-[#174a25] text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition-colors"
            wire:loading.attr="disabled"
            wire:loading.class="opacity-70 cursor-wait"
        >
            <span wire:loading.remove wire:target="save">Save Images</span>
            <span wire:loading wire:target="save">Saving...</span>
        </button>
    </div>

</div>
