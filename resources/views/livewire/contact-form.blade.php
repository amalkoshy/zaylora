<div>
    @if($submitted)
        {{-- Success state --}}
        <div class="bg-green-50 border border-green-200 rounded-2xl p-8 text-center">
            <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2" style="font-family: 'Playfair Display', serif;">Message Sent!</h3>
            <p class="text-gray-500 text-sm">Thank you for reaching out. We'll get back to you shortly.</p>
            <button wire:click="$set('submitted', false)"
                    class="mt-5 text-sm text-[#3a7d44] hover:text-[#1e5c2e] font-medium transition-colors">
                Send another message
            </button>
        </div>
    @else
        <form wire:submit="send" class="space-y-5">

            {{-- Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    Name <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    wire:model="name"
                    placeholder="Your full name"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#3a7d44] focus:border-transparent transition @error('name') border-red-400 @enderror"
                >
                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    Email <span class="text-red-500">*</span>
                </label>
                <input
                    type="email"
                    wire:model="email"
                    placeholder="you@example.com"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#3a7d44] focus:border-transparent transition @error('email') border-red-400 @enderror"
                >
                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Phone --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    Phone <span class="text-gray-400 font-normal">(optional)</span>
                </label>
                <input
                    type="tel"
                    wire:model="phone"
                    placeholder="+91 XXXXXXXXXX"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#3a7d44] focus:border-transparent transition"
                >
            </div>

            {{-- Message --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    Message <span class="text-red-500">*</span>
                </label>
                <textarea
                    wire:model="message"
                    rows="5"
                    placeholder="How can we help you?"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#3a7d44] focus:border-transparent transition resize-none @error('message') border-red-400 @enderror"
                ></textarea>
                @error('message')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button
                type="submit"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-70 cursor-wait"
                class="w-full bg-[#1e5c2e] hover:bg-[#174a25] text-white font-semibold py-3.5 rounded-xl text-sm transition-colors flex items-center justify-center gap-2"
            >
                <span wire:loading.remove wire:target="send">
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        Send Message
                    </span>
                </span>
                <span wire:loading wire:target="send" class="flex items-center gap-2">
                    <svg class="animate-spin w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
                    </svg>
                    Sending...
                </span>
            </button>

        </form>
    @endif
</div>
