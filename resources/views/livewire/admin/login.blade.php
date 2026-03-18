<div class="w-full max-w-md mx-auto">
    <div class="bg-white rounded-2xl shadow-xl p-8">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold tracking-widest text-gray-900">ZAYLORA</h1>
            <p class="text-gray-500 text-sm mt-1">Admin Panel</p>
        </div>

        <form wire:submit="login" class="space-y-5">
            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                <input
                    type="email"
                    wire:model="email"
                    placeholder="admin@example.com"
                    autofocus
                    class="w-full border border-gray-300 rounded-lg px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#1e5c2e] focus:border-transparent @error('email') border-red-400 @enderror"
                >
                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                <input
                    type="password"
                    wire:model="password"
                    placeholder="••••••••"
                    class="w-full border border-gray-300 rounded-lg px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#1e5c2e] focus:border-transparent @error('password') border-red-400 @enderror"
                >
                @error('password')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button
                type="submit"
                class="w-full bg-[#1e5c2e] hover:bg-[#174a25] text-white font-semibold py-2.5 rounded-lg text-sm transition-colors"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-70 cursor-wait"
            >
                <span wire:loading.remove>Sign In</span>
                <span wire:loading>Signing in...</span>
            </button>
        </form>
    </div>
</div>
