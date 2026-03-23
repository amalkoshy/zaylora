<div>
    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Gallery Photos</h2>
            <p class="text-sm text-gray-500 mt-0.5">{{ $photos->count() }} photo(s) uploaded</p>
        </div>
        <a href="{{ route('admin.gallery.upload') }}"
           class="inline-flex items-center gap-2 bg-[#1e5c2e] hover:bg-[#174a25] text-white text-sm font-medium px-4 py-2.5 rounded-lg transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Add Photo
        </a>
    </div>

    @if($photos->isEmpty())
        <div class="bg-white rounded-xl border border-dashed border-gray-300 py-16 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <p class="text-gray-500 text-sm">No photos yet.</p>
            <a href="{{ route('admin.gallery.upload') }}" class="mt-3 inline-block text-sm text-[#1e5c2e] hover:underline font-medium">Upload your first photo</a>
        </div>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
            @foreach($photos as $photo)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                    <div class="relative aspect-square overflow-hidden bg-gray-100">
                        <img src="{{ asset('storage/' . $photo->image) }}"
                             alt="{{ $photo->caption ?? 'Gallery photo' }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300"></div>
                    </div>
                    <div class="p-2.5">
                        <p class="text-xs text-gray-600 truncate mb-2">
                            {{ $photo->caption ?: '—' }}
                        </p>
                        <p class="text-xs text-gray-400 mb-2">Order: {{ $photo->sort_order }}</p>
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('admin.gallery.edit', $photo->id) }}"
                               class="flex-1 text-center text-xs font-medium text-[#1e5c2e] border border-[#1e5c2e] rounded-md py-1 hover:bg-[#1e5c2e] hover:text-white transition-colors">
                                Edit
                            </a>

                            @if($confirmingDelete === $photo->id)
                                <button wire:click="deletePhoto({{ $photo->id }})"
                                        class="flex-1 text-xs font-medium bg-red-600 text-white rounded-md py-1 hover:bg-red-700 transition-colors">
                                    Delete
                                </button>
                                <button wire:click="$set('confirmingDelete', null)"
                                        class="text-xs text-gray-500 hover:text-gray-700 px-1">✕</button>
                            @else
                                <button wire:click="$set('confirmingDelete', {{ $photo->id }})"
                                        class="flex-1 text-xs font-medium text-red-600 border border-red-300 rounded-md py-1 hover:bg-red-50 transition-colors">
                                    Delete
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
