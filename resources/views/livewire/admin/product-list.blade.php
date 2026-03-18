<div>
    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">All Products</h2>
            <p class="text-sm text-gray-500 mt-0.5">{{ $products->count() }} product(s) listed</p>
        </div>
        <a href="{{ route('admin.products.create') }}"
           class="inline-flex items-center gap-2 bg-[#1e5c2e] hover:bg-[#174a25] text-white text-sm font-medium px-4 py-2.5 rounded-lg transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Add Product
        </a>
    </div>

    {{-- Table --}}
    @if($products->isEmpty())
        <div class="bg-white rounded-xl border border-dashed border-gray-300 py-16 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
            <p class="text-gray-500 text-sm">No products yet.</p>
            <a href="{{ route('admin.products.create') }}" class="mt-3 inline-block text-sm text-[#1e5c2e] hover:underline font-medium">Add your first product</a>
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-left text-xs text-gray-500 uppercase tracking-wider">
                        <th class="px-6 py-3">Image</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Phone</th>
                        <th class="px-6 py-3">WhatsApp</th>
                        <th class="px-6 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($products as $product)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                         alt="{{ $product->name }}"
                                         class="w-12 h-12 rounded-full object-cover ring-2 ring-gray-200">
                                @else
                                    <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $product->name }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $product->phone ?: '—' }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $product->whatsapp ?: '—' }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                       class="inline-flex items-center gap-1.5 text-xs font-medium text-gray-600 hover:text-[#1e5c2e] bg-gray-100 hover:bg-green-50 px-3 py-1.5 rounded-lg transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit
                                    </a>

                                    @if($confirmingDelete === $product->id)
                                        <span class="text-xs text-gray-600">Sure?</span>
                                        <button wire:click="deleteProduct({{ $product->id }})"
                                                class="text-xs font-medium text-red-600 hover:text-red-700 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg transition-colors">
                                            Yes, delete
                                        </button>
                                        <button wire:click="$set('confirmingDelete', null)"
                                                class="text-xs font-medium text-gray-500 hover:text-gray-700 bg-gray-100 px-3 py-1.5 rounded-lg transition-colors">
                                            Cancel
                                        </button>
                                    @else
                                        <button wire:click="$set('confirmingDelete', {{ $product->id }})"
                                                class="inline-flex items-center gap-1.5 text-xs font-medium text-gray-600 hover:text-red-600 bg-gray-100 hover:bg-red-50 px-3 py-1.5 rounded-lg transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Delete
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
