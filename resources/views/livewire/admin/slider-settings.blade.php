<div class="max-w-2xl space-y-6">

    @php
        $slots = [
            1 => ['label' => 'Slide 1', 'existing' => $existingSliderImage1, 'field' => 'sliderImage1', 'preview' => $sliderImage1, 'textField' => 'sliderText1', 'textValue' => $sliderText1],
            2 => ['label' => 'Slide 2', 'existing' => $existingSliderImage2, 'field' => 'sliderImage2', 'preview' => $sliderImage2, 'textField' => 'sliderText2', 'textValue' => $sliderText2],
            3 => ['label' => 'Slide 3', 'existing' => $existingSliderImage3, 'field' => 'sliderImage3', 'preview' => $sliderImage3, 'textField' => 'sliderText3', 'textValue' => $sliderText3],
        ];
    @endphp

    @foreach($slots as $n => $slot)
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <h2 class="text-base font-semibold text-gray-800 mb-1">{{ $slot['label'] }}</h2>
        <p class="text-sm text-gray-500 mb-6">Homepage hero slider — image {{ $n }} of 3. Recommended: 800×600 px, landscape.</p>

        <div class="flex items-start gap-6 mb-4">
            {{-- Preview --}}
            <div class="w-48 h-32 rounded-lg border border-gray-200 bg-gray-50 flex items-center justify-center overflow-hidden shrink-0">
                @if($slot['preview'])
                    <img src="{{ $slot['preview']->temporaryUrl() }}" class="w-full h-full object-cover">
                @elseif($slot['existing'])
                    <img src="{{ asset('storage/' . $slot['existing']) }}" class="w-full h-full object-cover">
                @else
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-300 mx-auto mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-xs text-gray-400">No image</span>
                    </div>
                @endif
            </div>

            <div class="flex flex-col gap-2 pt-1">
                <label class="cursor-pointer inline-flex items-center gap-2 text-sm font-medium text-[#1e5c2e] hover:text-[#174a25] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    {{ $slot['existing'] || $slot['preview'] ? 'Replace image' : 'Upload image' }}
                    <input type="file" wire:model="{{ $slot['field'] }}" accept="image/*" class="hidden">
                </label>

                <div wire:loading wire:target="{{ $slot['field'] }}" class="text-xs text-gray-400">Uploading...</div>

                @if($slot['existing'] && !$slot['preview'])
                    <button type="button" wire:click="removeSliderImage({{ $n }})"
                            class="inline-flex items-center gap-1 text-xs text-red-500 hover:text-red-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Remove
                    </button>
                @endif
            </div>
        </div>

        @error($slot['field'])
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
        <p class="text-xs text-gray-400 mb-5">JPG, PNG – max 4 MB</p>

        {{-- ── Slide text ── --}}
        <div class="border-t border-gray-100 pt-5">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Slide Text
                <span class="text-gray-400 font-normal">(displayed over the image)</span>
            </label>
            <textarea
                wire:model.live="{{ $slot['textField'] }}"
                rows="2"
                maxlength="300"
                placeholder="Enter text to display on this slide…"
                class="w-full text-sm text-gray-800 border border-gray-200 rounded-lg px-3 py-2 resize-none focus:outline-none focus:ring-2 focus:ring-[#1e5c2e]/30 focus:border-[#1e5c2e] transition"
            ></textarea>
            @error($slot['textField'])
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
            <p class="text-xs text-gray-400 mt-1">Max 300 characters. Leave blank to hide text for this slide.</p>
        </div>
    </div>
    @endforeach

    {{-- Flash message --}}
    @if(session('success'))
        <div class="text-sm text-green-700 bg-green-50 border border-green-200 rounded-lg px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- Save --}}
    <div>
        <button
            type="button"
            wire:click="save"
            class="bg-[#1e5c2e] hover:bg-[#174a25] text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition-colors"
            wire:loading.attr="disabled"
            wire:loading.class="opacity-70 cursor-wait"
        >
            <span wire:loading.remove wire:target="save">Save Slider Settings</span>
            <span wire:loading wire:target="save">Saving...</span>
        </button>
    </div>

</div>
