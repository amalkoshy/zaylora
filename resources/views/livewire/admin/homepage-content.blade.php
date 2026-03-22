<div class="space-y-8 max-w-4xl">

    {{-- ══════════════════════════════════════════════
         WHY CHOOSE US
    ══════════════════════════════════════════════ --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <h2 class="text-lg font-semibold text-gray-800 mb-1">Why Choose Us</h2>
        <p class="text-sm text-gray-400 mb-6">Section image, description paragraphs, and the three feature cards.</p>

        {{-- Section image --}}
        <div class="mb-8">
            <label class="block text-sm font-medium text-gray-700 mb-3">Section Image <span class="text-gray-400 font-normal">(left-side photo)</span></label>
            <div class="flex items-start gap-5">
                <div class="w-44 h-32 rounded-lg border border-gray-200 bg-gray-50 overflow-hidden flex items-center justify-center flex-shrink-0">
                    @if($whyImage)
                        <img src="{{ $whyImage->temporaryUrl() }}" class="w-full h-full object-cover">
                    @elseif($existingWhyImage)
                        <img src="{{ asset('storage/' . $existingWhyImage) }}" class="w-full h-full object-cover">
                    @else
                        <svg class="w-8 h-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    @endif
                </div>
                <div class="flex flex-col gap-2">
                    <label class="cursor-pointer inline-flex items-center gap-2 bg-white border border-gray-300 hover:border-gray-400 text-gray-700 text-sm font-medium px-4 py-2 rounded-lg">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                        {{ $existingWhyImage || $whyImage ? 'Replace' : 'Upload' }} Image
                        <input type="file" wire:model="whyImage" accept="image/*" class="hidden">
                    </label>
                    <div wire:loading wire:target="whyImage" class="text-xs text-gray-400">Uploading…</div>
                    @if($existingWhyImage && !$whyImage)
                        <button type="button" wire:click="removeImage('why_image','existingWhyImage')"
                                class="inline-flex items-center gap-1 text-sm text-red-500 hover:text-red-700">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>Remove
                        </button>
                    @endif
                    @error('whyImage') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        {{-- Descriptions --}}
        <div class="grid grid-cols-1 gap-4 mb-8">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Paragraph 1</label>
                <textarea wire:model="whyDesc1" rows="3" placeholder="First description paragraph…"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#1e5c2e]/30 focus:border-[#1e5c2e] resize-none"></textarea>
                @error('whyDesc1') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Paragraph 2</label>
                <textarea wire:model="whyDesc2" rows="3" placeholder="Second description paragraph…"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#1e5c2e]/30 focus:border-[#1e5c2e] resize-none"></textarea>
                @error('whyDesc2') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Feature Cards --}}
        <p class="text-sm font-semibold text-gray-700 border-t pt-6 mb-5">Feature Cards</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @php
                $featureSlots = [
                    ['img' => 'whyFeature1Image', 'existing' => 'existingWhyFeature1Image', 'column' => 'why_feature1_image', 'titleField' => 'whyFeature1Title', 'descField' => 'whyFeature1Desc', 'label' => 'Feature 1'],
                    ['img' => 'whyFeature2Image', 'existing' => 'existingWhyFeature2Image', 'column' => 'why_feature2_image', 'titleField' => 'whyFeature2Title', 'descField' => 'whyFeature2Desc', 'label' => 'Feature 2'],
                    ['img' => 'whyFeature3Image', 'existing' => 'existingWhyFeature3Image', 'column' => 'why_feature3_image', 'titleField' => 'whyFeature3Title', 'descField' => 'whyFeature3Desc', 'label' => 'Feature 3'],
                ];
            @endphp
            @foreach($featureSlots as $slot)
            <div class="border border-gray-200 rounded-xl p-4 bg-gray-50 space-y-3">
                <p class="text-xs font-bold text-[#1e5c2e] uppercase tracking-wider">{{ $slot['label'] }}</p>

                {{-- Image --}}
                <div class="w-full h-24 rounded-lg border border-gray-200 bg-white overflow-hidden flex items-center justify-center">
                    @if($this->{$slot['img']})
                        <img src="{{ $this->{$slot['img']}->temporaryUrl() }}" class="w-full h-full object-cover">
                    @elseif($this->{$slot['existing']})
                        <img src="{{ asset('storage/' . $this->{$slot['existing']}) }}" class="w-full h-full object-cover">
                    @else
                        <svg class="w-6 h-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    @endif
                </div>
                <div class="flex items-center gap-2">
                    <label class="cursor-pointer text-xs bg-white border border-gray-300 hover:border-gray-400 text-gray-600 px-3 py-1.5 rounded-lg">
                        {{ $this->{$slot['existing']} || $this->{$slot['img']} ? 'Replace' : 'Upload' }}
                        <input type="file" wire:model="{{ $slot['img'] }}" accept="image/*" class="hidden">
                    </label>
                    <span wire:loading wire:target="{{ $slot['img'] }}" class="text-xs text-gray-400">…</span>
                    @if($this->{$slot['existing']} && !$this->{$slot['img']})
                        <button type="button" wire:click="removeImage('{{ $slot['column'] }}','{{ $slot['existing'] }}')"
                                class="text-xs text-red-400 hover:text-red-600">Remove</button>
                    @endif
                </div>
                @error($slot['img']) <p class="text-xs text-red-500">{{ $message }}</p> @enderror

                {{-- Title --}}
                <input type="text" wire:model="{{ $slot['titleField'] }}" placeholder="Title"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#1e5c2e]/30 focus:border-[#1e5c2e]">
                @error($slot['titleField']) <p class="text-xs text-red-500">{{ $message }}</p> @enderror

                {{-- Description --}}
                <textarea wire:model="{{ $slot['descField'] }}" rows="3" placeholder="Short description…"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#1e5c2e]/30 focus:border-[#1e5c2e] resize-none"></textarea>
                @error($slot['descField']) <p class="text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            @endforeach
        </div>
    </div>

    {{-- ══════════════════════════════════════════════
         SPICE PROCESSING
    ══════════════════════════════════════════════ --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <h2 class="text-lg font-semibold text-gray-800 mb-1">Spice Processing</h2>
        <p class="text-sm text-gray-400 mb-6">Image, title, and description for each of the four steps.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            @php
                $stepSlots = [
                    ['img' => 'process1Image', 'existing' => 'existingProcess1Image', 'column' => 'process1_image', 'titleField' => 'process1Title', 'descField' => 'process1Desc', 'label' => 'Step 01', 'ph' => 'e.g. Carefully Picked'],
                    ['img' => 'process2Image', 'existing' => 'existingProcess2Image', 'column' => 'process2_image', 'titleField' => 'process2Title', 'descField' => 'process2Desc', 'label' => 'Step 02', 'ph' => 'e.g. Freshly Processed'],
                    ['img' => 'process3Image', 'existing' => 'existingProcess3Image', 'column' => 'process3_image', 'titleField' => 'process3Title', 'descField' => 'process3Desc', 'label' => 'Step 03', 'ph' => 'e.g. Securely Packed'],
                    ['img' => 'process4Image', 'existing' => 'existingProcess4Image', 'column' => 'process4_image', 'titleField' => 'process4Title', 'descField' => 'process4Desc', 'label' => 'Step 04', 'ph' => 'e.g. Fast Delivery'],
                ];
            @endphp
            @foreach($stepSlots as $slot)
            <div class="border border-gray-200 rounded-xl p-4 bg-gray-50 space-y-3">
                <p class="text-xs font-bold text-[#1e5c2e] uppercase tracking-wider">{{ $slot['label'] }}</p>

                {{-- Image --}}
                <div class="w-full h-28 rounded-lg border border-gray-200 bg-white overflow-hidden flex items-center justify-center">
                    @if($this->{$slot['img']})
                        <img src="{{ $this->{$slot['img']}->temporaryUrl() }}" class="w-full h-full object-cover">
                    @elseif($this->{$slot['existing']})
                        <img src="{{ asset('storage/' . $this->{$slot['existing']}) }}" class="w-full h-full object-cover">
                    @else
                        <svg class="w-7 h-7 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    @endif
                </div>
                <div class="flex items-center gap-2">
                    <label class="cursor-pointer text-xs bg-white border border-gray-300 hover:border-gray-400 text-gray-600 px-3 py-1.5 rounded-lg">
                        {{ $this->{$slot['existing']} || $this->{$slot['img']} ? 'Replace' : 'Upload' }}
                        <input type="file" wire:model="{{ $slot['img'] }}" accept="image/*" class="hidden">
                    </label>
                    <span wire:loading wire:target="{{ $slot['img'] }}" class="text-xs text-gray-400">…</span>
                    @if($this->{$slot['existing']} && !$this->{$slot['img']})
                        <button type="button" wire:click="removeImage('{{ $slot['column'] }}','{{ $slot['existing'] }}')"
                                class="text-xs text-red-400 hover:text-red-600">Remove</button>
                    @endif
                </div>
                @error($slot['img']) <p class="text-xs text-red-500">{{ $message }}</p> @enderror

                {{-- Title --}}
                <input type="text" wire:model="{{ $slot['titleField'] }}" placeholder="{{ $slot['ph'] }}"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#1e5c2e]/30 focus:border-[#1e5c2e]">
                @error($slot['titleField']) <p class="text-xs text-red-500">{{ $message }}</p> @enderror

                {{-- Description --}}
                <textarea wire:model="{{ $slot['descField'] }}" rows="3" placeholder="Short description of this step…"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#1e5c2e]/30 focus:border-[#1e5c2e] resize-none"></textarea>
                @error($slot['descField']) <p class="text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            @endforeach
        </div>
    </div>

    {{-- Save --}}
    <div class="flex items-center gap-4">
        <button type="button" wire:click="save"
                class="bg-[#1e5c2e] hover:bg-[#174a25] text-white text-sm font-medium px-8 py-3 rounded-lg transition-colors">
            <span wire:loading.remove wire:target="save">Save Homepage Content</span>
            <span wire:loading wire:target="save">Saving…</span>
        </button>
        @if(session('success'))
            <span class="text-sm text-green-600 font-medium">✓ {{ session('success') }}</span>
        @endif
    </div>

</div>
