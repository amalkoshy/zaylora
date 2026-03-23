<div class="max-w-2xl">
    {{-- Back link --}}
    <a href="{{ route('admin.gallery') }}" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-800 mb-6 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Back to Gallery
    </a>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <h2 class="text-lg font-semibold text-gray-800 mb-6">
            {{ $photoId ? 'Edit Photo' : 'Add New Photo' }}
        </h2>

        <form wire:submit="save" class="space-y-6">

            {{-- Image upload --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Photo {{ !$photoId ? '<span class="text-red-500">*</span>' : '' }}
                </label>

                <div class="flex items-start gap-5 mb-3">
                    {{-- Preview --}}
                    <div class="w-32 h-32 rounded-xl overflow-hidden bg-gray-100 ring-2 ring-gray-200 flex items-center justify-center shrink-0">
                        @if($image)
                            <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover">
                        @elseif($existingImage)
                            <img src="{{ asset('storage/' . $existingImage) }}" class="w-full h-full object-cover">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        @endif
                    </div>

                    <div>
                        <label class="cursor-pointer inline-flex items-center gap-2 text-sm font-medium text-[#1e5c2e] hover:text-[#174a25] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                            </svg>
                            {{ $image || $existingImage ? 'Change photo' : 'Upload photo' }}
                            <input type="file" wire:model="image" accept="image/*" class="hidden">
                        </label>
                        <p class="text-xs text-gray-400 mt-1">JPG, PNG, WebP – max 4 MB</p>
                        @error('image')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                        <div wire:loading wire:target="image" class="text-xs text-gray-400 mt-1">Uploading...</div>
                    </div>
                </div>
            </div>

            {{-- Caption --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Caption <span class="text-gray-400 font-normal">(optional)</span></label>
                <input
                    type="text"
                    wire:model="caption"
                    placeholder="e.g. Premium Green Cardamom harvest"
                    class="w-full border border-gray-300 rounded-lg px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#1e5c2e] focus:border-transparent @error('caption') border-red-400 @enderror"
                >
                @error('caption')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Sort order --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Display Order <span class="text-gray-400 font-normal">(lower = first)</span></label>
                <input
                    type="number"
                    wire:model="sort_order"
                    min="0"
                    placeholder="0"
                    class="w-32 border border-gray-300 rounded-lg px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#1e5c2e] focus:border-transparent"
                >
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 pt-2">
                <button
                    type="submit"
                    class="bg-[#1e5c2e] hover:bg-[#174a25] text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition-colors"
                    wire:loading.attr="disabled"
                    wire:loading.class="opacity-70 cursor-wait"
                >
                    <span wire:loading.remove wire:target="save">{{ $photoId ? 'Update Photo' : 'Save Photo' }}</span>
                    <span wire:loading wire:target="save">Saving...</span>
                </button>

                <a href="{{ route('admin.gallery') }}" class="text-sm text-gray-500 hover:text-gray-700 transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
